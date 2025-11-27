<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #8B4513;
            --secondary-color: #D2691E;
            --dark-color: #2c3e50;
            --light-color: #f8f9fa;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        /* Navbar */
        .navbar-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s;
            margin: 0 0.5rem;
        }
        
        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.9), rgba(210, 105, 30, 0.9)),
                        url('<?= BASEURL; ?>/img/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: white;
            padding-top: 80px;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.3);
            margin-bottom: 1.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
        }
        
        /* Section Title */
        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60%;
            height: 4px;
            background: var(--secondary-color);
        }
        
        /* Card Styling */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        
        /* Button */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 0.8rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s;
            color: white;
        }
        
        .btn-primary-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.4);
            color: white;
            text-decoration: none;
        }
        
        /* Footer */
        footer {
            background: var(--dark-color);
            color: white;
            padding: 3rem 0 1rem;
        }
        
        footer a {
            color: white;
            transition: all 0.3s;
        }
        
        footer a:hover {
            color: var(--secondary-color);
        }
        
        /* Scroll to Top Button */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            z-index: 999;
            transition: all 0.3s;
        }
        
        .scroll-top:hover {
            transform: scale(1.1);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>">
                <i class="fas fa-couch"></i> Lutfi Interior
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/auth/login">
                            <i class="fas fa-lock"></i> Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-title">
                        Wujudkan Ruang Impian Anda
                    </h1>
                    <p class="hero-subtitle">
                        Desain interior profesional untuk hunian dan bisnis Anda. 
                        Kreativitas, fungsionalitas, dan estetika dalam satu kesatuan.
                    </p>
                    <a href="#services" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-arrow-circle-right"></i> Lihat Layanan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Layanan Kami</h2>
                <p class="lead text-muted">Berbagai layanan desain interior untuk kebutuhan Anda</p>
            </div>
            
            <div class="row">
                <?php var_dump($data)?>
                <?php if (!empty($data['services'])): ?>
                    <?php foreach ($data['services'] as $service): ?>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card h-100">
                                <?php 
                                $imagePath = BASEURL . '/img/services/' . $service['image'];
                                if (!file_exists('../public/img/services/' . $service['image'])) {
                                    $imagePath = BASEURL . '/img/default-service.jpg';
                                }
                                ?>
                                <img src="<?= $imagePath; ?>" class="card-img-top" alt="<?= $service['name']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: var(--primary-color);">
                                        <?= $service['name']; ?>
                                    </h5>
                                    <p class="card-text text-muted">
                                        <?= substr($service['description'], 0, 100); ?>...
                                    </p>
                                    <h4 class="text-primary mb-3">
                                        Rp <?= number_format($service['price'], 0, ',', '.'); ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Belum ada layanan tersedia
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Portfolio Kami</h2>
                <p class="lead text-muted">Proyek-proyek yang telah kami kerjakan</p>
            </div>
            
            <div class="row">
                <?php if (!empty($data['portfolios'])): ?>
                    <?php foreach ($data['portfolios'] as $portfolio): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100">
                                <?php 
                                $imagePath = BASEURL . '/img/portfolios/' . $portfolio['image'];
                                if (!file_exists('../public/img/portfolios/' . $portfolio['image'])) {
                                    $imagePath = BASEURL . '/img/default-portfolio.jpg';
                                }
                                ?>
                                <img src="<?= $imagePath; ?>" class="card-img-top" alt="<?= $portfolio['project_name']; ?>">
                                <div class="card-body">
                                    <span class="badge badge-primary mb-2"><?= $portfolio['category']; ?></span>
                                    <h5 class="card-title"><?= $portfolio['project_name']; ?></h5>
                                    <p class="card-text text-muted">
                                        <?= substr($portfolio['description'], 0, 120); ?>...
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Belum ada portfolio tersedia
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Testimoni Pelanggan</h2>
                <p class="lead text-muted">Apa kata mereka tentang kami</p>
                <?php if (isset($data['averageRating']) && $data['averageRating'] > 0): ?>
                    <div class="mb-3">
                        <span class="h4">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <?php if ($i <= $data['averageRating']): ?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php else: ?>
                                    <i class="far fa-star text-warning"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </span>
                        <span class="ml-2"><?= $data['averageRating']; ?>/5</span>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="row">
                <?php if (!empty($data['reviews'])): ?>
                    <?php foreach ($data['reviews'] as $review): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($i <= $review['rating']): ?>
                                                <i class="fas fa-star text-warning"></i>
                                            <?php else: ?>
                                                <i class="far fa-star text-warning"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                    <p class="card-text">"<?= $review['comment']; ?>"</p>
                                    <footer class="blockquote-footer mt-3">
                                        <?= $review['customer_name']; ?>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Belum ada testimoni tersedia
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white;">
        <div class="container text-center">
            <h2 class="mb-4">Siap Mengubah Ruang Anda?</h2>
            <p class="lead mb-4">Hubungi kami sekarang untuk konsultasi gratis!</p>
            <a href="https://wa.me/6281234567890" class="btn btn-light btn-lg" target="_blank">
                <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3"><i class="fas fa-couch"></i> Lutfi Interior</h5>
                    <p>Jasa desain interior profesional untuk hunian dan komersial Anda. Wujudkan ruang impian dengan sentuhan kreativitas dan fungsionalitas.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Kontak Kami</h5>
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Desain Interior No. 123, Jakarta</p>
                    <p><i class="fas fa-phone"></i> +62 812-3456-7890</p>
                    <p><i class="fas fa-envelope"></i> info@lutfiinterior.com</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Ikuti Kami</h5>
                    <div>
                        <a href="#" class="text-white mr-3"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#" class="text-white mr-3"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-white mr-3"><i class="fab fa-whatsapp fa-2x"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.2)">
            <div class="row">
                <div class="col text-center">
                    <p class="mb-0">&copy; <?= date('Y'); ?> Lutfi Interior. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="<?= BASEURL; ?>/js/bootstrap.min.js"></script>
    
    <script>
        // Smooth scrolling
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            var target = $(this.hash);
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 70
                }, 800);
            }
        });
        
        // Scroll to top button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('#scrollTop').fadeIn();
            } else {
                $('#scrollTop').fadeOut();
            }
        });
        
        $('#scrollTop').click(function() {
            $('html, body').animate({scrollTop: 0}, 800);
        });
    </script>
</body>
</html>