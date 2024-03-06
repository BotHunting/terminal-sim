<?php
// Sertakan file koneksi.php
include_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim melalui form
    $id = $_POST['id'];
    $lokasi = $_POST['lokasi'];

    // Query untuk memperbarui data terminal berdasarkan ID
    $sql = "UPDATE Terminal SET lokasi='$lokasi' WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        // Jika update berhasil, redirect kembali ke halaman utama dengan pesan sukses
        header("location: tambah_terminal.php?pesan=edit_sukses");
    } else {
        // Jika terjadi kesalahan, redirect kembali ke halaman utama dengan pesan error
        header("location: tambah_terminal.php?pesan=edit_gagal");
    }
} else {
    // Jika form tidak disubmit melalui metode POST, redirect kembali ke halaman utama dengan pesan error
    header("location: tambah_terminal.php?pesan=edit_gagal");
}

// Tutup koneksi database
$koneksi->close();
?>
