<?php

class LoginController extends User
{
  private $username;
  private $password;

  public function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  public function login()
  {
    if ($this->checkEmptyInput() == false) {
      throw new Exception("Please fill all required fields", 400);
    }

    $user = $this->getUserByUsername($this->username);
    $checkPassword = password_verify($this->password, $user[0]['password']);

    if ($checkPassword == false) {
      throw new Exception("Incorrect username or password", 400);
    }

    $_SESSION["userId"] = $user[0]['user_id'];
    $_SESSION["username"] = $user[0]['username'];
    $_SESSION["firstName"] = $user[0]['first_name'];
    $_SESSION["lastName"] = $user[0]['last_name'];
    $_SESSION["email"] = $user[0]['email'];
    $_SESSION["isAdmin"] = $user[0]['is_admin'];
  }

  private function checkEmptyInput()
  {
    if (empty($this->username) || empty($this->password)) {
      return false;
    }
    return true;
  }
}
