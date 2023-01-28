<?php
session_start();
include ("../connection.php");
include ("../Users.php");
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login")
{
    header("location:../index.php?message=silahkan login terlebih dahulu");
}
// echo 
if(strlen($_POST['add-nip']) <= 2 || strlen($_POST['add-pass']) <= 2)
// cek jika panjang inpput kurang dari 2 jika iya balik ke page yang sama
{
    header("location:admin-page.php?message=data yang anda input tidak valid");
}
else
{
     $add_nip = $_POST['add-nip'];
     $add_name = $_POST['add-name'];
     $add_role = $_POST['add-role'];
     $add_pass = md5($_POST['add-pass']);

     $add = "INSERT INTO users (`id`, `employee_id`, `full_name`, `role`, `password`) VALUES (NULL,  $add_nip, '$add_name', '$add_role', '$add_pass')";
     $result = $db -> query($add);

     header("location:admin-page.php?message=Data sukses di input");

}


// if(isset($_POST['keluar']))
// {
//     $update = "UPDATE attendance SET clock_out='$time' WHERE
//     employee_id = $employee_id && tgl = '$tgl'";

//     $clock_out = $db-> query($update);
//     if($clock_out === true)
//     {   
//         session_start();
//         session_destroy();
//         header("location:../index.php");
//     }
// }
?>
