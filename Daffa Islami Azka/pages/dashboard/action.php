<?php

include("./../../utilities/connection.php");

session_start();

date_default_timezone_set("Asia/Jakarta");
$current_date = date('Y-m-d'); 
$current_time = date('H:i'); 
$employee_id = $_SESSION["employee_id"];

if(isset($_POST["clock-in"])) {
    $check_date = "SELECT date FROM attendances WHERE employee_id=$employee_id AND date='$current_date'";
    $check = $db->query($check_date);

    if ($check->num_rows > 0) {
        header("location:./index.php");
    } else {
        $sql = "INSERT INTO attendances (id, employee_id, date, clock_in, clock_out) 
                values (null, '$employee_id', '$current_date', '$current_time', null)";
        $result = $db->query($sql);
        header("location:./index.php");
    }
}

if (isset($_POST['clock-out'])) {
    $update = "UPDATE attendances SET clock_out='$current_time' WHERE employee_id=$employee_id AND date='$current_date'";
    $clock_out = $db->query($update);
    header("location:./index.php");
    // if ($clock_out === true) {
    //     session_start();
    //     session_destroy();
    //     header("location:../index.php?message=Log out successfully!");
    // }
}

if(isset($_POST['history'])) {
    header('location:./history_attendances.php');
}

if(isset($_POST['back'])) {
    header("location:./index.php");
}

if (isset($_GET['logmeout']) || isset($_POST['sign_out'])) {
    session_start();
    session_destroy();
    header("location:./../../index.php?msg=Sign out successfully!");
}

?>