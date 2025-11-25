<?php

class Review extends Controller {
    
    public function __construct()
    {
        // Cek login
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }
    
    // Halaman daftar review
    public function index()
    {
        $data['title'] = 'Kelola Review - Lutfi Interior';
        $data['reviews'] = $this->model('Review_model')->getAllReviews();
        
        $this->view('templets/admin_header', $data);
        $this->view('admin/review/index', $data);
        $this->view('templets/admin_footer');
    }
    
    // Tambah review (admin bisa input manual)
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Review_model')->addReview($_POST) > 0) {
                Flasher::setFlash('Review berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('Review gagal', 'ditambahkan', 'danger');
            }
            header('Location: ' . BASEURL . '/review');
            exit;
        }
    }
    
    // Ambil data untuk edit (AJAX)
    public function getubah()
    {
        echo json_encode($this->model('Review_model')->getReviewById($_POST['id']));
    }
    
    // Update review
    public function ubah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Review_model')->updateReview($_POST) > 0) {
                Flasher::setFlash('Review berhasil', 'diubah', 'success');
            } else {
                Flasher::setFlash('Tidak ada perubahan', 'atau gagal update', 'warning');
            }
            header('Location: ' . BASEURL . '/review');
            exit;
        }
    }
    
    // Approve review
    public function approve($id)
    {
        if ($this->model('Review_model')->approveReview($id) > 0) {
            Flasher::setFlash('Review berhasil', 'disetujui', 'success');
        } else {
            Flasher::setFlash('Review gagal', 'disetujui', 'danger');
        }
        header('Location: ' . BASEURL . '/review');
        exit;
    }
    
    // Unapprove review
    public function unapprove($id)
    {
        if ($this->model('Review_model')->unapproveReview($id) > 0) {
            Flasher::setFlash('Review berhasil', 'dibatalkan persetujuannya', 'success');
        } else {
            Flasher::setFlash('Review gagal', 'dibatalkan', 'danger');
        }
        header('Location: ' . BASEURL . '/review');
        exit;
    }
    
    // Hapus review
    public function hapus($id)
    {
        if ($this->model('Review_model')->deleteReview($id) > 0) {
            Flasher::setFlash('Review berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('Review gagal', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/review');
        exit;
    }
}