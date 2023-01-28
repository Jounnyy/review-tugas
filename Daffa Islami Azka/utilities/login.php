<?php

include("./connection.php");
include("./User.php");

$user = new User();

session_start();

if(isset($_POST['sign_in'])) {
    if(strlen($_POST['employee_id']) <= 2 || strlen($_POST['password']) <= 2) {
        header('Location:../index.php?msg=input cannot be 2 character.');
    } else {

        $user->set_login_data($_POST['employee_id'], $_POST['password']);

        $id = $user->get_employee_id();
        $password = md5($user->get_password());

        $sql = "SELECT * FROM users WHERE employee_id= $id AND password= '$password'";
        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $role;
            while($row = $result->fetch_assoc()) {
                $_SESSION['status'] = "logined";
                $_SESSION['employee_id'] = $row['employee_id'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['role'] = $row['role'];
                $role = $row['role'];
            }

            echo $role;

            if ($role == 'admin') {
                header("location:../pages/admin/index.php");
            } else {
                header("location:../pages/dashboard/index.php");
            }

        } else {
            header("location:../index.php?msg=You are always wrong in the eyes of women.");
        }

    }
}

?>