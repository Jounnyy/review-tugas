<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
  header("location:dashboard/index.php");
  header("location:dashboard/index-admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN SYSTEM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <section class="wrapper">
        <h3 class="title">LOGIN SYSTEM</h3>
        <?php 
        if(isset($_GET['message'])) {
            $msg = $_GET['message'];
            echo "<div class='notif-login'>$msg</div>";
        }
        
        ?>
        <div class="form-login">
            <form action="login.php" method="POST" class="form-login">
                <input type="hidden" name="fullname">
                <label for="induk">masukan nomor induk</label>
                <input type="number" id="induk" placeholder="nip" name="nip" class="input-login" required>
                <br>
                <label for="pass">password</label>
                <input type="password"  id="pass" placeholder="*****" name="password" class="input-login" required>
                <br>
                <button type="submit" class="button-login" name="login">login</button>
            </form>
        </div>
        </section>
    </div>
</body>
</html>