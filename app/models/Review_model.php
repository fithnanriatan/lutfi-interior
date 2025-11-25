<?php

class Review_model {
    
    private $table = 'reviews';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }
    
    // Ambil semua review
    public function getAllReviews()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC');
        return $this->db->resultSet();
    }
    
    // Ambil review yang sudah disetujui (untuk tampilan depan)
    public function getApprovedReviews($limit = null)
    {
        $query = "SELECT * FROM {$this->table} WHERE is_approved = 1 ORDER BY created_at DESC";
        
        if ($limit) {
            $query .= " LIMIT :limit";
        }
        
        $this->db->query($query);
        
        if ($limit) {
            $this->db->bind('limit', $limit, PDO::PARAM_INT);
        }
        
        return $this->db->resultSet();
    }
    
    // Ambil review berdasarkan ID
    public function getReviewById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    
    // Tambah review baru (dari customer)
    public function addReview($data)
    {
        $query = "INSERT INTO reviews (customer_name, rating, comment) 
                  VALUES (:customer_name, :rating, :comment)";
        
        $this->db->query($query);
        $this->db->bind('customer_name', $data['customer_name']);
        $this->db->bind('rating', $data['rating']);
        $this->db->bind('comment', $data['comment']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Update review
    public function updateReview($data)
    {
        $query = "UPDATE reviews SET 
                  customer_name = :customer_name,
                  rating = :rating,
                  comment = :comment,
                  is_approved = :is_approved
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('customer_name', $data['customer_name']);
        $this->db->bind('rating', $data['rating']);
        $this->db->bind('comment', $data['comment']);
        $this->db->bind('is_approved', $data['is_approved']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Approve review
    public function approveReview($id)
    {
        $query = "UPDATE reviews SET is_approved = 1 WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Unapprove review
    public function unapproveReview($id)
    {
        $query = "UPDATE reviews SET is_approved = 0 WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Hapus review
    public function deleteReview($id)
    {
        $query = "DELETE FROM reviews WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Hitung total review
    public function countReviews()
    {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }
    
    // Hitung review yang belum disetujui
    public function countPendingReviews()
    {
        $query = "SELECT COUNT(*) as total FROM {$this->table} WHERE is_approved = 0";
        $this->db->query($query);
        $result = $this->db->single();
        return $result['total'];
    }
    
    // Hitung rata-rata rating
    public function getAverageRating()
    {
        $query = "SELECT AVG(rating) as average FROM {$this->table} WHERE is_approved = 1";
        $this->db->query($query);
        $result = $this->db->single();
        return round($result['average'], 1);
    }
}