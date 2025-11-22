<?php
/**
 * ============================================
 * FILE KONEKSI DATABASE
 * ============================================
 * File ini berisi konfigurasi koneksi ke database MySQL
 * dan akan di-include di setiap file yang membutuhkan akses database
 */

// Konfigurasi Database
$db_host = 'localhost';      // Host database (biasanya localhost)
$db_user = 'root';           // Username MySQL (default: root)
$db_pass = '';               // Password MySQL (default: kosong di XAMPP)
$db_name = 'lutfi_interior'; // Nama database yang sudah dibuat

// Membuat koneksi ke database menggunakan mysqli
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Cek apakah koneksi berhasil
if (!$conn) {
    // Jika gagal, tampilkan pesan error dan hentikan script
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Set charset ke UTF-8 untuk mendukung karakter Indonesia
mysqli_set_charset($conn, "utf8");

// Pesan sukses (hanya untuk testing, comment setelah selesai)
// echo "Koneksi database berhasil!";
?>