<?php

class Booking_model {
    
    private $table = 'bookings';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }
    
    // Ambil semua booking dengan info layanan
    public function getAllBookings()
    {
        $query = "SELECT b.*, s.name as service_name 
                  FROM {$this->table} b 
                  LEFT JOIN services s ON b.service_id = s.id 
                  ORDER BY b.created_at DESC";
        
        $this->db->query($query);
        return $this->db->resultSet();
    }
    
    // Ambil booking berdasarkan ID
    public function getBookingById($id)
    {
        $query = "SELECT b.*, s.name as service_name, s.price 
                  FROM {$this->table} b 
                  LEFT JOIN services s ON b.service_id = s.id 
                  WHERE b.id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    
    // Ambil booking yang pending
    public function getPendingBookings()
    {
        $query = "SELECT b.*, s.name as service_name 
                  FROM {$this->table} b 
                  LEFT JOIN services s ON b.service_id = s.id 
                  WHERE b.status = 'pending' 
                  ORDER BY b.created_at DESC 
                  LIMIT 5";
        
        $this->db->query($query);
        return $this->db->resultSet();
    }
    
    // Tambah booking baru (dari customer)
    public function addBooking($data)
    {
        $query = "INSERT INTO bookings 
                  (service_id, customer_name, email, phone, booking_date, address, notes) 
                  VALUES 
                  (:service_id, :customer_name, :email, :phone, :booking_date, :address, :notes)";
        
        $this->db->query($query);
        $this->db->bind('service_id', $data['service_id']);
        $this->db->bind('customer_name', $data['customer_name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('booking_date', $data['booking_date']);
        $this->db->bind('address', $data['address']);
        $this->db->bind('notes', $data['notes'] ?? '');
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Update booking lengkap
    public function updateBooking($data)
    {
        $query = "UPDATE bookings SET 
                  service_id = :service_id,
                  customer_name = :customer_name,
                  email = :email,
                  phone = :phone,
                  booking_date = :booking_date,
                  address = :address,
                  notes = :notes,
                  status = :status
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('service_id', $data['service_id']);
        $this->db->bind('customer_name', $data['customer_name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('booking_date', $data['booking_date']);
        $this->db->bind('address', $data['address']);
        $this->db->bind('notes', $data['notes'] ?? '');
        $this->db->bind('status', $data['status']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Hapus booking
    public function deleteBooking($id)
    {
        $query = "DELETE FROM bookings WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Hitung total booking
    public function countBookings()
    {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }
    
    // Hitung booking berdasarkan status
    public function countByStatus($status)
    {
        $query = "SELECT COUNT(*) as total FROM {$this->table} WHERE status = :status";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $result = $this->db->single();
        return $result['total'];
    }
}