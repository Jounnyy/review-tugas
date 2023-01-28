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
  header("location:../index.php?message=Terimakasih sudah berkunjung");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="style-dashboard.css">
  <title>DASHBOARD</title>
</head>

<body>
  <?php
    if ($role == 'admin') {
  ?>
  <nav>
    <a href="index.php?page=absensi">Dashboard</a> |
    <a href="index.php?page=izin">Izin</a> |
    <a href="index-admin.php?page=muser">Management Users</a> |
    <a href="index-admin.php?page=mabsensi">Management Absensi</a> |
    <a href="index-admin.php?page=mrequest">Management Perizinan</a>
  </nav>  
<?php  
}else {
?>
  <nav>
    <a href="index.php?page=absensi">Dashboard</a> |
    <a href="index.php?page=izin">Izin</a>
  </nav>
<?php }?>
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

  <div class="container">
    <!-- showing page from data get -->
    <?php
    if (isset($_GET['page'])) {
    $parameter = $_GET['page'];
    if ($parameter == "izin") {
      include('izin.php');
    } elseif ($parameter == "absensi") {
      include('absensi.php');
    } elseif ($parameter == "request") {
      include('request.php');
    } else {
      include('absensi.php');
    };
  }else{
    include('absensi.php');
  }
    ?>
    <br>
    <form action="" method="POST">
      <button type="submit" name="logout">logout</button>
    </form>
  </div>
</body>

</html>