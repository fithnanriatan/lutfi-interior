<?php

class Home extends Controller {
    
    public function index()
    {
        $data['title'] = 'Lutfi Interior - Jasa Desain Interior Profesional';
        
        // Ambil data untuk landing page
        $data['services'] = $this->model('Service_model')->getActiveServices();
        $data['portfolios'] = $this->model('Portfolio_model')->getLatestPortfolios(6);
        $data['reviews'] = $this->model('Review_model')->getApprovedReviews(6);
        $data['averageRating'] = $this->model('Review_model')->getAverageRating();
        
        // Load landing page (1 file lengkap)
        $this->view('home/index', $data);
    }
}