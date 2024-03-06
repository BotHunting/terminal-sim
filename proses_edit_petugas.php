<?php
// Periksa apakah ada pengiriman data melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah ID petugas telah dikirim melalui metode POST
    if (isset($_POST['id'])) {
        // Sertakan file koneksi.php
        include_once 'koneksi.php';

        // Escape input pengguna untuk menghindari serangan SQL Injection
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $nomor_identitas = mysqli_real_escape_string($koneksi, $_POST['nomor_identitas']);
        $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
        $jadwal_kerja = mysqli_real_escape_string($koneksi, $_POST['jadwal_kerja']);

        // Query SQL untuk memperbarui data petugas berdasarkan ID
        $sql = "UPDATE petugas SET nama='$nama', nomor_identitas='$nomor_identitas', jabatan='$jabatan', jadwal_kerja='$jadwal_kerja' WHERE id='$id'";

        if (mysqli_query($koneksi, $sql)) {
            // Jika query berhasil dieksekusi, kembalikan ke halaman tambah_petugas.php dengan pesan sukses
            header("Location: tambah_petugas.php?edit=success");
            exit();
        } else {
            // Jika terjadi kesalahan saat menjalankan query, kembalikan ke halaman tambah_petugas.php dengan pesan kesalahan
            header("Location: tambah_petugas.php?error=sqlerror");
            exit();
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
    } else {
        // Jika tidak ada ID petugas yang dikirim melalui metode POST, kembalikan ke halaman tambah_petugas.php
        header("Location: tambah_petugas.php");
        exit();
    }
} else {
    // Jika pengguna mencoba mengakses halaman ini secara langsung tanpa menggunakan metode POST, kembalikan ke halaman tambah_petugas.php
    header("Location: tambah_petugas.php");
    exit();
}
?>
