<?php
    session_start();
    include ("../connection.php");
    include ("../Users.php");
    if( $_SESSION['status'] != "login")
    {
        header("location:../index.php?message=silahkan login terlebih dahulu");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css">
    <title>Document</title>
</head>
<body class="input">
<div class="input-pop">
    <div class="text">
        <h1>Input Karyawan</h1>
    </div>
    <?php
        if(isset($_GET['message']))
        {
            $message = $_GET['message'];
            echo "<div class= 'notif-add'>$message</div>";
        }
    ?>
    <form action="add.php" method="POST" class="form-input">
        <input type="number" placeholder="Employee Id / NIP" class="addid" name="add-nip">
        <input type="text" placeholder="Full Name" class="add-name" name="add-name">
        <input type="text" placeholder="Role" class="addrole" name="add-role">
        <input type="password" placeholder="Password" class="addpss" name="add-pass">
        <button type="submit" class="button-input" name="input">Input</button>
    </form>
</div>


</body>
</html>