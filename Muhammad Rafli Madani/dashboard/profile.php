<?php 
session_start();
include('../connection.php');
$employee_id = $_GET['employee_id'];

$query = "SELECT * FROM users WHERE employee_id=$employee_id";
$result = $db->query($query);
$fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);


if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?message=silahkan login terlebih dahulu");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
    body {
        text-align: center;
    }
    p {
        font-size: 30px;
        
    }
</style>

<img src="../img/businessman-profile-cartoon_18591-58479.webp" alt="" height="200px">
    <p>NIP : <?= $fetch[0]['employee_id']; ?></p>
<p>Nama Lengkap : <?= $fetch[0]['fullname']; ?></p>
<p>Status Pegawai : <?= $fetch[0]['role']; ?></p>

<a href="index-admin.php" class="btn btn-primary">Keluar</a>



