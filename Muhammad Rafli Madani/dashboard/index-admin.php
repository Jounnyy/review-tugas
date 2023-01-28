<?php 
include('../connection.php');
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?message=silahkan login terlebih dahulu");
}
$waktu = "SELECT * FROM attendances";
$time = $db->query($waktu);

if(isset($_POST['logout'])) {
    session_destroy();
    header("location:../index.php?message=keluar dari sistem");
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<h3>Halo Admin <?php echo $_SESSION['fullname']; ?></h3>
            <p>status pegawai: <?php echo $_SESSION['role']; ?></p>
<style>
    body{
        margin-left: 20px;
    }
tr{
    margin: auto;
    text-align: center;
    justify-content: center;
}
</style>
<table class="table table-striped-columns">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Tentang Kariawan</th>
    </tr>
        <?php foreach( $time as $jam) :?>
    <tr>
        <td><?=htmlspecialchars($jam['employee_id']) ?></td>
        <td><?=htmlspecialchars($jam['tgl'])?></td>
        <td><?=htmlspecialchars($jam['clock_in'])?></td>
        <td><?=htmlspecialchars($jam['clock_out'])?></td>
        <td><a href="profile.php?employee_id=<?= $jam['employee_id']?>" class="btn btn-info">Lihat Profile Karyawan</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<br>
<br>
<form action="" method="POST">
                <button name="logout" type="submit" class="btn btn-danger">logout</button>
            </form>
<a href="tambah.php" class="btn btn-dark">Tambah Karyawan</a>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>












