<?php

class Auth extends Controller {
    
    // Halaman login
    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
        
        $data['title'] = 'Login Admin - Lutfi Interior';
        $this->view('auth/login', $data);
    }
    
    // Proses login
    public function proses()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = $this->model('User_model')->getUserByUsername($username);
            
            if ($user) {
                // Verifikasi password
                if (password_verify($password, $user['password'])) {
                    // Set session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['name'] = $user['name'];
                    
                    header('Location: ' . BASEURL . '/dashboard');
                    exit;
                } else {
                    Flasher::setFlash('Login gagal!', 'Password salah', 'danger');
                    header('Location: ' . BASEURL . '/auth/login');
                    exit;
                }
            } else {
                Flasher::setFlash('Login gagal!', 'Username tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/auth/login');
                exit;
            }
        }
    }
    
    // Logout
    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/auth/login');
        exit;
    }
}