-- ============================================
-- DATABASE: LUTFI GRAND INTERIOR
-- Sistem Manajemen Jasa Desain Interior
-- ============================================

-- Buat database baru
CREATE DATABASE IF NOT EXISTS lutfi_interior;
USE lutfi_interior;

-- ============================================
-- TABEL 1: SERVICES (Layanan Desain)
-- ============================================
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data services
INSERT INTO services (name, description, price, image, status) VALUES
('Desain Interior Rumah', 'Layanan desain interior rumah minimalis modern dengan konsep yang elegan dan fungsional', 15000000, 'rumah.jpg', 'active'),
('Desain Interior Kantor', 'Desain ruang kantor yang profesional dan meningkatkan produktivitas karyawan', 25000000, 'kantor.jpg', 'active'),
('Desain Interior Cafe', 'Konsep desain cafe yang instagramable dan nyaman untuk pengunjung', 20000000, 'cafe.jpg', 'active'),
('Konsultasi Desain', 'Konsultasi desain interior untuk membantu mewujudkan hunian impian Anda', 5000000, 'konsultasi.jpg', 'active');

-- ============================================
-- TABEL 2: BOOKINGS (Pemesanan)
-- ============================================
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_id INT NOT NULL,
    customer_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    booking_date DATE NOT NULL,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE
);

-- Insert sample data bookings
INSERT INTO bookings (service_id, customer_name, email, phone, booking_date, status) VALUES
(1, 'Budi Santoso', 'budi@email.com', '081234567890', '2025-12-01', 'pending'),
(2, 'Siti Aminah', 'siti@email.com', '081234567891', '2025-12-05', 'confirmed'),
(3, 'Joko Widodo', 'joko@email.com', '081234567892', '2025-12-10', 'pending');

-- ============================================
-- TABEL 3: PORTFOLIOS (Portfolio Proyek)
-- ============================================
CREATE TABLE portfolios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    category VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data portfolios
INSERT INTO portfolios (project_name, description, image, category) VALUES
('Rumah Minimalis Jakarta', 'Desain interior rumah minimalis 2 lantai di Jakarta Selatan', 'portfolio1.jpg', 'Residential'),
('Kantor Startup Tech', 'Desain interior kantor modern untuk perusahaan teknologi', 'portfolio2.jpg', 'Office'),
('Cafe Vintage Bandung', 'Desain cafe dengan konsep vintage di Bandung', 'portfolio3.jpg', 'Commercial'),
('Apartemen Luxury Surabaya', 'Desain interior apartemen mewah dengan pemandangan laut', 'portfolio4.jpg', 'Residential'),
('Restoran Jepang', 'Desain interior restoran dengan nuansa Jepang modern', 'portfolio5.jpg', 'Commercial'),
('Co-Working Space', 'Desain ruang kerja bersama yang nyaman dan produktif', 'portfolio6.jpg', 'Office');

-- ============================================
-- TABEL 4: REVIEWS (Testimoni)
-- ============================================
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    comment TEXT NOT NULL,
    is_approved TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data reviews
INSERT INTO reviews (customer_name, rating, comment, is_approved) VALUES
('Andi Wijaya', 5, 'Pelayanan sangat memuaskan! Tim desainer sangat profesional dan hasil desainnya melebihi ekspektasi.', 1),
('Maya Putri', 5, 'Rumah saya jadi lebih cantik dan nyaman. Terima kasih Lutfi Grand Interior!', 1),
('Rudi Hartono', 4, 'Desain bagus, harga terjangkau. Proses pengerjaan tepat waktu.', 1),
('Linda Kusuma', 5, 'Sangat puas dengan hasil desain kantor kami. Karyawan jadi lebih semangat kerja!', 0);