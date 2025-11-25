<?php 

class Portfolio extends Controller {
    
    public function __construct()
    {
        // Cek login
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }
    
    // Halaman daftar portfolio
    public function index()
    {
        $data['title'] = 'Kelola Portfolio - Lutfi Interior';
        $data['portfolios'] = $this->model('Portfolio_model')->getAllPortfolios();
        
        $this->view('templets/admin_header', $data);
        $this->view('admin/portfolio/index', $data);
        $this->view('templets/admin_footer');
    }
    
    // Tambah portfolio
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Portfolio_model')->addPortfolio($_POST, $_FILES) > 0) {
                Flasher::setFlash('Portfolio berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('Portfolio gagal', 'ditambahkan', 'danger');
            }
            header('Location: ' . BASEURL . '/portfolio');
            exit;
        }
    }
}
?>