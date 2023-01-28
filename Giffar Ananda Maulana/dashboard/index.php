<?php
include("./header.php");
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?message=silahkan login terlebih dahulu");
}
$tgl = date('Y-m-d');
$clock_in = date('H:i:s');
$employee_id = $_SESSION['employee_id'];
?>
<div class="content container mt-4">
    <div class="row bg-secondary text-light">
        <div class="d-flex m-auto bg-secondary">
            <div class="p-2 fs-5"><?php echo "$tgl" ?> </div>
            <div id="time" class="ms-auto p-2 fs-5"><?php echo "$clock_in" ?></div>
        </div>
    </div>
    <div class="quot row g-0 p-5 mt-4 align-items-center">
        <p class="fs-1 text-capitalize">Hallo <?php echo $_SESSION['fullname'] ?></p>
        <p class="fs-2 fw-light mb-1">Menetapkan tujuan adalah langkah pertama dalam mengubah yang tak terlihat menjadi terlihat.</p>
        <p class="fs-4">-Selamat Bekerja</p>
        <button class="btn col-md-7 btn-secondary btn-lg" type="button">Absen Sekarang</button>
    </div>
</div>
<?php
include("./footer.php");
?>