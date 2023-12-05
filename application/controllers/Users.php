<?php
Class Users Extends CI_Controller {
    public function __construct() {
        parent :: __construct();
        $this -> load -> model('User_Model');
        $this -> load -> database();
        $this -> load -> library('session');
    }

    public function edit($id) {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['user'] = $this->User_Model->getUserById($id);
            $this->load->view('admin/user/edit.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function editProc() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $userID = $this->input->post('userID');
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $password = $this->input->post('password');
            $password = md5($password);

            if ($password) {
                $data = array(
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'phoneNumber' => $phone,
                    'password' => $password
                );
            } else {
                $data = array(
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'phoneNumber' => $phone
                );
            }

            $updateId = $this->User_Model->updateUser($userID, $data);

            if ($updateId) {
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

                $data['message'] = 'A User has been updated with the ID of ' . $userID;
                $this->session->set_userdata('message', $data['message']);
                $this->session->set_userdata('status', "success");
                $pusher->trigger('arcalines', 'admin', $data['message']);
                redirect(base_url('admin/users'));
            } else {
                $this->session->set_userdata('message', 'Nothing has been updated user, no different eh? or problem?');
                $this->session->set_userdata('status', "danger");
                redirect(base_url('admin/users'));
            }

        } else {
            redirect(base_url('auth'));
        }
    }

    public function delete($id) {
        $deleteId = $this->User_Model->deleteUser($id);
        if ($deleteId) {
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

            $data['message'] = 'A User has been deleted';
            $this->session->set_userdata('message', $data['message']);
            $this->session->set_userdata('status', "danger");
            $pusher->trigger('arcalines', 'admin', $data['message']);
            redirect(base_url('admin/users'));
        } else {
            $this->session->set_userdata('message', 'Failed to delete user, possibly has an active booking');
            $this->session->set_userdata('status', "danger");
            redirect(base_url('admin/users'));
        }
    }

}
?>