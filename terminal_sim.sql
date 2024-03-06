-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2024 pada 18.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terminal_sim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(16, 'Thomas Shelby', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan_keluar`
--

CREATE TABLE `kendaraan_keluar` (
  `id` int(11) NOT NULL,
  `nomor_kendaraan` varchar(20) NOT NULL,
  `trayek` varchar(100) NOT NULL,
  `waktu_keberangkatan` datetime NOT NULL,
  `jumlah_penumpang_keluar` int(11) NOT NULL,
  `tujuan_terminal` varchar(100) NOT NULL,
  `retribusi` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kendaraan_keluar`
--

INSERT INTO `kendaraan_keluar` (`id`, `nomor_kendaraan`, `trayek`, `waktu_keberangkatan`, `jumlah_penumpang_keluar`, `tujuan_terminal`, `retribusi`) VALUES
(3, 'PB1234F', 'A', '2024-03-06 20:27:00', 2, 'Terminal Torea', 2000),
(4, 'PB1234F', 'B', '2024-03-06 23:06:00', 5, 'Terminal Kokas', 2000),
(5, 'PB1234F', 'B', '2024-03-06 15:46:00', 21, 'Terminal Torea', 2000),
(6, 'PB1234F', 'A', '2024-03-06 16:24:00', 7, 'Terminal Sebrang', 2000),
(7, 'PB1234F', 'A', '2024-03-06 17:11:00', 7, 'Terminal Kokas', 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan_masuk`
--

CREATE TABLE `kendaraan_masuk` (
  `id` int(11) NOT NULL,
  `nomor_kendaraan` varchar(20) NOT NULL,
  `trayek` varchar(100) NOT NULL,
  `waktu_kedatangan` datetime NOT NULL,
  `jumlah_penumpang_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kendaraan_masuk`
--

INSERT INTO `kendaraan_masuk` (`id`, `nomor_kendaraan`, `trayek`, `waktu_kedatangan`, `jumlah_penumpang_masuk`) VALUES
(1, 'PB1234F', 'A', '2024-03-06 20:23:00', 4),
(2, 'PB1234F', 'A', '2024-03-06 23:05:00', 8),
(3, 'PB1234F', 'C', '0000-00-00 00:00:00', 3),
(4, 'PB1234F', 'C', '2024-03-06 15:44:00', 20),
(5, 'PB1234F', 'A', '2024-03-06 17:11:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_identitas` varchar(20) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `jadwal_kerja` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `nomor_identitas`, `jabatan`, `jadwal_kerja`) VALUES
(1, 'Thomas Shelby', '123456', 'Security', 'Terminal Bomberai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terminal`
--

CREATE TABLE `terminal` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `terminal`
--

INSERT INTO `terminal` (`id`, `lokasi`) VALUES
(2, 'Terminal Sebrang'),
(5, 'Terminal Kokas'),
(6, 'Terminal Bomberai'),
(7, 'Terminal Wartutin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraan_keluar`
--
ALTER TABLE `kendaraan_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraan_masuk`
--
ALTER TABLE `kendaraan_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `terminal`
--
ALTER TABLE `terminal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kendaraan_keluar`
--
ALTER TABLE `kendaraan_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kendaraan_masuk`
--
ALTER TABLE `kendaraan_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `terminal`
--
ALTER TABLE `terminal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
