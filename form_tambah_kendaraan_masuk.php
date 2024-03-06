<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan Masuk</title>
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
        <h1>Tambah Kendaraan Masuk</h1>
        <div class="form-container">
            <form action="proses_tambah_kendaraan_masuk.php" method="post">
                <label for="nomor_kendaraan">Nomor Kendaraan:</label>
                <input type="text" id="nomor_kendaraan" name="nomor_kendaraan" required>
                <label for="trayek">Trayek:</label>
                <input type="text" id="trayek" name="trayek" required>
                <label for="waktu_kedatangan">Waktu Kedatangan:</label>
                <input type="datetime-local" id="waktu_kedatangan" name="waktu_kedatangan" required><br>
                <label for="jumlah_penumpang_masuk">Jumlah Penumpang Masuk:</label>
                <input type="number" id="jumlah_penumpang_masuk" name="jumlah_penumpang_masuk" required><br>
                <button type="submit">Simpan Kendaraan Masuk</button><br>
                <a href="tambah_kendaraan.php">Kembali</a>
            </form>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>

    <script>
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

        // Set nilai default waktu kedatangan dengan waktu lokal saat ini
        document.getElementById('waktu_kedatangan').value = getCurrentLocalTime();
    </script>
    <!-- Load JavaScript files -->
    <script src="js/Validation.js"></script>
    <script src="js/Utility.js"></script>
    <script src="js/Modal.js"></script>
    <script src="js/Animation.js"></script>
    <script src="js/Modal.js"></script>
</body>
</html>
