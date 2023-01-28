<?php
include("../connection.php");

date_default_timezone_set("Asia/Jakarta"); //GMT +07

$tgl = date('Y-m-d');
$clock_in = date('H:i:s');

$employee_id = $_SESSION['employee_id'];

if (isset($_POST['absen'])) {
  $sql = "INSERT INTO attendances (id, employee_id, tgl, clock_in, clock_out) VALUES (NULL, $employee_id, '$tgl', '$clock_in', NULL)";

  $result = $db->query($sql);

  if ($result === TRUE) {
    echo "BERHASIL ABSEN";
  } else {
    echo "GAGAL ABSEN";
  }
}
?>