<?php
Class Routes_Model extends CI_Model {
    public function __construct() {
        parent :: __construct();
        $this -> load -> database();
    }

    public function get_route($id) {
        $this->db->where('RoutesID', $id);
        $this->db->join('aircrafts', 'aircrafts.AircraftID = routes.AirCraftID');
        $query = $this->db->get('routes');
        return $query->row();
    }

    public function getRoutesTotal() {
        $query = $this->db->get('routes');
        return $query->num_rows();
    }

    public function getRoutes() {
        $this->db->join('aircrafts', 'aircrafts.AircraftID = routes.AirCraftID');
        $query = $this->db->get('routes');
        return $query->result();
    }

    public function create_route($data) {
        $this->db->insert('routes', $data);
        return $this->db->insert_id();
    }

    public function update_route($id, $data) {
        $this->db->where('RoutesID', $id);
        $this->db->update('routes', $data);
        return $this->db->affected_rows();
    }

    public function delete_route($id) {
        $this->db->where('RoutesID', $id);
        $this->db->delete('routes');
        return $this->db->affected_rows();
    }
}
?>