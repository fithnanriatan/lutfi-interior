<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Welcome to Lutfi-Interior</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= BASEURL; ?>/assets/img/favicon.png" rel="icon">
    <link href="<?= BASEURL; ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= BASEURL; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= BASEURL; ?>/assets/css/main.css" rel="stylesheet">

    <style>
        .portfolio-img {
            width: 100%;
            /* Lebar mengikuti kolom (col-lg-4) */
            height: 250px;
            /* Tentukan tinggi tetap (sesuaikan kebutuhan) */
            object-fit: cover;
            /* KUNCI: Memotong gambar agar pas tanpa gepeng */
            object-position: center;
            /* Fokus gambar di tengah */
            border-radius: 5px;
            /* Opsional: memperhalus sudut */
        }
    </style>



    <!-- =======================================================
  * Template Name: eNno
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="<?= BASEURL; ?>" width="600px" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="<?= BASEURL; ?>/img/logo.png" alt="">
                <h5 class="sitename fw-bold mt-2">LUTFI-INTERIOR</h5>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#services">Layanan</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#testimonials">Testimoni</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="<?= BASEURL; ?>/auth/login">Admin</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                        <h1>Solusi Interior Masa Kini</h1>
<p>Ciptakan suasana baru yang lebih hidup dengan desain interior profesional sesuai karakter Anda.</p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">Get Started</a>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
                        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>About Us<br></span>
                <h2>About</h2>
                <p>Berdedikasi mengubah setiap sudut ruangan Anda menjadi karya seni yang fungsional, nyaman, dan bernilai tinggi.</p>
            </div><!-- End Section Title -->

           <div class="container">

    <div class="row gy-4">
        <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Menciptakan Ruang yang Nyaman, Fungsional, dan Estetik.</h3>
            
            <p class="fst-italic">
                Kami percaya bahwa interior yang baik bukan hanya soal keindahan visual, tetapi juga tentang bagaimana ruangan tersebut membuat Anda merasa nyaman dan produktif setiap hari.
            </p>
            
            <ul>
                <li><i class="bi bi-check2-all"></i> <span>Desain kustom yang disesuaikan dengan kebutuhan dan karakter unik Anda.</span></li>
                <li><i class="bi bi-check2-all"></i> <span>Penggunaan material berkualitas tinggi untuk daya tahan jangka panjang.</span></li>
                <li><i class="bi bi-check2-all"></i> <span>Transparansi biaya dan pengerjaan tepat waktu oleh tim profesional berpengalaman.</span></li>
            </ul>
            
            <p>
                Dari konsep awal hingga sentuhan akhir, kami berdedikasi untuk mewujudkan visi Anda. Percayakan transformasi hunian, kantor, atau tempat usaha Anda kepada kami untuk hasil yang memuaskan dan berkelas.
            </p>
        </div>
    </div>

</div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Clients</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Workers</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Layanan Kami</span>
                <h2>Layanan Kami</h2>
                <p>Berbagai layanan desain interior untuk kebutuhan Anda</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">
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

        </section><!-- /Services Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Portfolio Kami</span>
                <h2>Portfolio Kami</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <?php
                        // 1. Ambil semua nilai dari kolom 'category'
                        $allCategories = array_column($data['portfolios'], 'category');

                        // 2. Hapus duplikat (saring agar sisa 1 untuk setiap jenis)
                        $uniqueCategories = array_unique($allCategories);
                        ?>

                        <?php foreach ($uniqueCategories as $category): ?>
                            <li data-filter=".filter-<?= $category; ?>"><?= $category; ?></li>
                        <?php endforeach; ?>

                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        <?php if (!empty($data['portfolios'])): ?>
                            <?php foreach ($data['portfolios'] as $portfolio): ?>
                                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?= $portfolio['category']; ?>">
                                    <?php
                                    $imagePath = BASEURL . '/img/portfolios/' . $portfolio['image'];
                                    // Cek file fisik (pastikan path direktori benar sesuai struktur folder Anda)
                                    if (!file_exists('../public/img/portfolios/' . $portfolio['image'])) {
                                        $imagePath = BASEURL . '/img/default-portfolio.jpg';
                                    }
                                    ?>

                                    <div class="portfolio-wrap">
                                        <img src="<?= $imagePath; ?>" class="img-fluid portfolio-img" alt="<?= $portfolio['project_name']; ?>">

                                        <div class="portfolio-info">
                                            <h4><?= $portfolio['category']; ?></h4>
                                            <h6><?= $portfolio['project_name']; ?></h6>
                                            <p><?= substr($portfolio['description'], 0, 120); ?>...</p>
                                        </div>
                                    </div>

                                </div><?php endforeach; ?>

                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    Belum ada portfolio tersedia
                                </div>
                            </div>
                        <?php endif; ?>

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Testimoni Pelanggan</span>
                <h2>Testimoni</h2>
                <p class="lead text-muted">Apa kata mereka tentang kami</p>

            </div><!-- End Section Title -->
            <div class="container mb-5 text-center" data-aos="fade-up" data-aos-delay="100">
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
            <div class="container" data-aos="fade-up" data-aos-delay="100">

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

        </section><!-- /Testimonials Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section accent-background">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Call To Action</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a class="cta-btn" href="#">Call To Action</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Call To Action Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>Kontak Kami</span>
                <h2>Kontak Kami</h2>
                <p>Kontak Kami Untuk Detail Lebih Lanjut</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p>A108 Adam Street, New York, NY 535022</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Us</h3>
                                    <p>+1 5589 55488 55</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Us</h3>
                                    <p>info@example.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Your Name</label>
                                    <input type="text" name="name" id="name-field" class="form-control" required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email-field" required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field" required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Message</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">eNno</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">eNno</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>