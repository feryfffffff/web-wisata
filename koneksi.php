<?php
// Konfigurasi database
$host = "localhost"; // Host database Anda
$user = "root";      // Username database Anda
$pass = "";          // Password database Anda (kosong jika tidak ada)
$db_name = "db_perjalanan_wisata"; // Nama database yang telah Anda buat

// Buat koneksi menggunakan MySQLi
$conn = new mysqli($host, $user, $pass, $db_name);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>
