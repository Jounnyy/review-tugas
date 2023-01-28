<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "absensi";

$db = new mysqli($hostname, $username, $password, $db_name);

  
$password_hash = password_hash($password, PASSWORD_BCRYPT);

?>