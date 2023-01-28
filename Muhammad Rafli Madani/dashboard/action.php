

<?php
include("../connection.php");
session_start();

if ($_SESSION['role'] == 'admin') {
  header("location:index-admin.php");
} else {
  header("location:index-admin.php");
}
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:../index.php?message=silahkan login terlebih dahulu");
}



date_default_timezone_set("Asia/Jakarta"); //GMT +07

$employee_id = $_SESSION['employee_id'];
$tgl = date('Y-m-d');
$clock_in = date('H:i:s');

if (isset($_POST['absen'])) {
  $check_absensi = "SELECT tgl FROM attendances WHERE employee_id=$employee_id AND tgl='$tgl'";

  $check = $db->query($check_absensi);

  if ($check->num_rows > 0) {
    header("location:index.php?message= <h4 style='color: red;'>Anda Sudah Absen Hari Ini</h4>");
  } else {
    $sql = "INSERT INTO attendances (id, employee_id, tgl, clock_in, clock_out) VALUES (NULL, $employee_id, '$tgl', '$clock_in', NULL)";

    $result = $db->query($sql);
    if ($result === TRUE) {
      header("location:index.php?message=<h4 style='color: green;'>absen berhasil</h4>");
    } else {
      header("location:index.php?message=<h4 style='color: red;'>absen gagal</h4>");
    }
  }

}
?>
 