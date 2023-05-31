<?php
// Set informasi koneksi database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "kampus";
// Buat koneksi ke database
$con = mysqli_connect($hostname, $username, $password, $database);

// Periksa apakah koneksi berhasil dibuat
if (!$con) {
    // Tampilkan pesan error jika koneksi gagal
    die("Koneksi database gagal: " . mysqli_connect_error());
}
