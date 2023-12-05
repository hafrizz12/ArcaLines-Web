<?php
Class Plane_Model extends CI_Model {
    public function __construct() {
        parent :: __construct();
        $this -> load -> database();
    }

    public function get_plane($id) {
        $this->db->where('AircraftID', $id);
        $query = $this->db->get('aircrafts');
        return $query->row();
    }

    public function planeCount() {
        $query = $this->db->get('aircrafts');
        return $query->num_rows();
    }

    public function getPlanes() {
        $query = $this->db->get('aircrafts');
        return $query->result();
    }

    public function create_plane($data) {
        $this->db->insert('aircrafts', $data);
        return $this->db->insert_id();
    }

    public function getUnusedPlanes() {
        $this->db->select('aircrafts.*');
        $this->db->from('aircrafts');
        $this->db->join('routes', 'aircrafts.AircraftID = routes.AirCraftID', 'left');
        $this->db->where('routes.AirCraftID IS NULL');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_plane($id, $data) {
        $this->db->where('AircraftID', $id);
        $this->db->update('aircrafts', $data);
        return $this->db->affected_rows();
    }

    public function delete_plane($id) {
        $this->db->where('AircraftID', $id);
        $this->db->delete('aircrafts');
        return $this->db->affected_rows();
    }
}
?>