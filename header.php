<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Terminal</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Pastikan path ke file CSS sesuai dengan struktur proyek Anda -->
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        .container {
            display: center;
            text-align: center;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            font-size: 24px;
        }

        nav ul {
            list-style: none;
            display: flex;
            text-align: center;
            align-items: center;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }

        nav ul li a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Sistem Informasi Terminal</h1>
            <nav>
                <ul>
                    <?php
                    // Periksa apakah sesi sudah dimulai sebelum memanggil session_start()
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    // Periksa apakah admin sudah login, jika sudah ganti tab Beranda dengan Dashboard dan ganti tab Data Kendaraan dengan tambah_kendaraan.php
                    // Ganti tab Informasi Terminal dengan tambah_terminal.php, ganti tab Data Petugas dengan tambah_petugas.php, ganti tab Data Admin dengan tambah_admin.php
                    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
                        echo '<li><a href="dashboard.php">Dashboard</a></li>';
                        echo '<li><a href="tambah_kendaraan.php">Tambah Kendaraan</a></li>';
                        echo '<li><a href="tambah_terminal.php">Tambah Terminal</a></li>';
                        echo '<li><a href="tambah_petugas.php">Tambah Petugas</a></li>';
                        echo '<li><a href="laporan.php">Laporan</a></li>';
                        echo '<li><a href="tambah_admin.php">Tambah Admin</a></li>';
                        echo '<li><a href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li><a href="index.php">Beranda</a></li>';
                        echo '<li><a href="tampil_kendaraan.php">Data Kendaraan</a></li>';
                        echo '<li><a href="tampil_terminal.php">Informasi Terminal</a></li>';
                        echo '<li><a href="tampil_petugas.php">Data Petugas</a></li>';
                        echo '<li><a href="login.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
