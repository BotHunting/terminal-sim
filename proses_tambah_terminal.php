<?php
// Sertakan file koneksi.php
include_once 'koneksi.php';

// Ambil data dari formulir tambah terminal
$lokasi = $_POST['lokasi'];

// Query untuk menambahkan data terminal ke dalam database
$sql = "INSERT INTO Terminal (lokasi) VALUES ('$lokasi')";

if ($koneksi->query($sql) === TRUE) {
    // Jika berhasil, redirect kembali ke halaman tampil_terminal.php
    header("Location: tambah_terminal.php");
} else {
    // Jika terjadi kesalahan, tampilkan pesan kesalahan
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi database
$koneksi->close();
?>
