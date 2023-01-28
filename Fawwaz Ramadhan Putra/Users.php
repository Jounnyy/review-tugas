<?php
class users
{
    private $employee_id;
    private $full_name;
    private $role;
    private $password;
    // parameter di bawah adalah hal2 yg diperlukan untuk login
    function set_login_data($employee_id, $password)
    {
        // this digunakan untuk "manggil variabel" lalu diisi oleh $employee id
        $this -> employee_id = $employee_id;
        $this -> password = $password;
    }

    function get_employee_id()
    {
        return $this -> employee_id;
    }

    function get_password()
    {
        return $this -> password;
    }


    function set_profile_date()
    {

    }
}
?>