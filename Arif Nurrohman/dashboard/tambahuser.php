<?php 
include('../connection.php');
// include('./Users.php');
session_start();

// $user = new Users();
$employeeid = $_POST['employee_id'];
$fullname = $_POST['fullname'];
$role = $_POST['role'];
$password = $_POST['password'];
$pass = md5($password);

if(isset($_POST['createuser'])){
    $sql = "INSERT INTO users (id, employee_id, fullname, role, password) VALUES (NULL, $employeeid, '$fullname', '$role', '$pass')";
    $result = $db->query($sql);
    var_dump($result);
    if($result == TRUE){
        header('location:datausers.php?message="Data Berhasil di Tambahkan');
    } else{
        echo "Data tidak berhasil ditambahkan";
        
    }
}