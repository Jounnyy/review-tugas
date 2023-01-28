<?php
session_start();
ob_start();
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:../index.php?message=keluar dari sistem");
}
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location:../index.php?message=Login dlu!");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../hover.css">
    <link rel="stylesheet" href="../bg.css">
    <style>
        body {
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.25);
        }

        h3 {
            text-align: center;
            margin-top: 20px;
            color: #eaeaea;
        }

        .col-md-8 {
            height: 95vh;
        }
    </style>
</head>

<body>
    <div>
        <section>
            <div class="row gutters-sm" style="height: 96.5vh; width: 100%">

                <div class="col-md-4 mb-3 mt-5 ps-5">
                    <div class="card mb-2" style="width: 80%; height: 40%; backdrop-filter: blur(20px); background-color: rgba(255, 255, 255, 0.13);">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="../images.png" alt="Admin" class="rounded-circle" style="border: 5px solid #eaeaea;" width="100">
                                <div class="mt-3">
                                    <h4><?= $_SESSION['fullname']; ?></h4>
                                    <p class="text-light mb-1"><?= $_SESSION['role']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="width: 80%; height: 48.5%; backdrop-filter: blur(20px); background-color: rgba(255, 255, 255, 0.13);">
                        <div class="card-body pt-4">
                            <div class="row" style="width: 550px">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-light">
                                    <?= $_SESSION['fullname']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="width: 550px">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Employee_id</h6>
                                </div>
                                <div class="col-sm-9 text-light">
                                    <?= $_SESSION['employee_id']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="width: 550px">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Role</h6>
                                </div>
                                <div class="col-sm-9 text-light">
                                    <?= $_SESSION['role']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="width: 550px">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-light">
                                    Man/Women
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 border-start border-dark" style="backdrop-filter: blur(20px); background-color: rgba(255, 255, 255, 0.13);">
                    <?php
                    if (isset($_GET['message'])) {
                        echo $_GET['message'];
                    }
                    ?>
                    <?php include "absen.php" ?>
                </div>
            </div>
        </section>
    </div>
</body>

</html>