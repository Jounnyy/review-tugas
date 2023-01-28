<?php

include("connection.php");
include("user_class.php");

$user = new Users();
if (isset($_POST['login'])) {

    $user->set_login_data($_POST['user_id'], $_POST['password']);
    $user_id = $user->get_user_id();
    $password = $user->get_password();

    $sql = "SELECT * FROM users WHERE user_id='$user_id' AND password='$password'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($data = $result->fetch_assoc()) {
            session_start();
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['status'] = "login";

            date_default_timezone_set("Asia/Jakarta");

            $tgl = date('Y-m-d');
            $check_absen = "SELECT * FROM absensi where user_id='$user_id' and tgl = '$tgl'";
            $check = $db->query($check_absen);
            if ($check->num_rows == 0) {
                $sql = "INSERT INTO absensi (`id`, `user_id`, `tgl`, `jam_masuk`, `jam_keluar`) VALUES (NULL, '$user_id', '$tgl', NULL, NULL)";
                $result = $db->query($sql);
            }

            if ($data['role'] == "admin") {
                header("location:dashboard/index-admin.php?page=muser&message=selamat datang administrator");
            } else {
                header("location:dashboard/index.php?page=absensi&message=selamat datang di sistem absensi sederhana 🎉");
            }
        }
    } else {
        header("location:index.php?message=silahkan masukan data yang benar 😉");
    }
}
