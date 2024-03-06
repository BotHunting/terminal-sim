<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Petugas</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('images/tambah_petugas.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>
    
    <div class="container">
        <h1>Edit Petugas</h1>
        <form action="proses_edit_petugas.php" method="post" id="petugasForm">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <label for="nomor_identitas">Nomor Identitas:</label>
            <input type="text" id="nomor_identitas" name="nomor_identitas" required>
            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan">
            <label for="jadwal_kerja">Jadwal Kerja:</label>
            <select id="jadwal_kerja" name="jadwal_kerja">
                <?php
                // Sertakan file koneksi.php
                include_once 'koneksi.php';

                // Query untuk mengambil data terminal dari database
                $sql = "SELECT * FROM terminal";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['lokasi'] . "'>" . $row['lokasi'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada terminal.</option>";
                }
                $koneksi->close();
                ?>
            </select><br>
            <button type="submit">Simpan Perubahan</button><br>
            <a href="tambah_petugas.php">Kembali</a>
        </form>
    </div>

    <?php include_once 'footer.php'; ?>

    <!-- Load JavaScript files -->
    <script src="js/Validation.js"></script>
    <script src="js/Utility.js"></script>
</body>
</html>
