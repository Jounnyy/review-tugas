<?php
include("connection.php");
include("Users.php");

session_start();
$user = new Users();

if (isset($_POST['login'])) {
    if (strlen($_POST['nip']) <= 2 || strlen($_POST['password']) <= 2) {
        header("location:index.php?message=Data Tidak Valid");
    } else {
        $user->set_login_data($_POST['nip'], $_POST['password']);
        $id = $user->get_employee_id();
        $password = $user->get_password();

        $sql = "SELECT * FROM users WHERE employee_id = $id";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['status'] = "login";
                    $_SESSION['employee_id'] = $row['employee_id'];
                    $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['role'] = $row['role'];
                } else {
                    header("location:index.php?message=Nip dan Password Salah");
                }
            }
            if ($_SESSION['role'] == 'admin') {
                header("location:./dashboard-admin/index.php");
            } else {
                header("location:dashboard/index.php");
            }
        } else {
            header("location:index.php?message=Nip dan Password Salah");
        }
    }
}
