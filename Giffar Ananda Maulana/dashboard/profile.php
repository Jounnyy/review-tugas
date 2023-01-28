<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?message=silahkan login terlebih dahulu");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../style/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <section class="min-vh-100">
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="navbar bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content container">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-secondary user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="../img/profil.png" width="200" height="200" class="img-radius auto-fill" alt="User-Profile-Image">
                                    </div>
                                    <h6 class="fs-3 fw-semi-bold text-capitalize"><?php echo $_SESSION['fullname'] ?></h6>
                                    <p class="fs-5 fw-normal text-uppercase"><?php echo $_SESSION['role'] ?></p>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="fs-3 m-b-20 p-b-5 b-b-default ">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6 mt-3">
                                            <p class="m-b-10 f-w-600">NIP</p>
                                            <h6 class="text-muted f-w-400 text-capitalize"><?php echo $_SESSION['employee_id'] ?></h6>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <p class="m-b-10 f-w-600">Nama</p>
                                            <h6 class="text-muted f-w-400 text-capitalize"><?php echo $_SESSION['fullname'] ?></h6>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <p class="m-b-10 f-w-600">Jenis Kelamin</p>
                                            <h6 class="text-muted f-w-400 text-capitalize"><?php echo $_SESSION['jenis_kelamin'] ?></h6>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <p class="m-b-10 f-w-600">Bagian</p>
                                            <h6 class="text-muted f-w-400 text-uppercase"><?php echo $_SESSION['role'] ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>