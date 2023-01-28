<?php
$hostname = "localhost";
$username = "u1485078_absensi";
$password = "pw";
$db_name = "u1485078_absensi";

$db = new mysqli($hostname, $username, $password, $db_name);

if ($db->connect_error) {
  echo "error connection";
}

?>