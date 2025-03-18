<?php

class Signup extends DB
{

  protected function insertUser($username, $password, $email, $firstName, $lastName)
  {
    $statement = $this->connect()->prepare('INSERT INTO users (username, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?);');

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (!$statement->execute(array($username, $hashedPassword, $firstName, $lastName, $email))) {
      $statement = null;
      header("location: ../signup?error=statementfailed");
      exit();
    }

    $statement = null;
  }

  protected function checkUser($username, $email)
  {
    $statement = $this->connect()->prepare('SELECT user_id FROM users WHERE username = ? OR email = ?;');

    if (!$statement->execute(array($username, $email))) {
      $statement = null;
      header("location: ../signup?error=statementfailed");
      exit();
    }

    if ($statement->rowCount() > 0) {
      return false;
    }

    return true;
  }
}
