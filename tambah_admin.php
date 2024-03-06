<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('images/tambah_admin.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>
    
    <div class="container">
        <h1>Tambah Admin</h1>
        <form action="proses_tambah_admin.php" method="post" onsubmit="return validateForm()">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Tambah Admin</button>
        </form>

        <h2>Data Admin</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'koneksi.php';
                $sql = "SELECT * FROM admin";
                $result = $koneksi->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data admin.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once 'footer.php'; ?>

    <script src="js/Validation.js"></script>
    <script>
        function validateForm() {
            var nama = document.getElementById('nama').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (nama.trim() == '' || username.trim() == '' || password.trim() == '') {
                alert('Nama, username, dan password harus diisi.');
                return false;
            }

            if (!validatePasswordStrength(password)) {
                alert('Password harus terdiri dari minimal 8 karakter, minimal 1 huruf besar, 1 huruf kecil, 1 angka, dan 1 simbol.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
