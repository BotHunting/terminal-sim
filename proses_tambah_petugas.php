<?php
// Sertakan file koneksi.php
include_once 'koneksi.php';

// Ambil data dari formulir tambah petugas
$nama = $_POST['nama'];
$nomor_identitas = $_POST['nomor_identitas'];
$jabatan = $_POST['jabatan'];
$jadwal_kerja = $_POST['jadwal_kerja'];

// Query untuk menambahkan data petugas ke dalam database
$sql = "INSERT INTO Petugas (nama, nomor_identitas, jabatan, jadwal_kerja) VALUES ('$nama', '$nomor_identitas', '$jabatan', '$jadwal_kerja')";

if ($koneksi->query($sql) === TRUE) {
    // Jika berhasil, redirect kembali ke halaman tampil_petugas.php
    header("Location: tambah_petugas.php");
} else {
    // Jika terjadi kesalahan, tampilkan pesan kesalahan
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi database
$koneksi->close();
?>
