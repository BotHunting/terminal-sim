<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once 'header.php'; ?>
    
    <div class="container">
        <h1>Data Admin</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <!-- Tidak menampilkan password -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Sertakan file koneksi.php
                include_once 'koneksi.php';

                // Query untuk mengambil data admin dari database
                $sql = "SELECT nama, username FROM Admin";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data admin.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
