<?php
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('images/dashboard.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: white;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }
        .container {
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 40px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>
    
    <div class="container">
        <h1>Welcome to SIM Terminal</h1>
        <p>You are logged in as <?php echo $_SESSION['username']; ?></p>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
