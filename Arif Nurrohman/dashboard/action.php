<?php
include("../connection.php");
session_start();

date_default_timezone_set("Asia/Jakarta"); //GMT +07

$tgl = date('Y-m-d');
$clock_in = date('H:i:s');
$employee_id = $_SESSION['employee_id'];

if(isset($_POST['absen'])) {
  $check_absensi = "SELECT tgl FROM attendaces WHERE employee_id=$employee_id AND tgl='$tgl'";

  $check = $db->query($check_absensi);

  if ($check->num_rows > 0) {
    header("location:attendance.php?message=anda sudah absen");
    // header('location:../index.php?message=Silahkan Login Terlebih Dahulu');
  } else {
    $sql = "INSERT INTO attendaces (id, employee_id, tgl, clock_in, clock_out) VALUES (NULL, $employee_id, '$tgl', '$clock_in', NULL)";

    $result = $db->query($sql);
    if ($result === TRUE) {
      header("location:attendance.php?message=absen berhasil dilakukan");
    } else {
      header("location:attendance.php?message=absensi gagal!");
    }
  }

}
?>