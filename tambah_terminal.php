<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Terminal</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('images/tambah_terminal.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>
    
    <div class="container">
        <h1>Tambah Terminal</h1>
        <form action="proses_tambah_terminal.php" method="post">
            <label for="lokasi">Lokasi Terminal:</label>
            <input type="text" id="lokasi" name="lokasi" required>
            <button type="submit">Tambah Terminal</button>
        </form>
        
        <h2>Data Terminal</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi Terminal</th>
                    <th>Action</th> <!-- Kolom untuk tombol edit dan hapus -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Sertakan file koneksi.php
                include_once 'koneksi.php';

                // Query untuk mengambil data terminal dari database
                $sql = "SELECT * FROM Terminal";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['lokasi'] . "</td>";
                        echo "<td>";
                        // Tombol edit dan hapus dengan link ke halaman yang sesuai
                        echo "<a href='edit_terminal.php?id=" . $row['id'] . "'>Edit</a> | ";
                        echo "<a href='hapus_terminal.php?id=" . $row['id'] . "'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data terminal.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
