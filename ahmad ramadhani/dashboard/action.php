<?php
include "../koneksi.php";
session_start();

// if (!$_SESSION['status']) {
//     header("Location:../index.php?message=Login dlu!");
// }
date_default_timezone_set("Asia/Jakarta"); //GMT +07

$employee_id = $_SESSION['employee_id'];
$tgl = date('d-m-Y');
$clock_in = date('H:i:s');
$hari = date('l');



if (isset($_POST['absen'])) {
    if ($hari == 'Sunday') {
        $hari = 'Minggu';
    } else if ($hari == 'Monday') {
        $hari = 'Senin';
    } else if ($hari == 'Tuesday') {
        $hari = 'Selasa';
    } else if ($hari == 'Wednesday') {
        $hari = 'Rabu';
    } else if ($hari == 'Thursday') {
        $hari = 'Senin';
    } else if ($hari == 'Friday') {
        $hari = 'Jumat';
    } else if ($hari == 'Saturday') {
        $hari = 'Sabtu';
    }

    $absen = "SELECT tgl FROM attendances WHERE employee_id=$employee_id AND tgl='$tgl'";
    $cek = $db->query($absen);

    if ($cek->num_rows > 0) {
        echo "
                <script>
                alert('Sudah Absen');
                </script>
             ";
        header("Location:index.php");
    } else {
        $sql = "INSERT INTO attendances (id, employee_id, hari, tgl, clock_in, clock_out) VALUES (NULL, $employee_id, '$hari', '$tgl', '$clock_in', NULL)";
    }

    $result = $db->query($sql);
    if ($result === TRUE) {
        echo "<script>
                alert('Berhasil Absen');
                </script>
             ";
        header("location:index.php");
    } else {
        header("location:index.php?message=Absensi gagal!");
    }
}
