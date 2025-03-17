<?php

class DB
{
  protected function connect()
  {
    try {
      $username = "root";
      $password = "";
      $db = new PDO('mysql:host=localhost;dbname=em_db', $username, $password);
      return $db;
    } catch (PDOException $e) {
      print("Error: " . $e->getMessage()() . "<br/>");
      die();
    }
  }
}
