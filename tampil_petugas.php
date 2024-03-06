<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('images/petugas.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: white;
            min-height: 100vh; /* Menjamin bahwa halaman memiliki tinggi minimal setara dengan tinggi viewport */
            margin: 0; /* Menghilangkan margin bawaan */
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>
    
    <div class="container">
        <h1>Data Petugas</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Identitas</th>
                    <th>Jabatan</th>
                    <th>Jadwal Kerja</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Sertakan file koneksi.php
                include_once 'koneksi.php';

                // Query untuk mengambil data petugas dari database
                $sql = "SELECT * FROM Petugas";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['nomor_identitas'] . "</td>";
                        echo "<td>" . $row['jabatan'] . "</td>";
                        echo "<td>" . $row['jadwal_kerja'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data petugas.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
