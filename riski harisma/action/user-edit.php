<?php
include("../connection.php");
session_start();

date_default_timezone_set("Asia/Jakarta");

$action = $_GET['action'];

if ($action == 'edit'){
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $id = $_POST['user_id'];
    if (isset($_POST['edit'])) {
        $sql = "UPDATE users SET nama_lengkap = '$nama', password = '$password' where user_id = '$id' ";
        $request = $db->query($sql);
        if ($request === TRUE) {
            header("location:../dashboard/index-admin.php?page=muser");
        } else {
            echo "maaf terjadi kesalahan";
        }
    }
    
}

if ($action == 'delete'){
    $id = $_POST['user_id'];
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM users where user_id = '$id'";
        $request = $db->query($sql);
        if ($request === TRUE) {
            header("location:../dashboard/index-admin.php?page=muser");
        } else {
            echo "maaf terjadi kesalahan";
        }
    }
    
}
// $status_app = $_POST['status'];


