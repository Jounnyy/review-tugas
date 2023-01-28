<?php
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

// jika status bukan login, maka akan di arahkan ke page login
if ($status != "login") {
  header("location:../index.php?message=silahkan login terlebih dahulu!");
}

if (isset($_POST['logout'])) {
  session_destroy();
  header("location:../index.php?terimakasih sudah berkunjung");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style-dashboard.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>DASHBOARD</title>

  
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
<div class="container-fluid">
  <a class="navbar-brand" href="#"><b>SISTEM ABSENSI</b></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class=" collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ms-auto ">
      <li class="nav-item">
        <a class="nav-link mx-2 active" aria-current="page" href="../Dashboard/index.php">Beranda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-2" href="../Dashboard/jadwal-users.php">Jadwal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-2" href="../Dashboard/tentang-users.php">Tentang</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Company
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="#">Blog</a></li>
          <li><a class="dropdown-item" href="#">About Us</a></li>
          <li><a class="dropdown-item" href="#">Contact us</a></li>
        </ul>
      </li> -->
    </ul>
  </div>
</div>
</nav>
  <h3>Dashboard</h3>
  <p>
    <?php
    if (isset($_GET['message'])) {
      echo $_GET['message'];
    }
    ?>
  </p>
  <i>Halo <?= $nama_lengkap ?></i>
  <p>Status kepegawaian: <?= $role ?></p>
  <br />


  <?php

    // memunculkan tabel absensi
  include ("absensi.php");
  ?>

  <!-- <form action="" method="POST">
    <button type="submit" name="logout">logout</button>
  </form> -->

  <form action="" method="POST">
  <button type="submit" name="logout" class="btn btn-primary">Logout</button>
  </form>
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script><br><br><br><br><b><br><br><br><br><br></b>

  <body>
  <footer class="bg-dark text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright: Idham Bhr
    <a class="text-white" href="https://mdbootstrap.com/"></a>
  </div>
  <!-- Copyright -->
</body>

</html>