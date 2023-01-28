<?php
session_start();

if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
  header("location:dashboard/index.php?message=selamat datang kembali...");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <title>ABSENSI PAGE</title>
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <div class="login-box">
        <h3 class="login-title">Login System</h3>
        <form action="login.php" method="POST" class="login-form">
          <?php
          if (isset($_GET['message'])) {
            echo $_GET['message'];
          }
          ?>
          <input name="user_id" type="text" class="login-input" />
          <input name="password" type="password" class="login-input" />
          <button type="submit" name="login" class="login-button">LOGIN</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>