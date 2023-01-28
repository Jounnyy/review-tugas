<?php
include("../connection.php");
session_start();

date_default_timezone_set("Asia/Jakarta");

$user_id = $_SESSION['user_id'];

$tgl_awal = $_POST['tgl-awal'];
$tgl_akhir = $_POST['tgl-akhir'];
$alasan = $_POST['alasan'];

if (isset($_POST['izin'])) {
    $sql = "INSERT INTO izin (id, user_id, tgl_awal, tgl_akhir, alasan , status) VALUES (NULL, '$user_id', '$tgl_awal', '$tgl_akhir', '$alasan', 'Menunggu') ";
    $request = $db->query($sql);
    if ($request === TRUE) {
        header("location:../dashboard/index.php?page=izin");
    } else {
        echo "maaf terjadi kesalahan";
    }
}
