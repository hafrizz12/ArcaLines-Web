<?php
class Plane extends CI_Controller {
    public function __construct() {
        parent :: __construct();
        $this->load->model('Plane_Model');
        $this->load->database();
        $this->load->library('session');
    }

    public function getId() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $id = $this->input->post('id');
            $plane = $this->Plane_Model->get_plane($id);
            echo json_encode($plane);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function add() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $aircraftName = $this->input->post('airCraftName');
            $aircraftType = $this->input->post('airCraftType');
            $capacity = $this->input->post('airCraftCapacity');
            if (!$aircraftName || !$aircraftType || !$capacity) {
                $data['message'] = 'Gagal membuat pesawat';
                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "danger");
                header('Location: '.base_url().'plane');
                return;
            }
            $data = array(
                'AircraftName' => $aircraftName,
                'AircraftType' => $aircraftType,
                'Capacity' => $capacity
            );
            $planeId = $this->Plane_Model->create_plane($data);
            if ($planeId) {
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
              
                $data['message'] = 'Pesawat telah dibuat dengan ID ' . $planeId;

                $pusher->trigger('arcalines', 'admin', $data['message']);

                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "success");
                redirect(base_url('admin/planes'));
            } else {
                $this->session->set_userdata('message', 'Gagal membuat pesawat');
                $this->session->set_userdata('status', "danger");
                redirect(base_url('admin/planes'));
            }
    }
}


    public function edit_Fleet() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $id = $this->input->get('id');
            $data['fleet'] = $this->Plane_Model->get_plane($id);
            $this->load->view('admin/planes/edit.php', $data);
        } else {
            redirect(base_url('auth'));
        }

    }

    public function editFleetProc() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $id = $this->input->post('aircraftID');
            $aircraftName = $this->input->post('aircraftName');
            $aircraftType = $this->input->post('aircraftType');
            $capacity = $this->input->post('capacity');
            if (!$aircraftName || !$aircraftType || !$capacity) {
                $data['message'] = 'Gagal mengubah pesawat';
                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "danger");
                redirect(base_url('admin/planes'));
                return;
            }
            $data = array(
                'AircraftName' => $aircraftName,
                'AircraftType' => $aircraftType,
                'Capacity' => $capacity
            );
            $planeId = $this->Plane_Model->update_plane($id, $data);
            if ($planeId) {
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
              
                $data['message'] = 'Pesawat telah diubah';

                $pusher->trigger('arcalines', 'admin', $data['message']);

                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "success");
                redirect(base_url('admin/planes'));
            } else {
                $this->session->set_userdata('message', 'Gagal mengubah pesawat');
                $this->session->set_userdata('status', "danger");
                redirect(base_url('admin/planes'));
            }
        } else {
            redirect(base_url('auth'));
        }
    }

    public function delete_fleet() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $id = $this->input->get('id');
            $plane = $this->Plane_Model->delete_plane($id);
    
            if ($plane) {
                $data['message'] = 'Pesawat telah dihapus dengan id pesawat ' . $id;
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
                redirect(base_url('admin/planes'));
            } else {
                $data['message'] = 'Gagal menghapus pesawat';
                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "danger");
                redirect(base_url('admin/planes'));
            }
    
        }
    }

}