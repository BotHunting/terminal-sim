<?php
// Konfigurasi koneksi ke database
$host = 'localhost'; // Host database (biasanya 'localhost')
$username = 'root'; // Nama pengguna database
$password = ''; // Kata sandi database
$database = 'terminal_sim'; // Nama database

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Set encoding UTF-8 untuk koneksi
$koneksi->set_charset("utf8");
?>
