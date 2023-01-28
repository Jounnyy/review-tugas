<?php
session_start();
include("./utilities/connection.php");
if (isset($_SESSION['status']) && $_SESSION['status'] == "logined") {
    if ($_SESSION['role'] == 'admin') {
        header("location:./pages/admin/index.php");
    } else {
        header("location:./pages/dashboard/index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Sign In</title>
</head>
<body style="background-color: #f2f2f2;">
    <div class="container c" style="min-height: 100vh;">
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <div class="mb-3">
                    <h3 class="mb-3 text-center">SIGN IN</h3>
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
                    <form action="./utilities/login.php" method="post">
                        <input type="number" class="form-control" name="employee_id" id="" aria-describedby="helpId"
                                placeholder="Please enter your Employee ID" autocomplete="off">

                        <input type="password" class="form-control mt-4 mb-4" name="password" id="" aria-describedby="helpId"
                                placeholder="***********" autocomplete="off">

                        <div class="c">
                            <button type="submit" class="btn btn-primary" name="sign_in">SIGN IN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>
    <script src="./js/main.js"></script>

</html>