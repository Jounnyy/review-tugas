<?php
    include ("connection.php");
    include ("Users.php");
    session_start();
    $user = new Users();
    // isset apakah udh kepanggil
    if(isset($_POST['login']))
    {
        if(strlen($_POST['nip']) <= 2 || strlen($_POST['password']) <= 2)
        // cek jika panjang inpput kurang dari 2 jika iya balik ke page yang sama
        {
            header("location:index.php?message=data yang anda input tidak valid");
        }
        else
        // jika aman ke dashboard
        { 
            $user-> set_login_data($_POST['nip'], $_POST['password']);
            
            $id = $user -> get_employee_id();
            $password = $user -> get_password();
            $sql = "SELECT * FROM users WHERE employee_id = $id AND password = '".md5($password)."'";
            $result = $db -> query($sql);
           
            if($result -> num_rows > 0)
            {
                // data yang akan dimasukkan ke dahsboard
                while($row = $result -> fetch_assoc())
                {
                    $_SESSION['status'] = "login";  
                    $_SESSION['employee_id'] = $row['employee_id'];  
                    $_SESSION['fullname'] = $row['full_name'];
                    $_SESSION['role'] = $row['role'];
                    

                }
                if($_SESSION['role'] == 'admin')
                {
                    
                    header("location:dashboard/admin-page.php");
                }
                else
                header("location:dashboard/index.php");
            }
            else 
                header("location:index.php?message=NIP atau password salah");
           
         }
    }
?>