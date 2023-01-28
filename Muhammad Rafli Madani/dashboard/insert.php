<?php 
include('../connection.php');

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?message=silahkan login terlebih dahulu");
  }
  

$employee_id = $_POST['employee_id'];
$fullname = $_POST['fullname'];
$role = $_POST['role'];
$password = $_POST['password'] ;

$password_hash = md5($password);
$query = "INSERT INTO users SET employee_id=$employee_id, fullname='$fullname', role='$role', password='$password_hash'";
$hasil = $db->query($query);

if($hasil){
    header('location: index-admin.php');
}
?>