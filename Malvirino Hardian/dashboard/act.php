<?php 
include("../connection.php");
session_start();

date_default_timezone_set("Asia/Jakarta");
$user_id = $_SESSION['user_id'];
$tgl = date('Y-m-d');
$time = date('H:i:s');

$check_absen = "SELECT * FROM absensi WHERE  user_id='$user_id' AND tgl='$tgl'";
$check = $db->query($check_absen);

if ($check->num_rows > 0) {
    // jika users sudah pernah absen hari ini 
    header("location:index.php?message=maaf, hari ini anda sudah clockin!");
} else {
    // jika users belum absen maka di larikan kesini
    $sql = "INSERT INTO absensi (id, user_id, tgl, jam_masuk, jam_keluar) VALUES (NULL, '$user_id', '$tgl', '$time', NULL)";

    $result = mysqli_query($db, $sql);

    if ($result === TRUE) {
        header("location:index.php?message=terimakasih telah CLOCK IN hari ini");
    } else {
        header("location:index.php?message=gagal CLOCK IN hari ini");
    }
}
?>