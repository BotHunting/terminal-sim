<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Terminal</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('images/index.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: white;
            min-height: 100vh; /* Menjamin bahwa halaman memiliki tinggi minimal setara dengan tinggi viewport */
            margin: 0; /* Menghilangkan margin bawaan */
            display: flex;
            flex-direction: column;
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
        <h1>Selamat Datang di Sistem Informasi Terminal</h1>
        <h2>Silakan pilih menu di atas untuk mengakses berbagai fitur sistem.</h2>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
