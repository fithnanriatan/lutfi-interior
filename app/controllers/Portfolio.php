<?php 

class Portfolio extends Controller {
    
    public function __construct() 
    {
        // Cek apakah sudah login atau belum
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login'); // jika belum login, ke halaman login
            exit;
        }
    }

    // jika sudah login lanjut ke halaman portfolio
    public function index()
    {
        $data['title'] = 'Kelola Portfolio - Lutfi Interior'; // variabel yang berisi judul halaman
        $data['portfolios'] = $this->model('Portfolio_model')->getAllPortfolios(); // mengambil semua data portfolio
        
        // kirim ke view
        $this->view('templets/admin_header', $data);
        $this->view('admin/portfolio/index', $data);
        $this->view('templets/admin_footer');
    }
    
    // Tambah portfolio
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // jika form disubmit
            if ($this->model('Portfolio_model')->addPortfolio($_POST, $_FILES) > 0) { // proses tambah data
                Flasher::setFlash('Portfolio berhasil', 'ditambahkan', 'success'); // jika berhasil, tampilkan pesan sukses
            } else {
                Flasher::setFlash('Portfolio gagal', 'ditambahkan', 'danger'); // jika gagal, tampilkan pesan gagal
            }
            header('Location: ' . BASEURL . '/portfolio'); // kembali ke halaman portfolio
            exit;
        }
    }

    // Ambil data untuk edit (AJAX)
    public function getUbah(){
        echo json_encode($this->model('Portfolio_model')->getPortfolioById($_POST['id']));
    }

    // Update portfolio
    public function ubah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // jika form disubmit
            if ($this->model('Portfolio_model')->updatePortfolio($_POST, $_FILES) > 0) { // proses update data
                Flasher::setFlash('Portfolio berhasil', 'diubah', 'success'); // jika berhasil, tampilkan pesan sukses
            } else {
                Flasher::setFlash('Tidak ada perubahan', 'atau gagal update', 'warning'); // jika gagal, tampilkan pesan gagal
            }
            header('Location: ' . BASEURL . '/portfolio'); // kembali ke halaman portfolio
            exit;
        }
    }

    // Hapus portfolio
    public function hapus($id)
    {
        if ($this->model('Portfolio_model')->deletePortfolio($id) > 0) {
            Flasher::setFlash('Portfolio berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('Portfolio gagal', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/portfolio');
        exit;
    }
}
?>