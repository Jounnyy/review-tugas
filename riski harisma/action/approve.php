<?php
include("../connection.php");
session_start();

date_default_timezone_set("Asia/Jakarta");

$izin_id = $_POST['izin_id'];

$status_app = $_POST['status'];


if (isset($_POST['approve'])) {
    $sql = "UPDATE izin SET status = '$status_app' where id = '$izin_id' ";
    $request = $db->query($sql);
    if ($request === TRUE) {
        header("location:../dashboard/index-admin.php?page=mrequest");
    } else {
        echo "maaf terjadi kesalahan";
    }
}
