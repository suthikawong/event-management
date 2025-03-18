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
    $checkPassword = password_verify($this->password, $user['password']);

    if ($checkPassword == false) {
      throw new Exception("Incorrect username or password", 400);
    }

    $_SESSION["userId"] = $user['user_id'];
    $_SESSION["username"] = $user['username'];
    $_SESSION["firstName"] = $user['first_name'];
    $_SESSION["lastName"] = $user['last_name'];
    $_SESSION["email"] = $user['email'];
    $_SESSION["isAdmin"] = $user['is_admin'];
  }

  public function getUserByUserId($userId)
  {
    return $this->getUserById($userId);
  }

  private function checkEmptyInput()
  {
    if (empty($this->username) || empty($this->password)) {
      return false;
    }
    return true;
  }
}
