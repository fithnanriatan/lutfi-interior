<?php

class Portfolio_model {
    
    private $table = 'portfolios';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }
    
    // Ambil semua portfolio
    public function getAllPortfolios()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC');
        return $this->db->resultSet();
    }
    
    // Ambil portfolio terbaru (untuk homepage)
    public function getLatestPortfolios($limit = 6)
    {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC LIMIT :limit";
        $this->db->query($query);
        $this->db->bind('limit', $limit, PDO::PARAM_INT);
        return $this->db->resultSet();
    }
    
    // Ambil portfolio berdasarkan kategori
    public function getPortfoliosByCategory($category)
    {
        $query = "SELECT * FROM {$this->table} WHERE category = :category ORDER BY created_at DESC";
        $this->db->query($query);
        $this->db->bind('category', $category);
        return $this->db->resultSet();
    }
    
    // Ambil portfolio berdasarkan ID
    public function getPortfolioById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    
    // Tambah portfolio baru
    public function addPortfolio($data, $files)
    {
        // Upload image
        $imageName = $this->uploadImage($files);
        
        $query = "INSERT INTO portfolios (project_name, description, image, category) 
                  VALUES (:project_name, :description, :image, :category)";
        
        $this->db->query($query);
        $this->db->bind('project_name', $data['project_name']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('image', $imageName);
        $this->db->bind('category', $data['category']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Update portfolio
    public function updatePortfolio($data, $files)
    {
        // Cek apakah ada upload image baru
        if (!empty($files['image']['name'])) {
            $imageName = $this->uploadImage($files);
            
            // Hapus image lama
            $oldData = $this->getPortfolioById($data['id']);
            if ($oldData['image'] && file_exists('../public/img/portfolios/' . $oldData['image'])) {
                unlink('../public/img/portfolios/' . $oldData['image']);
            }
        } else {
            // Gunakan image lama
            $oldData = $this->getPortfolioById($data['id']);
            $imageName = $oldData['image'];
        }
        
        $query = "UPDATE portfolios SET 
                  project_name = :project_name,
                  description = :description,
                  image = :image,
                  category = :category
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('project_name', $data['project_name']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('image', $imageName);
        $this->db->bind('category', $data['category']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Hapus portfolio
    public function deletePortfolio($id)
    {
        // Hapus image
        $data = $this->getPortfolioById($id);
        if ($data['image'] && file_exists('../public/img/portfolios/' . $data['image'])) {
            unlink('../public/img/portfolios/' . $data['image']);
        }
        
        $query = "DELETE FROM portfolios WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Hitung total portfolio
    public function countPortfolios()
    {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }
    
    // Ambil semua kategori unik
    public function getAllCategories()
    {
        $query = "SELECT DISTINCT category FROM {$this->table} ORDER BY category ASC";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    
    // Upload image
    private function uploadImage($files)
    {
        $targetDir = "../public/img/portfolios/";
        
        // Buat folder jika belum ada
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        $imageFileType = strtolower(pathinfo($files['image']['name'], PATHINFO_EXTENSION));
        $newFileName = uniqid() . '.' . $imageFileType;
        $targetFile = $targetDir . $newFileName;
        
        // Validasi file
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedTypes)) {
            return 'default.jpg';
        }
        
        // Upload file
        if (move_uploaded_file($files['image']['tmp_name'], $targetFile)) {
            return $newFileName;
        } else {
            return 'default.jpg';
        }
    }
}