<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan Keluar</title>
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
        <h1>Tambah Kendaraan Keluar</h1>
        <div class="form-container">
            <form action="proses_tambah_kendaraan_keluar.php" method="post">
                <label for="nomor_kendaraan">Nomor Kendaraan:</label>
                <select id="nomor_kendaraan" name="nomor_kendaraan" required>
                    <?php
                    include_once 'koneksi.php';
                    $sql = "SELECT * FROM kendaraan_masuk";
                    $result = $koneksi->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['nomor_kendaraan'] . "'>" . $row['nomor_kendaraan'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Tidak ada data kendaraan masuk</option>";
                    }
                    ?>
                </select>
                <label for="trayek">Trayek:</label>
                <input type="text" id="trayek" name="trayek" required>
                <label for="waktu_keberangkatan">Waktu Keberangkatan:</label>
                <input type="datetime-local" id="waktu_keberangkatan" name="waktu_keberangkatan" required>
                <label for="jumlah_penumpang_keluar">Jumlah Penumpang Keluar:</label>
                <input type="number" id="jumlah_penumpang_keluar" name="jumlah_penumpang_keluar" required>
                <label for="tujuan_terminal">Tujuan Terminal:</label>
                <select id="tujuan_terminal" name="tujuan_terminal" required>
                    <?php
                    $sql = "SELECT * FROM terminal";
                    $result = $koneksi->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['lokasi'] . "'>" . $row['lokasi'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Tidak ada data terminal</option>";
                    }
                    ?>
                </select>
                <label for="retribusi">Retribusi:</label>
                <input type="number" id="retribusi" name="retribusi" value="2000" required><br>
                <button type="submit">Simpan Kendaraan Keluar</button><br>
                <a href="tambah_kendaraan.php">Kembali</a>
            </form>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>

    <script>
        // Mengatur nilai trayek berdasarkan nomor kendaraan yang dipilih menggunakan AJAX
        document.getElementById('nomor_kendaraan').addEventListener('change', function() {
            var nomor_kendaraan = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_trayek.php?nomor_kendaraan=' + nomor_kendaraan, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('trayek').value = xhr.responseText;
                }
            };
            xhr.send();
        });

        // Fungsi untuk mendapatkan waktu lokal dari komputer pengguna
        function getCurrentLocalTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = (now.getMonth() + 1).toString().padStart(2, '0');
            const day = now.getDate().toString().padStart(2, '0');
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const localTime = `${year}-${month}-${day}T${hours}:${minutes}`;
            return localTime;
        }

        // Set nilai default waktu keberangkatan dengan waktu lokal saat ini
        document.getElementById('waktu_keberangkatan').value = getCurrentLocalTime();
    </script>
        <!-- Load JavaScript files -->
    <script src="js/Validation.js"></script>
    <script src="js/Utility.js"></script>
    <script src="js/Modal.js"></script>
    <script src="js/Animation.js"></script>
    <script src="js/Modal.js"></script>
</body>
</html>
