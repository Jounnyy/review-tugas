<?php
    session_start();
    include("./../../utilities/connection.php");
    if(!isset($_SESSION['status']) || $_SESSION['status'] != "logined") {
        header("location:../../index.php?msg=You must login first!");
    } else if ($_SESSION['role'] != "admin") {
        session_start();
        session_destroy();
        header("location:./../../index.php?msg=You're not administrator!");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/nav-side-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
</head>

<body style="background-color: #f2f2f2;">

    <!-- Sidebar For Desktop -->

    <div class="desktop">
        <div class="sidebar">
            <div class="sidebar-icons">

                <a href="">
                    <img class="sidebar-profile" src="../../assets/images/profile-pic.png" alt="">
                </a>

                <a href="./action.php?logmeout">
                    <img class="sidebar-icon logout" src="../../assets/icons/log-out-regular-36.png" alt="">
                </a>

            </div>
        </div>

    </div>


    <div class="content" style="overflow-x: hidden;">

        <div class="card mb-3">
            <div class="card-body">

                <div class="header">
                    <h4>Dashboard Admin</h4>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-md-8 mb-3 recent-attendances">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">List all employees :</h5>

                        <?php include("./employees.php"); ?>

                        <form action="./action.php" method="post">
                            <div class="desktop">
                                <button type="submit" class="btn btn-secondary mt-2" name="ct_emp">Create employee</button>
                            </div>

                            <div class="mobile">
                                <button type="submit" class="btn btn-danger mt-2 me-2" name="sign_out"><i class="bi bi-box-arrow-in-left"></i></button>
                                <button type="submit" class="btn btn-secondary mt-2" name="ct_emp">Create employee</button>
                            </div>
                        </form>

                        

                    </div>
                </div>
            </div>

            <div class="desktop col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">

                        <h5 class="text-center mb-3">My Profile</h5>

                        <div class="input-group mb-3">
                            <input name="uid" type="text" class="form-control" placeholder="UID" aria-label="UID" aria-describedby="basic-addon1"
                                disabled style="margin-right: 10px;" value="<?= $_SESSION['employee_id'] ?>">
                            
                            <input name="role" type="text" class="form-control" placeholder="Role" aria-label="Role" aria-describedby="basic-addon1"
                                disabled value="<?= $_SESSION['role'] ?>">
                            </div>
    
                        <div class="input-group mb-3">
                            <input name="fullname" type="text" class="form-control" placeholder="Fullname" aria-label="Username"
                                aria-describedby="basic-addon1" disabled value="<?= $_SESSION['fullname'] ?>">
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>


</body>

</html>