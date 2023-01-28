<?php
session_start();
include ("../connection.php");
include ("../Users.php");
if( $_SESSION['status'] != "login")
{
    header("location:../index.php?message=silahkan login terlebih dahulu");
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("location:../index.php?message=keluar dari sistem");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" href="../style2.css">
    <title>Admin Page</title>
</head>
<body class="admin-body">   
        <div class="container-admin">
            <div class="apak">
                Halo <?php echo $_SESSION['fullname']?>
                <?php
                if(isset($_GET['message']))
                {
                    $message = $_GET['message'];
                    echo "<div class= 'notif-add'>$message</div>";
                }
                ?>
            </div>
            <div class="button">            
                <form action="show.php" method="POST">
                    <button class="show">Perlihatkan Attendance</button>
                </form> 
                    <!-- <form action="add.php"> -->
                <form action="input-add.php" method="POST">
                    <button class="add" type="submit">Tambah Karyawan</button>
                </form>
                <form action="" method="POST">
                <button name="logout" type="submit">logout</button>
                </form>
           </div>
      </div>
    
</body>
</html>