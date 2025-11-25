-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2025 at 12:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lutfi_interior`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `service_id` int NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `booking_date` date NOT NULL,
  `address` text,
  `notes` text,
  `status` enum('pending','confirmed','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `service_id`, `customer_name`, `email`, `phone`, `booking_date`, `address`, `notes`, `status`, `created_at`) VALUES
(1, 1, 'Budi Santoso', 'budi@email.com', '081234567890', '2024-12-01', 'Jl. Sudirman No. 123, Jakarta', 'Ingin konsultasi desain untuk rumah 2 lantai', 'pending', '2025-11-24 07:05:23'),
(2, 2, 'Siti Aminah', 'siti@email.com', '082345678901', '2024-12-05', 'Jl. Gatot Subroto No. 45, Bandung', 'Kantor startup, butuh desain modern', 'confirmed', '2025-11-24 07:05:23'),
(3, 3, 'Andi Wijaya', 'andi@email.com', '083456789012', '2024-11-28', 'Jl. Ahmad Yani No. 78, Surabaya', 'Kafe dengan tema industrial', 'completed', '2025-11-24 07:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int NOT NULL,
  `project_name` varchar(150) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `project_name`, `description`, `image`, `category`, `created_at`) VALUES
(1, 'Modern Living Room - Jakarta', 'Desain ruang tamu modern dengan nuansa abu-abu dan putih. Menggunakan material premium dengan pencahayaan LED tersembunyi.', 'portfolio1.jpg', 'Residential', '2025-11-24 07:05:23'),
(2, 'Co-Working Space - Bandung', 'Ruang kerja bersama untuk startup dengan desain open space, meeting room, dan area santai.', 'portfolio2.jpg', 'Commercial', '2025-11-24 07:05:23'),
(3, 'Minimalist Bedroom - Tangerang', 'Kamar tidur minimalis Jepang dengan penyimpanan tersembunyi dan furnitur multifungsi.', 'portfolio3.jpg', 'Residential', '2025-11-24 07:05:23'),
(4, 'Coffee Shop - Bali', 'Kafe dengan konsep tropical modern, area outdoor dan indoor dengan view sawah.', 'portfolio4.jpg', 'F&B', '2025-11-24 07:05:23'),
(5, 'CEO Office - Surabaya', 'Ruang direktur mewah dengan panel kayu walnut dan furniture custom made.', 'portfolio5.jpg', 'Commercial', '2025-11-24 07:05:23'),
(6, 'Kids Bedroom - Semarang', 'Kamar anak ceria dengan tema luar angkasa, area belajar, dan tempat bermain.', 'portfolio6.jpg', 'Residential', '2025-11-24 07:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `rating` int NOT NULL,
  `comment` text,
  `is_approved` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `customer_name`, `rating`, `comment`, `is_approved`, `created_at`) VALUES
(1, 'Rahmat Hidayat', 5, 'Pelayanan sangat memuaskan! Tim Lutfi Grand Interior sangat profesional dan hasil desainnya melebihi ekspektasi. Highly recommended!', 0, '2025-11-24 07:05:23'),
(2, 'Diana Putri', 5, 'Desain rumah saya jadi lebih modern dan fungsional. Proses pengerjaan cepat dan rapi. Terima kasih Lutfi Grand Interior!', 1, '2025-11-24 07:05:23'),
(3, 'Agus Setiawan', 4, 'Bagus sekali hasil kerjanya. Hanya saja proses revisi agak lama, tapi overall puas dengan hasilnya.', 1, '2025-11-24 07:05:23'),
(4, 'Linda Kusuma', 5, 'Sudah 3x pakai jasa Lutfi Grand Interior untuk project berbeda. Selalu puas! Tim yang solid dan kreatif.', 1, '2025-11-24 07:05:23'),
(5, 'Fajar Ramadan', 4, 'Desain kafe saya jadi hits di Instagram! Banyak yang datang karena tempatnya aesthetic. Good job!', 0, '2025-11-24 07:05:23'),
(6, 'Karin', 5, 'bla bla bla', 0, '2025-11-25 10:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Desain Interior Rumah Minimalis', 'Desain modern dan minimalis untuk hunian Anda. Termasuk konsultasi, gambar 3D, dan pemilihan material.', 5000000.00, 'minimalist.jpg', 'active', '2025-11-24 07:05:23', '2025-11-24 07:05:23'),
(2, 'Desain Interior Kantor', 'Ciptakan ruang kerja yang produktif dan nyaman. Desain ergonomis dengan konsep modern.', 8000000.00, 'office.jpg', 'active', '2025-11-24 07:05:23', '2025-11-24 07:05:23'),
(3, 'Desain Interior Kafe & Restoran', 'Desain unik dan instagramable untuk bisnis F&B Anda. Termasuk layout dan pemilihan furnitur.', 12000000.00, 'cafe.jpg', 'active', '2025-11-24 07:05:23', '2025-11-24 07:05:23'),
(4, 'Renovasi & Redesign', 'Ubah tampilan ruangan lama menjadi lebih fresh. Konsultasi renovasi total atau parsial.', 6000000.00, 'renovation.jpg', 'active', '2025-11-24 07:05:23', '2025-11-24 07:05:23'),
(5, 'Pasang GIgi', 'saldfkjals;df lksajfd;lkajsd;lfjlsa;df kdsfj;lakj', 50000.00, '69257beda49f5.jpeg', 'active', '2025-11-25 09:50:37', '2025-11-25 09:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `created_at`) VALUES
(4, 'admin', '$2y$10$v75GxWjg7ToMj8FNgbs3I.uQ2QrcEBqTehM/EMPd4KsAyplBfyTqK', 'Administrator', '2025-11-25 09:43:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
