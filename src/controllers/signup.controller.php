<?php

class SignupController extends User
{
  private $username;
  private $password;
  private $confirmPassword;
  private $email;
  private $firstName;
  private $lastName;

  public function __construct($username, $password, $confirmPassword, $email, $firstName, $lastName)
  {
    $this->username = $username;
    $this->password = $password;
    $this->confirmPassword = $confirmPassword;
    $this->email = $email;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }

  public function signupUser()
  {
    $this->validateInput();
    $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
    return $this->insertUser($this->username, $hashedPassword, $this->email, $this->firstName, $this->lastName);
  }

  private function validateInput()
  {
    if ($this->checkEmptyInput() == false) {
      throw new Exception("Please fill all required fields", 400);
    }
    if ($this->checkInvalidUsername() == false) {
      throw new Exception("Invalid username", 400);
    }
    if ($this->checkInvalidEmail() == false) {
      throw new Exception("Invalid email", 400);
    }
    if ($this->checkPasswordMatch() == false) {
      throw new Exception("Password do not match", 400);
    }
    if ($this->checkUsernameTaken() == false) {
      throw new Exception("Username or email has already taken", 400);
    }
    return true;
  }

  private function checkEmptyInput()
  {
    if (empty($this->username) || empty($this->password) || empty($this->confirmPassword) || empty($this->email) || empty($this->firstName) || empty($this->lastName)) {
      return false;
    }
    return true;
  }

  private function checkInvalidUsername()
  {
    if (!preg_match(("/^[a-zA-Z0-9]*$/"), $this->username)) {
      return false;
    }
    return true;
  }

  private function checkInvalidEmail()
  {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      return false;
    }
    return true;
  }

  private function checkPasswordMatch()
  {
    if ($this->password !== $this->confirmPassword) {
      return false;
    }
    return true;
  }

  private function checkUsernameTaken()
  {
    if (!$this->checkUser($this->username, $this->email)) {
      return false;
    }
    return true;
  }
}
