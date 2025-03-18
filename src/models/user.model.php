<?php

class User extends DB
{

  protected function getUserByUsername($username)
  {
    $statement = $this->connect()->prepare('SELECT * FROM users WHERE username = ?;');

    if (!$statement->execute(array($username))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    if ($statement->rowCount() > 0) {
      $statement = null;
      throw new Exception("User not found.", 404);
    }

    $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement = null;

    return $user;
  }

  protected function insertUser($username, $hashedPassword, $email, $firstName, $lastName)
  {
    $statement = $this->connect()->prepare('INSERT INTO users (username, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?);');

    if (!$statement->execute(array($username, $hashedPassword, $firstName, $lastName, $email))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }

  protected function checkUser($username, $email)
  {
    $statement = $this->connect()->prepare('SELECT user_id FROM users WHERE username = ? OR email = ?;');

    if (!$statement->execute(array($username, $email))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    if ($statement->rowCount() > 0) {
      return false;
    }

    return true;
  }
}
