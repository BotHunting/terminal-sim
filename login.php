<?php
session_start();

// Cek apakah admin sudah login, jika sudah redirect ke halaman dashboard
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
    header("location: dashboard.php");
    exit;
}

// Sertakan file koneksi.php
include_once 'koneksi.php';

// Definisikan variabel kosong untuk menyimpan pesan error
$username = $password = "";
$username_err = $password_err = "";

// Tangani form submission saat admin mencoba untuk login
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validasi username
    if(empty(trim($_POST["username"]))){
        $username_err = "Mohon masukkan username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Validasi password
    if(empty(trim($_POST["password"]))){
        $password_err = "Mohon masukkan password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Periksa apakah tidak ada error sebelum melanjutkan proses login
    if(empty($username_err) && empty($password_err)){
        // Query SQL untuk memeriksa keberadaan admin di database
        $sql = "SELECT id, username, password FROM Admin WHERE username = ? AND password = ?";
        
        if($stmt = $koneksi->prepare($sql)){
            // Bind variabel ke prepared statement sebagai parameter
            $stmt->bind_param("ss", $param_username, $param_password);
            
            // Set parameter
            $param_username = $username;
            $param_password = $password;
            
            // Mencoba mengeksekusi statement
            if($stmt->execute()){
                // Menyimpan hasil query
                $stmt->store_result();
                
                // Memeriksa apakah username dan password cocok
                if($stmt->num_rows == 1){                    
                    // Mulai session baru
                    session_start();
                    
                    // Menyimpan data di session variables
                    $_SESSION["logged_in"] = true;
                    $_SESSION["username"] = $username;                            
                    
                    // Redirect ke halaman dashboard
                    header("location: dashboard.php");
                } else{
                    // Tampilkan pesan error jika username atau password tidak valid
                    $username_err = "Username atau password tidak valid.";
                }
            } else{
                echo "Oops! Ada yang salah. Silakan coba lagi nanti.";
            }

            // Tutup statement
            $stmt->close();
        }
    }
    
    // Tutup koneksi database
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once 'header.php'; ?>
    
    <div class="container">
        <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>

    <?php include_once 'footer.php'; ?>
</body>
</html>
