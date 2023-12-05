<?php
Class User extends CI_Controller {
    public function __construct() {
        parent :: __construct();
        $this -> load -> model('User_Model');
        $this -> load -> model('Booking_Model');
        $this -> load -> model('Plane_Model');
        $this -> load -> model('Routes_Model');
        $this -> load -> database();
        $this -> load -> library('session');
    }

    public function index() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'user') {
            $data['message'] = $this->session->userdata('message');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['bookings'] = $this->Booking_Model->getUserBookings($this->session->userdata('UserID'));
            $data['status'] = $this->session->userdata('status');
            $data['totalActiveBooking'] = $this->Booking_Model->getActiveBookingTotal($this->session->userdata('UserID'));
            $this->load->view('user/dashboard.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function booking() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'user') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['planes'] = $this->Plane_Model->getPlanes();
            $data['routes'] = $this->Routes_Model->getRoutes();
            $data['bookings'] = $this->Booking_Model->getUserBookings($this->session->userdata('UserID'));
            $data['totalActiveBooking'] = $this->Booking_Model->getActiveBookingTotal($this->session->userdata('UserID'));
            $this->load->view('user/booking.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function plane() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'user') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['planes'] = $this->Plane_Model->getPlanes();
            $data['routes'] = $this->Routes_Model->getRoutes();
            $data['activeRoutes'] = $this->Routes_Model->getRoutesTotal();
            $data['bookings'] = $this->Booking_Model->getUserBookings($this->session->userdata('UserID'));
            $data['totalActiveBooking'] = $this->Booking_Model->getActiveBookingTotal($this->session->userdata('UserID'));
            $this->load->view('user/plane.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function ticket() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'user') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['planes'] = $this->Plane_Model->getPlanes();
            $data['routes'] = $this->Routes_Model->getRoutes();
            $data['activeRoutes'] = $this->Routes_Model->getRoutesTotal();
            $data['bookings'] = $this->Booking_Model->getUserBookings($this->session->userdata('UserID'));
            $data['totalActiveBooking'] = $this->Booking_Model->getActiveBookingTotal($this->session->userdata('UserID'));
            $this->load->view('user/ticket.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function profile() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'user') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['user'] = $this->User_Model->getUserById($this->session->userdata('UserID'));
            
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['planes'] = $this->Plane_Model->getPlanes();
            $data['routes'] = $this->Routes_Model->getRoutes();
            $data['activeRoutes'] = $this->Routes_Model->getRoutesTotal();
            $data['bookings'] = $this->Booking_Model->getUserBookings($this->session->userdata('UserID'));
            $data['totalActiveBooking'] = $this->Booking_Model->getActiveBookingTotal($this->session->userdata('UserID'));
            $this->load->view('user/profile.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function edit_profile() {
        $id = $this->session->userdata('UserID');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phoneNumber = $this->input->post('phone');
        $password = $this->input->post('password');
        if ($password) {
            $data = array(
                'name' => $name,
                'email' => $email,
                'phoneNumber' => $phoneNumber,
                'password' => md5($password)
            );
        } else {
            $data = array(
                'name' => $name,
                'email' => $email,
                'phoneNumber' => $phoneNumber
            );
        }

    
        $userId = $this->User_Model->updateUser($id, $data);

        if ($userId) {
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

            $data['message'] = 'User with ID of ' . $id . ' has been updated';
            $pusher->trigger('arcalines', 'admin', $data['message']);
            $this->session->set_userdata('message', 'Profile has been updated');
            $this->session->set_userdata('status', 'success');
            redirect(base_url('user/profile'));
        } else {
            $this->session->set_userdata('message', 'Failed to update profile, possibly same data');
            $this->session->set_userdata('status', 'danger');
            redirect(base_url('user/profile'));
        }

        redirect(base_url('user/profile'));
    }
}

?>