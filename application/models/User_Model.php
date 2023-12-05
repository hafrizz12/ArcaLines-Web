<?php
Class User_Model extends CI_Model {
    public function construct() {
        parent :: __construct();
        $this -> load -> database();
    }

    public function getUserById($id) {
        $this->db->where('UserID', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function getUserByEmail($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function userCount() {
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    public function getUsers() {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getUserByUsername($username) {
        $this->db->where('Username', $username);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function createUser($data) {
        $id = $data['Username'];
        $exist1 = $this->getUserByUsername($id);
        $id = $data['email'];
        $exist2 = $this->getUserByEmail($id);

        if ($exist1 || $exist2) {
            return "exist";
        }

        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function updateUser($id, $data) {
        $this->db->where('UserID', $id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    public function deleteUser($id) {
        $this->db->where('UserID', $id);
        $this->db->delete('users');
        return $this->db->affected_rows();
    }
}

?>