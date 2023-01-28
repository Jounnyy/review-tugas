<?php
include "koneksi.php";
include "Users.php";

if (!$_SESSION['status']) {
    header("Location:../index.php?message=Login dlu!");
}

session_start();

$user = new Users();

if (isset($_POST['login'])) {

    if (strlen($_POST['nip']) < 2) {
        header("Location:index.php?message=Nip / Password ada yang salah");
    } else {
        $pass = $_POST['pass'];
        $user->set_login_data($_POST['nip'], hash('sha224', '$pass'));  

        $id = $user->get_employee_id();
        $password = $user->get_password();

        $sql = "SELECT * FROM users WHERE employee_id = $id AND pass = '$password'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // data yang akan masuk ke bagian dashboard
            while ($row = $result->fetch_assoc()) {
                $_SESSION['status'] = "login";
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['employee_id'] = $row['employee_id'];
                $_SESSION['role'] = $row['role'];
            }
            if ($_SESSION['role'] == "admin") {
                header("location: dashboard/index-admin.php");
            } else if ($_SESSION['role'] == "user") {
                header("location: dashboard/index.php");
            }
        } else {
            header("Location:index.php?message=Jgn ngawur la masbro");
        }
    }
}
