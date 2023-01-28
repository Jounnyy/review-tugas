<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    header("location:dashboard/index.php?message=selamat datang kembali...");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login 3</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0"/>
<link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="login">
        
    <h2>Login</h2>
    <?php
    if (isset($_GET['message'])) {
        echo $_GET['message'];
    }
    ?>

    <h3>Selamat Datang di Sistem Absensi Sederhana Silahkan Login Terlebih Dahulu</h3>

    <form action="login.php" method="POST" class="login-form">
        <div class="textbox">
            <input name="user_id" type="text" placeholder="Username" />
            <span class="material-symbols-outlined"> account_circle </span>
        </div>
        <div class="textbox">
            <input name="password" type="password" placeholder="Password" />
            <span class="material-symbols-outlined"> lock </span>
        </div>
        <button type="submit" name="login">LOGIN</button>
        </form>
    </div>
    </body>
</html>