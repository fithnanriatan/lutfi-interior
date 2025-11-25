<?php

class Service extends Controller {
    
    public function __construct()
    {
        // Cek login
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }
    
    // Halaman daftar layanan
    public function index()
    {
        $data['title'] = 'Kelola Layanan - Lutfi Interior';
        $data['services'] = $this->model('Service_model')->getAllServices();
        
        $this->view('templets/admin_header', $data);
        $this->view('admin/service/index', $data);
        $this->view('templets/admin_footer');
    }
    
    // Tambah layanan
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Service_model')->addService($_POST, $_FILES) > 0) {
                Flasher::setFlash('Layanan berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('Layanan gagal', 'ditambahkan', 'danger');
            }
            header('Location: ' . BASEURL . '/service');
            exit;
        }
    }
    
    // Ambil data untuk edit (AJAX)
    public function getubah()
    {
        echo json_encode($this->model('Service_model')->getServiceById($_POST['id']));
    }
    
    // Update layanan
    public function ubah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Service_model')->updateService($_POST, $_FILES) > 0) {
                Flasher::setFlash('Layanan berhasil', 'diubah', 'success');
            } else {
                Flasher::setFlash('Tidak ada perubahan', 'atau gagal update', 'warning');
            }
            header('Location: ' . BASEURL . '/service');
            exit;
        }
    }
    
    // Hapus layanan
    public function hapus($id)
    {
        if ($this->model('Service_model')->deleteService($id) > 0) {
            Flasher::setFlash('Layanan berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('Layanan gagal', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/service');
        exit;
    }
}