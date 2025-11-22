<?php
/**
 * ============================================
 * FILE TEST KONEKSI DATABASE
 * ============================================
 * File ini untuk mengecek apakah koneksi database berhasil
 * Setelah test berhasil, file ini bisa dihapus
 */

// Include file koneksi database
require_once 'includes/db.php';

// Coba query sederhana untuk test
$test_query = "SELECT COUNT(*) as total FROM services";
$result = mysqli_query($conn, $test_query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    echo "<h2>✅ Koneksi Database BERHASIL!</h2>";
    echo "<p>Total layanan di database: " . $data['total'] . "</p>";
} else {
    echo "<h2>❌ Koneksi Database GAGAL!</h2>";
    echo "<p>Error: " . mysqli_error($conn) . "</p>";
}

// Tutup koneksi
mysqli_close($conn);
?>