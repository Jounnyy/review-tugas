<?php
session_start();
$status = $_SESSION['status'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];

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
    <link rel="stylesheet" href="style-dashboard.css">
    <title>Dashboar Admin</title>
</head>

<body>
    <nav>
        <a href="index.php?page=absensi">Dashboard</a> |
        <a href="index.php?page=izin">Izin</a> |
        <a href="index-admin.php?page=muser">Management Users</a> |
        <a href="index-admin.php?page=mabsensi">Management Absensi</a> |
        <a href="index-admin.php?page=mrequest">Management Perizinan</a>
    </nav>
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
    <?php
if (isset($_GET['page'])) {
    $parameter = $_GET['page'];
    if ($parameter == "muser") {
        include('../management/users.php');
    } elseif ($parameter == "mabsensi") {
        include('../management/absen.php');
    } elseif ($parameter == "mrequest") {
        include('../management/izin.php');
    } elseif ($parameter == "edit") {
        include('../management/edit-user.php');
    } else {
        include('../management/users.php');
    };
}else{
    include('../management/users.php');
}
    ?>

    <form action="" method="POST">
        <button type="submit" name="logout">logout</button>
    </form>
  </div>
</body>

</html>