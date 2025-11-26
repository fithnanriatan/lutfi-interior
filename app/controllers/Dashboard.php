<?php

class Dashboard extends Controller {
    
    public function __construct()
    {
        // Cek login
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard Admin - Lutfi Interior';
        
        // Statistik
        // $data['totalServices'] = $this->model('Service_model')->countServices();
        // $data['totalBookings'] = $this->model('Booking_model')->countBookings();
        // $data['totalPortfolios'] = $this->model('Portfolio_model')->countPortfolios();
        // $data['totalReviews'] = $this->model('Review_model')->countReviews();
        
        // // Data pending
        // $data['pendingBookings'] = $this->model('Booking_model')->countByStatus('pending');
        // $data['pendingReviews'] = $this->model('Review_model')->countPendingReviews();
        
        // // Recent bookings
        // $data['recentBookings'] = $this->model('Booking_model')->getPendingBookings();
        
        $this->view('templets/admin_header', $data);
        $this->view('admin/dashboard', $data);
        $this->view('templets/admin_footer');
    }
}