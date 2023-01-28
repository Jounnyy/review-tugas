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

$id = $_GET['eid'];
$fullname;
$role;

$sql = "SELECT * FROM users WHERE employee_id= $id";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fullname = $row['fullname'];
        $role = $row['role'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dest Profile</title>
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
                    <h4><?= $fullname; ?> Profile</h4>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="mobile col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
            
                        <form action="" method="post" enctype="multipart/form-data">
            
                            <div class="input-group mb-3">
                                <input name="uid" type="text" class="form-control" placeholder="UID" aria-label="UID"
                                    aria-describedby="basic-addon1" disabled style="margin-right: 10px;" value="<?= $_GET['eid']; ?>">
            
                                <input name="role" type="text" class="form-control" placeholder="Role" aria-label="Role"
                                    aria-describedby="basic-addon1" disabled value="<?= $role; ?>">
                            </div>
            
                            <div class="input-group mb-3">
                                <input name="fullname" type="text" class="form-control" placeholder="Fullname" aria-label="Username"
                                    aria-describedby="basic-addon1" disabled value="<?= $fullname; ?>">
                            </div>
            
                        </form>
            
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-3 recent-attendances">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Recent attendances :</h5>
                        <?php include("./attendances.php"); ?>
                        <form action="./action.php" method="post">
                            <button type="submit" class="btn btn-secondary mt-2" name="back">Back to dashboard</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="desktop col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">


            
                        <div class="input-group mb-3">
                                <input name="uid" type="text" class="form-control" placeholder="UID" aria-label="UID"
                                    aria-describedby="basic-addon1" disabled style="margin-right: 10px;" value="<?= $_GET['eid']; ?>">
            
                                <input name="role" type="text" class="form-control" placeholder="Role" aria-label="Role"
                                    aria-describedby="basic-addon1" disabled value="<?= $role; ?>">
                            </div>
            
                            <div class="input-group mb-3">
                                <input name="fullname" type="text" class="form-control" placeholder="Fullname" aria-label="Username"
                                    aria-describedby="basic-addon1" disabled value="<?= $fullname; ?>">
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

