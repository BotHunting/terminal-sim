<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Terminal</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('images/terminal.jpg');
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
        <h1>Informasi Terminal</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi Terminal</th>
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
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Tidak ada informasi terminal.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
