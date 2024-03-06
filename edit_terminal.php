<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Terminal</title>
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
        <h1>Edit Terminal</h1>
        <?php
        include_once 'koneksi.php';

        // Cek apakah parameter id telah diterima dari URL
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            // Query untuk mengambil data terminal berdasarkan ID
            $sql = "SELECT * FROM Terminal WHERE id = $id";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
        <!-- Form untuk mengedit terminal -->
        <form action="proses_edit_terminal.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="lokasi">Lokasi Terminal:</label>
            <input type="text" id="lokasi" name="lokasi" value="<?php echo $row['lokasi']; ?>" required>
            <button type="submit">Simpan Perubahan</button><br>
            <a href="tambah_terminal.php">Kembali</a>
        </form>
        <?php
            } else {
                echo "<p>Data terminal tidak ditemukan.</p>";
            }
        } else {
            echo "<p>Parameter ID tidak ditemukan.</p>";
        }
        $koneksi->close();
        ?>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
