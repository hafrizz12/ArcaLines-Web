<?php
Class Routes extends CI_Controller {
    public function __construct() {
        parent :: __construct();
        $this -> load -> model('Routes_Model');
        $this -> load -> database();
        $this -> load -> library('session');
    }

    public function getRoutes() {
        $id = $this->input->post('id');
        $data['routes'] = $this->Routes_Model->get_route($id);
        echo json_encode($data);
    }

    public function add() {
        $aircraftId = $this->input->post('plane');
        $origin = $this->input->post('origin');
        $destination = $this->input->post('destination');
        $distance = $this->input->post('distance');
        $price = $this->input->post('price');

        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            if (!$aircraftId || !$origin || !$destination || !$distance || !$price) {
                $data['message'] = 'Gagal membuat rute';
                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "danger");
                header('Location: '.base_url().'admin/routes');
                return;
            }
            $data = array(
                'AirCraftID' => $aircraftId,
                'OriginCity' => $origin,
                'DestinationCity' => $destination,
                'Distance' => $distance,
                'Price' => $price
            );

            $routeId = $this->Routes_Model->create_route($data);
            if ($routeId) {
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
              
                $data['message'] = 'Rute telah sebanyak ' . $routeId;

                $pusher->trigger('arcalines', 'admin', $data['message']);

                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "success");
                redirect(base_url('admin/routes'));
            } else {
                echo "Gagal membuat rute";
            }
        } else {
            redirect(base_url('auth'));
        } 
    }

    public function edit($id) {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $data['routes'] = $this->Routes_Model->get_route($id);
            $this->load->view('admin/routes/edit.php', $data);
        } else {
            redirect(base_url('auth'));
        } 
    }

    public function editProc(){
        $id = $this->input->post('routeID');
        $aircraftId = $this->input->post('aircraftID');
        $origin = $this->input->post('originCity');
        $destination = $this->input->post('destinationCity');
        $distance = $this->input->post('distance');
        $price = $this->input->post('price');

        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            if (!$aircraftId || !$origin || !$destination || !$distance || !$price) {
                $data['message'] = 'Gagal mengubah rute';
                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "danger");
                redirect(base_url('admin/routes'));
                return;
            }
            $data = array(
                'AirCraftID' => $aircraftId,
                'OriginCity' => $origin,
                'DestinationCity' => $destination,
                'Distance' => $distance,
                'Price' => $price
            );

            $routeId = $this->Routes_Model->update_route($id, $data);

            if ($routeId) {
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
              
                $data['message'] = 'Rute telah diubah dengan ID ' . $routeId;

                $pusher->trigger('arcalines', 'admin', $data['message']);

                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "success");
                redirect(base_url('admin/routes'));
            } else {
                echo "Gagal mengubah rute";
            }
        } else {
            redirect(base_url('auth'));
        } 
    }

    public function delete() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $id = $this->input->get('id');
            $route = $this->Routes_Model->delete_route($id);
    
            if ($route) {
                $data['message'] = 'Rute telah dihapus dengan id rute ' . $id;
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
  
                $pusher->trigger('arcalines', 'admin', $data['message']);
                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "success");
                redirect(base_url('admin/routes'));
            } else {
                $this->session->set_userdata('message', 'Gagal menghapus rute');
                $this->session->set_userdata('status', "danger");
                redirect(base_url('admin/routes'));
            }
        } else {
            redirect(base_url('auth'));
        }
    }

}
?>