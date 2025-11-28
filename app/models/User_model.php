<?php

class User_model {
    
    private $table = 'users';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }
    
    // Ambil semua user
    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC');
        return $this->db->resultSet();
    }

       // Ambil user berdasarkan username
    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    // Ambil user berdasarkan ID
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Tambah user baru
    public function addUser($data)
    {
        $query = "INSERT INTO users (username, password, name) 
                    VALUES (:username, :password, :name)";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('name', $data['name']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // Update password
    public function updatePassword($id, $new_password)
    {
        $query = "UPDATE users SET password = :password WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('password', password_hash($new_password, PASSWORD_DEFAULT));
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // Hapus user
    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}