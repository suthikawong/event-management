<?php

class UserManagementController extends User
{
  public function getUsers($keyword = '', $limit = null, $offset = null)
  {
    return $this->get($keyword, $limit, $offset);
  }

  public function getUserById($id)
  {
    return $this->getById($id);
  }

  public function insertUser($username, $email, $firstName, $lastName, $isAdmin)
  {
    $this->validateInput($username, $email, $firstName, $lastName, $isAdmin);
    return $this->insert($username, null, $email, $firstName, $lastName, $isAdmin);
  }

  public function updateUser($userId, $username, $email, $firstName, $lastName, $isAdmin)
  {
    $this->validateInput($username, $email, $firstName, $lastName, $isAdmin, $userId);
    return $this->update($userId, $username, null, $email, $firstName, $lastName, $isAdmin);
  }

  public function deleteUser($userId)
  {
    return $this->delete($userId);
  }

  private function validateInput($username, $email, $firstName, $lastName, $isAdmin, $userId = null)
  {
    if ($this->checkEmptyInput($username, $email, $firstName, $lastName, $isAdmin) == false) {
      throw new Exception("Please fill all required fields", 400);
    }
    if ($this->checkInvalidUsername($username) == false) {
      throw new Exception("Invalid username", 400);
    }
    if ($this->checkInvalidEmail($email) == false) {
      throw new Exception("Invalid email", 400);
    }
    if ($this->checkUsernameTaken($username, $email, $userId) == false) {
      throw new Exception("Username or email has already taken", 400);
    }
    return true;
  }

  private function checkEmptyInput($username, $email, $firstName, $lastName, $isAdmin)
  {
    if (empty($username) || empty($email) || empty($firstName) || empty($lastName) || !is_bool($isAdmin)) {
      return false;
    }
    return true;
  }

  private function checkInvalidUsername($username)
  {
    if (!preg_match(("/^[a-zA-Z0-9]*$/"), $username)) {
      return false;
    }
    return true;
  }

  private function checkInvalidEmail($email)
  {
    if (!filter_var($email)) {
      return false;
    }
    return true;
  }

  private function checkUsernameTaken($username, $email, $userId)
  {
    if (!$this->checkUser($username, $email, $userId)) {
      return false;
    }
    return true;
  }
}
