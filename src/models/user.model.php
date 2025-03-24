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

    if ($statement->rowCount() == 0) {
      $statement = null;
      throw new Exception("Incorrect username or password", 400);
    }

    $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement = null;

    return $user[0];
  }

  protected function get($keyword, $limit, $offset)
  {
    $sql = 'SELECT * FROM users';
    $sqlCount = 'SELECT user_id FROM users';

    if (!empty($keyword)) {
      $search = ' WHERE username LIKE :keyword OR CONCAT(first_name, " ", last_name) LIKE :keyword OR email LIKE :keyword';
      $sql = $sql . $search;
      $sqlCount = $sqlCount . $search;
    }
    if (is_int($limit) && is_int($offset)) {
      $sql = $sql . ' LIMIT :limit OFFSET :offset';
    }

    $statement = $this->connect()->prepare($sql);
    $statementCount = $this->connect()->prepare($sqlCount);

    if (!empty($keyword)) {
      $preparedKeyword = "%$keyword%";
      $statement->bindParam(':keyword', $preparedKeyword, PDO::PARAM_STR);
      $statementCount->bindParam(':keyword', $preparedKeyword, PDO::PARAM_STR);
    }
    if (is_int($limit) && is_int($offset)) {
      $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
      $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
    }

    if (!$statement->execute() || !$statementCount->execute()) {
      $statement = null;
      $statementCount = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    $total = $statementCount->rowCount();
    $statement = null;
    $statementCount = null;

    return array(
      "data" => $data,
      "total" => $total,
    );
  }

  protected function getById($userId)
  {
    $statement = $this->connect()->prepare('SELECT user_id, username, first_name, last_name, email, is_admin, allow_delete FROM users WHERE user_id = ?');

    if (!$statement->execute(array($userId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    if ($statement->rowCount() == 0) {
      $statement = null;
      throw new Exception("User not found", 404);
    }

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement = null;
    return $data[0];
  }

  // protected function insertUser($username, $hashedPassword, $email, $firstName, $lastName)
  // {
  //   $statement = $this->connect()->prepare('INSERT INTO users (username, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?);');

  //   if (!$statement->execute(array($username, $hashedPassword, $firstName, $lastName, $email))) {
  //     $statement = null;
  //     throw new Exception("Something went wrong. Please try again.", 500);
  //   }
  //   $statement = null;
  // }

  protected function insert($username, $hashedPassword, $email, $firstName, $lastName, $isAdmin)
  {
    $sql = 'INSERT INTO users (username, first_name, last_name, email, is_admin) VALUES (?, ?, ?, ?, ?);';
    $params = array($username, $firstName, $lastName, $email, $isAdmin);

    if (!empty($hashedPassword)) {
      $sql = 'INSERT INTO users (username, password, first_name, last_name, email, is_admin) VALUES (?, ?, ?, ?, ?, ?);';
      $params = array($username, $hashedPassword, $firstName, $lastName, $email, $isAdmin);
    }

    $statement = $this->connect()->prepare($sql);

    if (!$statement->execute($params)) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }

  protected function update($userId, $username, $email, $firstName, $lastName, $isAdmin)
  {
    $this->getById($userId);
    $statement = $this->connect()->prepare("UPDATE users SET `username` = ?, `email` = ?, `first_name` = ?, `last_name` = ?, `is_admin` = ? WHERE user_id = ?");

    if (!$statement->execute(array($username, $email, $firstName, $lastName, $isAdmin, $userId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }

  protected function delete($userId)
  {
    $user = $this->getById($userId);
    if (!$user["allow_delete"]) {
      $statement = null;
      throw new Exception("Not allow delete user.", 403);
    }

    $statement = $this->connect()->prepare("DELETE FROM users WHERE user_id = ?");

    if (!$statement->execute(array($userId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }

  protected function checkUser($username, $email, $userId = null)
  {
    $sql = 'SELECT user_id FROM users WHERE username = ? OR email = ?;';
    $params = array($username, $email);
    if ($userId) {
      $sql = 'SELECT user_id FROM users WHERE user_id != ? AND (username = ? OR email = ?);';
      $params = array($userId, $username, $email);
    }

    $statement = $this->connect()->prepare($sql);
    if (!$statement->execute($params)) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    if ($statement->rowCount() > 0) {
      return false;
    }

    return true;
  }

  protected function getUserById($userId)
  {
    $statement = $this->connect()->prepare('SELECT * FROM users WHERE user_id = ?;');

    if (!$statement->execute(array($userId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    if ($statement->rowCount() == 0) {
      $statement = null;
      throw new Exception("User not found", 404);
    }

    $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement = null;

    return $user[0];
  }
}
