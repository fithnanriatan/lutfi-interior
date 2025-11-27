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
    
    
    public function tambah() // fungsi untuk proses tambah review
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Review_model')->addReview($_POST) > 0) {
                Flasher::setFlash('Review berhasil', 'ditambahkan', 'success'); // jika berhasil, tampilkan pesan sukses
            } else {
                Flasher::setFlash('Review gagal', 'ditambahkan', 'danger'); // jika gagal, tampilkan pesan gagal
            }
            header('Location: ' . BASEURL . '/review'); // kembali ke halaman review
            exit;
        }
    }
    
    // Update review
    public function ubah()  // fungsi untuk proses update review
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // jika form disubmit
            if ($this->model('Review_model')->updateReview($_POST) > 0) { // proses update data
                Flasher::setFlash('Review berhasil', 'diubah', 'success'); // jika berhasil, tampilkan pesan sukses
            } else {
                Flasher::setFlash('Tidak ada perubahan', 'atau gagal update', 'warning'); // jika gagal, tampilkan pesan gagal
            }
            header('Location: ' . BASEURL . '/review'); // kembali ke halaman review
            exit;
        }
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
    
    // Ambil data untuk edit (AJAX)
    public function getubah()  // fungsi untuk mengambil data review berdasarkan id
    {
        echo json_encode($this->model('Review_model')->getReviewById($_POST['id']));
    }
}