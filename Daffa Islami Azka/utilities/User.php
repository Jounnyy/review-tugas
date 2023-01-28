<?php 

class User {
    private $employee_id;
    private $fullname;
    private $role;
    private $password;

    public function set_login_data($employee_id, $password)
    {
        $this->employee_id = $employee_id;
        $this->password = $password;
    }

    public function get_employee_id()
    {
        return $this->employee_id;
    }

    public function get_password()
    {
        return $this->password;
    }
}








?>