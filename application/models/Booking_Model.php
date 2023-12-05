<?php
Class Booking_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_booking($id) {
        $this->db->where('BookingID', $id);
        $query = $this->db->get('bookings');
        return $query->row();
    }

    public function getUserBookings($id) {
        $this->db->where('UserID', $id);
        $this->db->join('aircrafts', 'aircrafts.AircraftID = bookings.AircraftID');
        $this->db->join('routes', 'routes.RoutesID = bookings.RouteID');
        $query = $this->db->get('bookings');
        return $query->result();
    }

    public function getActiveBookingTotal($id) {
        $this->db->where('UserID', $id);
        $this->db->where('BookingDate >', date('Y-m-d H:i:s'));
        $query = $this->db->get('bookings');
        return $query->num_rows();
    }

    public function getActiveBooking($id) {
        $this->db->where('UserID', $id);
        $this->db->where('BookingDate >', date('Y-m-d H:i:s'));
        $query = $this->db->get('bookings');
        return $query->result();
    }

    public function getTotalSales() {
        $this->db->select_sum('TotalPrice');
        $query = $this->db->get('bookings');
        return $query->row()->TotalPrice;
    }

    public function getTotalPassenger() {
        $this->db->where('BookingDate >', date('Y-m-d H:i:s'));
        $query = $this->db->get('bookings');
        return $query->num_rows();
    }

    public function getBookingsLimitedDate() {
        $this->db->where('BookingDate', date('Y-m-d H:i:s'));
        $query = $this->db->get('bookings');
        $this->db->order_by('BookingDate', 'DESC');
        $this->db->limit(5);
        return $query->result();
    }

    public function getBookings() {
        $this->db->join('users', 'users.UserID = bookings.UserID');
        $query = $this->db->get('bookings');
        return $query->result();
    }

    public function create_booking($data) {
        $this->db->insert('bookings', $data);
        return $this->db->insert_id();
    }

    public function update_booking($id, $data) {
        $this->db->where('BookingID', $id);
        $this->db->update('bookings', $data);
        return $this->db->affected_rows();
    }

    public function delete_booking($id) {
        $this->db->where('BookingID', $id);
        $this->db->delete('bookings');
        return $this->db->affected_rows();
    }
}
