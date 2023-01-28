<?php
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

// jika status bukan login, maka akan di arahkan ke page login
if ($status != "login") {
  header("location:../index-admin.php?message=silahkan login terlebih dahulu!");
}

if (isset($_POST['logout'])) {
  session_destroy();
  header("location:../index-admin.php?terimakasih sudah berkunjung");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style-dashboard.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 
  <title>Dashboard Admin</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
<div class="container-fluid">
  <a class="navbar-brand" href="#">SISTEM ABSENSI</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class=" collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ms-auto ">
      <li class="nav-item">
        <a class="nav-link mx-2 active" aria-current="page" href="./index-admin.php">Beranda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-2" href="./kelola-karyawan-admin.php">Kelola Karyawan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-2" href="./tentang-admin.php">Tentang</a>
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

<!-- <?php

echo "hello bro admin";

?> -->
<?php
    if (isset($_GET['message'])) {
      echo $_GET['message'];
    }
    ?>

    <div>
    <?php
    if (isset($_GET['message'])) {
      echo $_GET['message'];
    }
    ?>


  

    <table class="table-light">
      <tr class="tr">
        <th class="th">No.</th>
        <th class="th">Nama</th>
        <th class="th">Jabatan</th>
        <th class="th">Tanggal</th>
        <th class="th">Clock in</th>
        <th class="th">Clockout</th>
      </tr>

      <?php
      include("../koneksi.php");
      session_start();
      $user_id = $_SESSION['user_id'];

      $sql = "SELECT * FROM users JOIN absensi ON users.user_id = absensi.user_id";

      $result = $db->query($sql);

      $no = 1;
      while ($data = $result->fetch_assoc()) {
        echo "<tr class='tr'>";
        echo "<td class='td'>" . $no++ . "</td>";
        echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
        echo "<td class='td'>" . $data['role'] . "</td>";
        echo "<td class='td'>" . $data['tgl'] . "</td>";
        echo "<td class='td'>" . $data['jam_masuk'] . "</td>";
        echo "<td class='td'>" . $data['jam_keluar'] . "</td>";
        echo "</tr>";
      }
      ?>
    </table>
  </div>

  <div style="display: flex; justify-content: center; align-items: center; margin: top 20px;;">
    <button style="text-align:center" onclick="window.print()">CETAK LAPORAN</button>
  </div><br><br>
  <form action="../index.php" method="POST">
    <button type="submit" name="logout">logout</button>
  </form>
  
  
  <footer class="bg-dark text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright: Idham Bhr
    <a class="text-white" href="https://mdbootstrap.com/"></a>
  </div>
  <!-- Copyright -->
</body>

</html>
