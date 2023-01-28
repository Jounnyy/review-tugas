<?php

include("./../../utilities/connection.php");

if (isset($_POST['create'])) {
    if(strlen($_POST['employee_id']) <= 2 || strlen($_POST['fullname']) <= 2 || strlen($_POST['password']) <= 2) {
        header('Location:./create_employee.php?msg=input cannot be 2 character.');
    } else if ($_POST['role_options'] == "Select roles") {
        header('Location:./create_employee.php?msg=please choose the role options.');
    } else {
        $check_employee_id = "SELECT employee_id FROM users";
        $check_result = $db->query($check_employee_id);
        if ($check_result->num_rows > 0) {
            while ($row = $check_result->fetch_assoc()) {
                if ($_POST['employee_id'] == $row['employee_id']) {
                    header('Location:./create_employee.php?msg=E-ID has been used.');
                }
            }
        }

        $employee_id = $_POST['employee_id'];
        $fullname = $_POST['fullname'];
        $role = $_POST['role_options'];
        $password = md5($_POST['password']);
        $sql = "INSERT INTO users (id, employee_id, fullname, role, password) 
                values (null, '$employee_id', '$fullname', '$role', '$password')";
        $result = $db->query($sql);
        header("location:./index.php");
    }
}

if(isset($_POST['back'])) {
    header("location:./index.php");
}

if(isset($_POST['ct_emp'])) {
    header("location:./create_employee.php");
}

if (isset($_GET['logmeout']) || isset($_POST['sign_out'])) {
    session_start();
    session_destroy();
    header("location:./../../index.php?msg=Sign out successfully!");
}

?>