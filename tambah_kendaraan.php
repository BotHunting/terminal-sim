<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('images/tambah_kendaraan.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>
    
    <div class="container">
        <h1>Tambah Kendaraan</h1>
        <div class="form-container">
            <a href="form_tambah_kendaraan_masuk.php" class="button">Tambah Kendaraan Masuk</a>
            <a href="form_tambah_kendaraan_keluar.php" class="button">Tambah Kendaraan Keluar</a>
        </div>
        <!-- Tabel Kendaraan Masuk -->
        <h2 class="table-title">Data Kendaraan Masuk</h2>
        <table>
            <thead>
                <tr>
                    <th>Nomor Kendaraan</th>
                    <th>Trayek</th>
                    <th>Waktu Kedatangan</th>
                    <th>Jumlah Penumpang Masuk</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'koneksi.php';
                $sql = "SELECT * FROM kendaraan_masuk ORDER BY waktu_kedatangan DESC";
                $result = $koneksi->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nomor_kendaraan'] . "</td>";
                        echo "<td>" . $row['trayek'] . "</td>";
                        echo "<td>" . $row['waktu_kedatangan'] . "</td>";
                        echo "<td>" . $row['jumlah_penumpang_masuk'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data kendaraan masuk.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Tabel Kendaraan Keluar -->
        <h2 class="table-title">Data Kendaraan Keluar Bulan Ini</h2>
        <table>
            <thead>
                <tr>
                    <th>Nomor Kendaraan</th>
                    <th>Trayek</th>
                    <th>Waktu Keberangkatan</th>
                    <th>Jumlah Penumpang Keluar</th>
                    <th>Tujuan Terminal</th>
                    <th>Retribusi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $bulan_ini = date('Y-m');
                $sql = "SELECT * FROM kendaraan_keluar WHERE DATE_FORMAT(waktu_keberangkatan, '%Y-%m') = '$bulan_ini' ORDER BY waktu_keberangkatan DESC";
                $result = $koneksi->query($sql);
                if ($result->num_rows > 0) {
                    $total_retribusi = 0;
                    while($row = $result->fetch_assoc()) {
                        $total_retribusi += $row['retribusi'];
                        echo "<tr>";
                        echo "<td>" . $row['nomor_kendaraan'] . "</td>";
                        echo "<td>" . $row['trayek'] . "</td>";
                        echo "<td>" . $row['waktu_keberangkatan'] . "</td>";
                        echo "<td>" . $row['jumlah_penumpang_keluar'] . "</td>";
                        echo "<td>" . $row['tujuan_terminal'] . "</td>";
                        echo "<td>" . $row['retribusi'] . "</td>";
                        echo "</tr>";
                    }
                    echo "<tr><td colspan='5'>Total Retribusi Bulan Ini</td><td>Rp $total_retribusi</td></tr>";
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data kendaraan keluar bulan ini.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once 'footer.php'; ?>

    <!-- Load JavaScript files -->
    <script src="js/Validation.js"></script>
    <script src="js/Utility.js"></script>
    <script src="js/AjaxRequest.js"></script>
    <script src="js/Modal.js"></script>
</body>
</html>
