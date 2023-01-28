<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
  header("location:dashboard/index.php?message=selamat datang ");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>ABSENSI PAGE</title>
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <div class="login-title">
        <h1>Login Form</h1>
      </div>
      <form action="login.php" method="POST" class="login-form">
        <div class="message">
          <?php
          if (isset($_GET['message'])) {
            echo $_GET['message'];
            echo "<br>";
            echo "<br>";
          }
          ?>
        </div>
        <label class="label-input" for="user_id">Nama Pengguna : </label>
        <input name="user_id" type="text" class="login-input" placeholder="username" />
        <label class="label-input" for="password">Kata Sandi :</label>
        <input name="password" type="password" class="login-input" placeholder="password" />
        <button type="submit" name="login" class="login-button">MASUK</button>
      </form>
    </div>
  </div>
</body>

</html>