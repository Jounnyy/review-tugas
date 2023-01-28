<?php

if (!$_SESSION['status']) {
    header("Location:../index.php?message=blum login");
}

class Users
{
    private $employee_id;
    private $fullname;
    private $role;
    private $password;

    function set_login_data($employee_id, $password)
    {
        $this->employee_id = $employee_id;
        $this->password = $password;
    }

    function get_employee_id()
    {
        return $this->employee_id;
    }

    function get_password()
    {
        return $this->password;
    }

    function set_profile_data()
    {
    }
}
