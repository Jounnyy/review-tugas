<?php

class Users
{
  private $user_id;
  private $password;
  private $search_input;
  private $nama_lengkap;
  private $role;

  function set_login_data($user_id, $password)
  {
    $this->user_id = $user_id;
    $this->password = $password;
  }

  function get_user_id()
  {
    return $this->user_id;
  }

  function get_user_password()
  {
    return $this->password;
  }

  function set_user_data ($search_input) {
    $this->search_input = $search_input;
  }

  function get_user_data(){
    return $this->search_input;
  }
  
}

?>