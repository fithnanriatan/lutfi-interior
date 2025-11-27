<?php

class Booking extends Controller
{

    public function __construct()
    {
        // Cek login
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    // Halaman daftar booking
    public function index()
    {
        $data['title'] = 'Kelola Pemesanan - Lutfi Interior';
        $data['bookings'] = $this->model('Booking_model')->getAllBookings();
        $data['services'] = $this->model('Service_model')->getAllServices();

        $this->view('templets/admin_header', $data);
        $this->view('admin/booking/index', $data);
        $this->view('templets/admin_footer');
    }

    // Tambah booking
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Booking_model')->addBooking($_POST) > 0) {
                Flasher::setFlash('Pemesanan berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('Pemesanan gagal', 'ditambahkan', 'danger');
            }
            header('Location: ' . BASEURL . '/booking');
            exit;
        }
    }

    // Ambil data untuk edit (AJAX)
    public function getubah()
    {
        echo json_encode($this->model('Booking_model')->getBookingById($_POST['id']));
    }

    // Update booking
    public function ubah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Booking_model')->updateBooking($_POST) > 0) {
                Flasher::setFlash('Pemesanan berhasil', 'diubah', 'success');
            } else {
                Flasher::setFlash('Tidak ada perubahan', 'atau gagal update', 'warning');
            }
            header('Location: ' . BASEURL . '/booking');
            exit;
        }
    }

    // Hapus booking
    public function hapus($id)
    {
        if ($this->model('Booking_model')->deleteBooking($id) > 0) {
            Flasher::setFlash('Pemesanan berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('Pemesanan gagal', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/booking');
        exit;
    }
}