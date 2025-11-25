<?php

class Service_model {
    
    private $table = 'services';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }
    
    // Ambil semua layanan
    public function getAllServices()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC');
        return $this->db->resultSet();
    }
    
    // Ambil layanan aktif saja (untuk halaman depan)
    public function getActiveServices()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE status = "active" ORDER BY id DESC');
        return $this->db->resultSet();
    }
    
    // Ambil layanan berdasarkan ID
    public function getServiceById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    
    // Tambah layanan baru
    public function addService($data, $files)
    {
        // Upload image
        $imageName = $this->uploadImage($files);
        
        $query = "INSERT INTO services (name, description, price, image, status) 
                  VALUES (:name, :description, :price, :image, :status)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('image', $imageName);
        $this->db->bind('status', $data['status']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Update layanan
    public function updateService($data, $files)
    {
        // Cek apakah ada upload image baru
        if (!empty($files['image']['name'])) {
            $imageName = $this->uploadImage($files);
            
            // Hapus image lama
            $oldData = $this->getServiceById($data['id']);
            if ($oldData['image'] && file_exists('../public/img/services/' . $oldData['image'])) {
                unlink('../public/img/services/' . $oldData['image']);
            }
        } else {
            // Gunakan image lama
            $oldData = $this->getServiceById($data['id']);
            $imageName = $oldData['image'];
        }
        
        $query = "UPDATE services SET 
                  name = :name,
                  description = :description,
                  price = :price,
                  image = :image,
                  status = :status
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('image', $imageName);
        $this->db->bind('status', $data['status']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Hapus layanan
    public function deleteService($id)
    {
        // Hapus image
        $data = $this->getServiceById($id);
        if ($data['image'] && file_exists('../public/img/services/' . $data['image'])) {
            unlink('../public/img/services/' . $data['image']);
        }
        
        $query = "DELETE FROM services WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // Hitung total layanan
    public function countServices()
    {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $result = $this->db->single();
        return $result['total'];
    }
    
    // Upload image
    private function uploadImage($files)
    {
        $targetDir = "../public/img/services/";
        
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