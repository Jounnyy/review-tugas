<?php 



session_start();
// echo $_SESSION['status'];
if(!isset($_SESSION['status']) && $_SESSION['status'] != 'login'){
    header('location:../index.php?message=Silahkan Login Terlebih Dahulu');
} 
if(isset($_POST['logout'])){
    session_destroy();
    header('location:../index.php?message=berhasil keluar');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div>
        <section>
            <h3>Haloo  <?= $_SESSION['fullname']; ?></h3>
            <p>Status Pegawai : <?= $_SESSION['role']; ?></p>
            <br>
            
            <form action="" method="POST">

            
            <br>
            <?php 
            if(isset($_GET['message'])){
                echo $_GET['message'];

            }
            ?>
            <!-- Tabel Absen -->
            </form>
            <?php include('absensi.php') ?>
            <br>
            <form action="" method="POST">
                <button type="submit" name="logout">logout</button>
            </form>
        </section>

    </div>
</body>
</html>