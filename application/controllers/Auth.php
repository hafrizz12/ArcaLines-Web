<?php
Class Auth extends CI_Controller {
    public function __construct() {
        parent :: __construct();
        $this -> load -> model('User_Model');
        $this -> load -> database();
        $this -> load -> library('session');
    }

    public function index() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            redirect(base_url('admin'));
        } else if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'user') {
            redirect(base_url('user'));
        } else {
            $data['message'] = $this->session->userdata('message');
            $data['statusPop'] = $this->session->userdata('statusPop');
            $this->load->view('auth/login.php', $data);
        }
    }

    public function loginProcess() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);
        $user = $this->User_Model->getUserByEmail($email);

        if ($user) {
            if ($user->password == $password) {
                $this->session->set_userdata('UserID', $user->UserID);
                
                if ($user->access_status == 1) {
                    $this->session->set_userdata('roles', 'admin');
                    $data['message'] = 'Login berhasil';
                    $this->session->set_userdata('message', $data['message']);
                    redirect(base_url('admin'));
                } else if ($user->access_status == 0) {
                    $this->session->set_userdata('roles', 'user');
                    $data['message'] = 'Login berhasil';
                    $this->session->set_userdata('message', $data['message']);
                    redirect(base_url('user'));
                }

            } else {
                $data['message'] = 'Password salah';
                $this->session->set_userdata('message', $data['message']);
                redirect(base_url('auth'));
            }
        } else {
            $data['message'] = 'Email tidak terdaftar';
            $this->session->set_userdata('message', $data['message']);
            redirect(base_url('auth'));
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }

    public function register() {
        $data['message'] = $this->session->userdata('message');
        $this->load->view('auth/register.php', $data);
    }

    public function registerProcess() {
        $data = array(
            'Username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'name' => $this->input->post('name'),
            'phoneNumber' => $this->input->post('phoneNumber'),
            'access_status' => 0
        );

        $userId = $this->User_Model->createUser($data);

        if ($userId == "exist") {
            $data['message'] = 'Username atau email sudah terdaftar';
            $this->session->set_userdata('message', $data['message']);
            $this->session->set_userdata('statusPop', 'danger');
            redirect(base_url('auth/register'));
        } else if ($userId) {
            $data['message'] = 'Register berhasil';
            $this->session->set_userdata('message', $data['message']);
            $this->session->set_userdata('statusPop', 'success');

            $this->session->set_userdata('UserID', $userId);
            $this->session->set_userdata('roles', 'user');
            redirect(base_url('auth'));
        } else {
            $data['message'] = 'Register gagal';
            $this->session->set_userdata('statusPop', 'danger');
            $this->session->set_userdata('message', $data['message']);
            redirect(base_url('auth/register'));
        }

    }


}

?>