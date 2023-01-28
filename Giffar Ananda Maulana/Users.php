<?php

class Users
{
    private $employee_id;
    private $fullname;
    private $jenis_kelamin;
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

    function set_profile_data($employee_id, $fullname, $jenis_kelamin, $role, $password)
    {
        $this->employee_id = $employee_id;
        $this->fullname = $fullname;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->role = $role;
        $this->password = $password;
    }
}
