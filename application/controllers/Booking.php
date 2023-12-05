<?php
Class Booking extends CI_Controller {
    public function __construct() {
        parent :: __construct();
        $this -> load -> model('Booking_Model');
        $this -> load -> model('Plane_Model');
        $this -> load -> model('Routes_Model');
        $this -> load -> database();
        $this -> load -> library('session');
    }

    public function purchase() {
        $id = $this->input->get('id');
        $quantity = $this->input->get('quantity');
        if (!is_numeric($quantity)) {
            $this->session->set_userdata('message', 'Invalid quantity');
            redirect(base_url('user/booking'));
        }

        $data = array(
            'RouteID' => $id,
            'UserID' => $this->session->userdata('UserID'),
            'SeatCount' => $quantity,
            'PricePerSeat' => $this->Routes_Model->get_route($id)->price,
            'TotalPrice' => $this->Routes_Model->get_route($id)->price * $quantity,
            'AircraftID' => $this->Routes_Model->get_route($id)->AirCraftID
        );

        $bookingID = $this->Booking_Model->create_booking($data);

        if ($bookingID) {
            require __DIR__ . '/vendor/autoload.php';

            $options = array(
              'cluster' => 'ap1',
              'useTLS' => true
            );

            $pusher = new Pusher\Pusher(
                'fe9990dc44f96732023a',
                'd0b8b7f99b246c5068c7',
                '1719531',
                $options
              );


            $data['message'] = 'Booking has been created with ID of ' . $bookingID;
            $this->session->set_userdata('message', $data['message']);
            $this->session->set_userdata('status', "success");
            $pusher->trigger('arcalines', 'admin', $data['message']);
            redirect(base_url('user/booking'));
        } else {
            $this->session->set_userdata('message', 'Failed to create booking');
            $this->session->set_userdata('status', "danger");
            redirect(base_url('user/booking'));
        }
    }
}
?>