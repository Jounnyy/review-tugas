<?php

session_start();
include("./../../utilities/connection.php");
if(!isset($_SESSION['status']) || $_SESSION['status'] != "logined") {
    header("location:../../index.php?msg=You must login first!");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/nav-side-bar.css">
</head>

<body style="background-color: #f2f2f2;">

    <!-- Sidebar For Desktop -->

    <div class="desktop">
        <div class="sidebar">
            <div class="sidebar-icons">

                <a href="">
                    <img class="sidebar-profile" src="../../assets/images/profile-pic.png" alt="">
                </a>

                <a href="">
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

            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">

                        <h5 class="text-center mb-3">Create Employee</h5>

                        <?php 
                        
                        if(isset($_GET['msg'])) {
                            $msg = $_GET['msg'];
                            echo <<<end
                            <div class="alert alert-danger" role="alert">
                                $msg
                            </div>
                            end;
                        }
                        
                        ?>

                        <form action="./action.php" method="post" enctype="multipart/form-data">

                            <div class="input-group mb-3">
                                <input name="employee_id" type="number" class="form-control" placeholder="E-ID"
                                    aria-label="E-ID" aria-describedby="basic-addon1">
                                <input name="fullname" type="text" class="form-control" placeholder="Fullname"
                                    aria-label="fullname" aria-describedby="basic-addon1" autocomplete="off">
                            </div>

                            <select class="form-select mb-3" aria-label="Default select example" name="role_options">
                                <option selected>Select roles</option>
                                <option value="packaging">packaging</option>
                                <option value="admin">admin</option>
                                <option value="qa">qa</option>
                                <option value="operator">operator</option>
                            </select>

                            <div class="input-group mb-3">
                                <input type="password" id="inputPassword5" name="password" class="form-control" aria-describedby="passwordHelpBlock" placeholder="********">
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary me-2" name="back">Back to dashboard</button>
                                <button type="submit" class="btn btn-primary" name="create">Create employee</button>
                            </div>

                        </form>

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