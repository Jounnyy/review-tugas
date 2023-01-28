<?php
    session_start();
    include("./../../utilities/connection.php");
    if(!isset($_SESSION['status']) || $_SESSION['status'] != "logined") {
        header("location:../../index.php?msg=You must login first!");
    } else if ($_SESSION['role'] == "admin") {
        session_start();
        session_destroy();
        header("location:./../../index.php?msg=You're administrator!");
    }
    
    date_default_timezone_set("Asia/Jakarta");
    $current_date = date('Y-m-d'); 
    $current_time = date('H:i'); 
    $employee_id = $_SESSION["employee_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | </title>
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
                    <h4>Dashboard | Good Morning <?= $_SESSION['fullname'] ?>!</h4>
                </div>
    
            </div>
        </div>
    
        <div class="row">
    
            <div class="desktop col-md-8 mb-3 recent-attendances">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Recent attendances :</h5>
    
                        <?php include("./attendances.php"); ?>
    
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
    
                        <h5 class="text-center mb-3">Create attendance</h5>
    
                        <form action="./action.php" method="post" enctype="multipart/form-data">

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

                            <div class="input-group mb-3">
                                <input name="date" type="text" class="form-control" placeholder="Date" aria-label="Date" aria-describedby="basic-addon1"
                                    disabled style="margin-right: 10px;" value="<?= $current_date ?>">

                                    <?php 
                                    
                                    $sql = "SELECT * FROM attendances WHERE employee_id=$employee_id AND date='$current_date'";
                                    $result = $db->query($sql);

                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {
                                            if (empty($row['clock_out']) && !empty($row['clock_in']) && $row['date'] == $current_date) {
                                                $clock_in = $row['clock_in'];
                                                echo <<<end
                                        
                                                <input name="clock-in" type="text" class="form-control" placeholder="Clock In" aria-label="Clock In" aria-describedby="basic-addon1"
                                                    disabled  style="margin-right: 10px;" value="$clock_in">

                                                <input name="clock-out" type="text" class="form-control" placeholder="Clock Out" aria-label="Clock Out" aria-describedby="basic-addon1"
                                                    disabled>

                                                </div>

                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success me-3" name="clock-in" disabled>Clock in</button>
                                                    <button type="submit" class="btn btn-danger" name="clock-out">Clock out</button>

                                                end;
                                            } else if($row['date'] == $current_date) {
                                                $clock_in = $row['clock_in'];
                                                $clock_out = $row['clock_out'];
                                                echo <<<end
                                        
                                                <input name="clock-in" type="text" class="form-control" placeholder="Clock In" aria-label="Clock In" aria-describedby="basic-addon1"
                                                    disabled  style="margin-right: 10px;" value="$clock_in">

                                                <input name="clock-out" type="text" class="form-control" placeholder="Clock Out" aria-label="Clock Out" aria-describedby="basic-addon1"
                                                    disabled value="$clock_out">

                                                </div>

                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success me-3" name="clock-in" disabled>Clock in</button>
                                                    <button type="submit" class="btn btn-danger" name="clock-out" disabled>Clock out</button>

                                                end;
                                            }
                                        }

                                    } else {
                                        echo <<<end
                                        
                                            <input name="clock-in" type="text" class="form-control" placeholder="Clock In" aria-label="Clock In" aria-describedby="basic-addon1"
                                                disabled  style="margin-right: 10px;">

                                            <input name="clock-out" type="text" class="form-control" placeholder="Clock Out" aria-label="Clock Out" aria-describedby="basic-addon1"
                                                disabled>

                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success me-3" name="clock-in">Clock in</button>
                                            <button type="submit" class="btn btn-danger" name="clock-out" disabled>Clock out</button>


                                        end;
                                    }

                                    
                                    ?>

                                        <div class="mobile">
                                            <button type="submit" class="btn btn-secondary ms-3" name="history">History</button>
                                            <button type="submit" class="btn btn-danger ms-3" name="sign_out"><i class="bi bi-box-arrow-in-left"></i></button>
                                        </div>
                                    </div>

                                <!-- <input name="clock-in" type="text" class="form-control" placeholder="Clock In" aria-label="Clock In" aria-describedby="basic-addon1"
                                    disabled  style="margin-right: 10px;">

                                <input name="clock-out" type="text" class="form-control" placeholder="Clock Out" aria-label="Clock Out" aria-describedby="basic-addon1"
                                    disabled>
                            </div>
    
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success me-3" name="clock-in">Clock in</button>
                                <button type="submit" class="btn btn-danger" name="clock-out">Clock out</button>
                                <div class="mobile">
                                    <button type="button" class="btn btn-secondary ms-3">History</button>
                                </div>
                            </div> -->
    
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