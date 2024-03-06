<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kendaraan</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('images/kendaraan.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>
    
    <div class="container">
        <h1>Data Kendaraan Masuk</h1>
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
                $sql = "SELECT * FROM kendaraan_masuk ORDER BY waktu_kedatangan DESC LIMIT 10";
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
                    echo "<tr><td colspan='4'>Tidak ada data kendaraan masuk.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h1>Data Kendaraan Keluar</h1>
        <table>
            <thead>
                <tr>
                    <th>Nomor Kendaraan</th>
                    <th>Trayek</th>
                    <th>Waktu Keberangkatan</th>
                    <th>Jumlah Penumpang Keluar</th>
                    <th>Tujuan Terminal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM kendaraan_keluar ORDER BY waktu_keberangkatan DESC LIMIT 10";
                $result = $koneksi->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nomor_kendaraan'] . "</td>";
                        echo "<td>" . $row['trayek'] . "</td>";
                        echo "<td>" . $row['waktu_keberangkatan'] . "</td>";
                        echo "<td>" . $row['jumlah_penumpang_keluar'] . "</td>";
                        echo "<td>" . $row['tujuan_terminal'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data kendaraan keluar.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
