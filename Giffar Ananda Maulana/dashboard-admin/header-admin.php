<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?message=silahkan login terlebih dahulu");
}
$employee_id = $_SESSION['employee_id'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style/dashboard-admin.css">
</head>

<body>
    <div class="container mt-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-list nav-link text-dark" aria-current="page" href="./index.php"><i class="bi bi-house-door-fill "></i> Dashboard</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-list nav-link text-dark" href="./tambah-user.php"><i class="bi bi-person-add"></i> Tammbahkan User</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-table"></i> Table </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./table-absensi-admin.php">Table Absensi</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="./table-karyawan-admin.php">Table Karyawan</a></li>
                                <li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <div class="nav-item dropdown d-flex my-2">
                            <img src="../img/profil.png" alt="hugenerd" width="25" height="25" class="rounded-circle mx-2">
                            <a class="text-capitalize nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['fullname']; ?> </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar Dari Halaman Ini?');"><i class="bi bi-door-open-fill"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>