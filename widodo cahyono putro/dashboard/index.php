<?php
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

if ($status != "login") {
  header("location:../index.php?message=silahkan login terlebih dahulu!");
}

if (isset($_POST['logout'])) {
  session_destroy();
  header("location:../index.php?message=terimakasih sudah berkunjung");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style-dashboard.css" />
  <title>DASHBOARD</title>
</head>

<body>
  <h3 class="h3">Dashboard</h3>
  <div class="container">
    <p class="message">
      <?php
      if (isset($_GET['message'])) {
        echo $_GET['message'];
      }
      ?>
    </p>
    <p class="message">Halo <?= $nama_lengkap ?></p>
    <p class="message">Status kepegawaian: <?= $role ?></p>
    <br />

    <!-- showing a attendances data -->
    <h3 class="button">
      <?php include("absensi.php"); ?>
    </h3>

    <form action="" method="POST" class="button">
      <button type="submit" name="logout">logout</button>
    </form>
  </div>
  <div class="footer">
    Copyright &copy; 2023 - <a href="https://www.youtube.com/@deaafrizal">https://www.youtube.com/@deaafrizal</a>
  </div>

</body>

</html>