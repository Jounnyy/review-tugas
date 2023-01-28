<?php 
include('./connection.php');
include('./Users.php');
session_start();

$user = new Users();



if(isset($_POST['login'])){

    if(strlen($_POST['employee_id']) <= 2 || strlen($_POST['password']) <= 2){
        header('location:index.php?message=Data yang anda masukan tidak valid');
    } else {
        $user->set_login_data($_POST['employee_id'], md5($_POST['password']));
        $id = $user->get_employee_id();
        $password = $user->get_password();
        $sql = "SELECT * FROM users WHERE employee_id=$id AND password ='$password'";
        $result  = $db->query($sql);
        if($result->num_rows > 0 ){
            while($row = $result->fetch_assoc()){
                //hbbn
                $_SESSION['status'] = "login";
                $_SESSION['employee_id'] = $row['employee_id'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['role'] = $row['role'];

                header('location:dashboard/index2.php');
            }
            
            // echo "Ada Bro";
        } else {
            header('location:index.php?message=NIP dan Password Invalid');
        }
    }

}

?>

