<?php
Class Admin extends CI_Controller {
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
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['sales'] = $this->Booking_Model->getTotalSales();
            $data['totalRoutes'] = $this->Routes_Model->getRoutesTotal();
            $data['totalPassenger'] = $this->Booking_Model->getTotalPassenger();
            $data['recentPassenger'] = $this->Booking_Model->getBookings();
            $this->load->view('admin/dashboard.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function planes() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['planes'] = $this->Plane_Model->getPlanes();
            $data['activeRoutes'] = $this->Plane_Model->planeCount();
            $data['fleet'] = $this->Plane_Model->getPlanes();
            $this->load->view('admin/planes.php', $data);
        } else {
            redirect(base_url('auth'));
        }

    }

    public function routes() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['routes'] = $this->Routes_Model->getRoutes();
            $data['planes'] = $this->Plane_Model->getPlanes();
            $data['activeRoutes'] = $this->Routes_Model->getRoutesTotal();
            $data['unusedPlanes'] = $this->Plane_Model->getUnusedPlanes();
            $this->load->view('admin/routes.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function bookings() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['bookings'] = $this->Booking_Model->getBookings();
            $data['routes'] = $this->Routes_Model->getRoutes();
            $data['planes'] = $this->Plane_Model->getPlanes();
            $data['sales'] = $this->Booking_Model->getTotalSales();
            $data['recentPassenger'] = $this->Booking_Model->getBookings();
            $this->load->view('admin/booking.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }

    public function users() {
        if ($this->session->userdata('UserID') && $this->session->userdata('roles') == 'admin') {
            $data['message'] = $this->session->userdata('message');
            $data['status'] = $this->session->userdata('status');
            $data['name'] = $this->User_Model->getUserById($this->session->userdata('UserID'))->name;
            $data['userCount'] = $this->User_Model->userCount();
            $data['users'] = $this->User_Model->getUsers();
            $this->load->view('admin/user.php', $data);
        } else {
            redirect(base_url('auth'));
        }
    }


}
?>