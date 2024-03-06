<?php
// Sertakan file koneksi.php
include_once 'koneksi.php';

// Ambil data dari formulir tambah admin
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password']; // Harap dienkripsi sebelum disimpan ke database (misalnya dengan fungsi password_hash)

// Query untuk menambahkan data admin ke dalam database
$sql = "INSERT INTO Admin (nama, username, password) VALUES ('$nama', '$username', '$password')";

if ($koneksi->query($sql) === TRUE) {
    // Jika berhasil, redirect kembali ke halaman tampil_admin.php
    header("Location: tampil_admin.php");
} else {
    // Jika terjadi kesalahan, tampilkan pesan kesalahan
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi database
$koneksi->close();
?>
