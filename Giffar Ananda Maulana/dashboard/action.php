<?php
include("../connection.php");

session_start();

date_default_timezone_set("Asia/Jakarta"); //GMT +07

$employee_id = $_SESSION['employee_id'];
$tgl = date('Y-m-d');
$clock_in = date('H:i:s');
$clock_out = date('H:i:s');

// absen masuk 
if (isset($_POST['absen_in'])) {
    $check_absensi = "SELECT tgl FROM attendaces WHERE employee_id=$employee_id AND tgl='$tgl'";

    $check = $db->query($check_absensi);

    if ($check->num_rows > 0) {
        header("location:./absensi.php?message=anda sudah melakukan absen masuk");
    } else {
        $sql = "INSERT INTO attendaces (id,employee_id, tgl, clock_in, clock_out)VALUES (NULL, $employee_id, '$tgl', '$clock_in',NULL)";

        $result = $db->query($sql);
        if ($result === TRUE) {
            header("location:./absensi.php?message=berhasil melakukan absen masuk");
        } else {
            header("location:./absensi.php?message=absensi gagal");
        }
    }
}

// absen keluar

if (isset($_POST['absen_out'])) {
    $status = 'keluar';

    $check_absensi_in = "SELECT clock_in FROM attendaces WHERE employee_id=$employee_id AND tgl='$tgl'";
    $check_in = $db->query($check_absensi_in);

    if ($check_in->num_rows == 0) {
        header("location:./absensi.php?status=anda belum melakukan absen masuk, tidak bisa melakukan absen out");
    } else {
        $check_absensi_out = "SELECT clock_out FROM attendaces WHERE employee_id=$employee_id AND tgl='$tgl'";
        $check_out = $db->query($check_absensi_out);
        if ($check_out->num_rows > 1) {
            header("location:./absensi.php?status=anda sudah melakukan absen out sebelumnya");
        } else {
            $update_absen = "UPDATE attendaces SET clock_out='$clock_out' WHERE employee_id=$employee_id AND tgl='$tgl'";
            $update = $db->query($update_absen);
            if ($update === TRUE) {
                header("location:./absensi.php?status=berhasil melakukan absen out");
            } else {
                header("location:./absensi.php?status=absensi gagal");
            }
        }
    }
}
