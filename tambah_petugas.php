<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
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
        <h1>Tambah Petugas</h1>
        <form action="proses_tambah_petugas.php" method="post" id="petugasForm">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <label for="nomor_identitas">Nomor Identitas:</label>
            <input type="text" id="nomor_identitas" name="nomor_identitas" required>
            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan">
            <label for="jadwal_kerja">Jadwal Kerja:</label>
            <select id="jadwal_kerja" name="jadwal_kerja">
                <?php
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
                ?>
            </select><br>
            <button type="submit">Tambah Petugas</button>
        </form>

        <h2>Data Petugas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor Identitas</th>
                    <th>Jabatan</th>
                    <th>Jadwal Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'koneksi.php';
                $sql = "SELECT * FROM petugas";
                $result = $koneksi->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['nomor_identitas'] . "</td>";
                        echo "<td>" . $row['jabatan'] . "</td>";
                        echo "<td>" . $row['jadwal_kerja'] . "</td>";
                        echo "<td><a href='edit_petugas.php?id=" . $row['id'] . "'>Edit</a> | <a href='hapus_petugas.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus petugas ini?\")'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data petugas.</td></tr>";
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
    <script src="js/Modal.js"></script>
    <script src="js/Animation.js"></script>
    <script src="js/Modal.js"></script>
</body>
</html>
