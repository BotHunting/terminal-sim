<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <div class="container">
        <h1>Laporan Pendapatan</h1>
        <form action="" method="get">
            <label for="bulan">Pilih Bulan:</label>
            <select name="bulan" id="bulan">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <button type="submit">Tampilkan</button>
        </form>

        <!-- Tabel Pendapatan -->
        <h2 class="table-title">Pendapatan Bulan Ini</h2>
        <table>
            <thead>
                <tr>
                    <th>Nomor Kendaraan</th>
                    <th>Waktu Keberangkatan</th>
                    <th>Retribusi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'koneksi.php';

                // Ambil bulan dari parameter GET atau default ke bulan ini
                $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');

                // Query untuk mengambil data kendaraan keluar pada bulan yang dipilih
                $sql = "SELECT nomor_kendaraan, waktu_keberangkatan, retribusi FROM kendaraan_keluar WHERE MONTH(waktu_keberangkatan) = $bulan ORDER BY waktu_keberangkatan";
                $result = $koneksi->query($sql);

                $total_retribusi = 0;

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nomor_kendaraan'] . "</td>";
                        echo "<td>" . $row['waktu_keberangkatan'] . "</td>";
                        echo "<td>" . $row['retribusi'] . "</td>";
                        echo "</tr>";
                        $total_retribusi += $row['retribusi'];
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data pendapatan untuk bulan ini.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Total Pendapatan -->
        <h2>Total Pendapatan: Rp <?php echo $total_retribusi; ?></h2>

        <!-- Grafik Pendapatan dalam Setahun Terakhir -->
        <h2 class="chart-title">Grafik Pendapatan dalam Setahun Terakhir</h2>
        <canvas id="revenueChart" width="800" height="400"></canvas>

        <?php
        // Query untuk mengambil data pendapatan dalam setahun terakhir
        $sql_yearly = "SELECT MONTH(waktu_keberangkatan) AS bulan, SUM(retribusi) AS total_retribusi FROM kendaraan_keluar WHERE YEAR(waktu_keberangkatan) = YEAR(CURRENT_DATE) GROUP BY MONTH(waktu_keberangkatan)";
        $result_yearly = $koneksi->query($sql_yearly);

        $bulan_labels = [];
        $pendapatan_data = [];

        if ($result_yearly->num_rows > 0) {
            while($row = $result_yearly->fetch_assoc()) {
                $bulan_labels[] = $row['bulan'];
                $pendapatan_data[] = $row['total_retribusi'];
            }
        }

        // Konversi nama bulan dari angka menjadi teks
        $bulan_labels_text = [];
        foreach ($bulan_labels as $bulan) {
            $bulan_labels_text[] = date("F", mktime(0, 0, 0, $bulan, 1));
        }

        ?>

        <script>
            var ctx = document.getElementById('revenueChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($bulan_labels_text); ?>,
                    datasets: [{
                        label: 'Pendapatan',
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: <?php echo json_encode($pendapatan_data); ?>,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
    <button type="button" onclick="window.print()">Cetak Laporan</button>
    <?php include_once 'footer.php'; ?>
</body>
</html>
