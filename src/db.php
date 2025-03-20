<?php

class DB
{
  protected function connect()
  {
    try {
      $host = DB_HOST;
      $databaseName = DB_NAME;
      $username = DB_USERNAME;
      $password = DB_PASSWORD;
      $db = new PDO("mysql:host=$host;dbname=$databaseName", $username, $password);
      return $db;
    } catch (PDOException $e) {
      throw new Exception("Something went wrong. Please try again.", 500);
    }
  }
}
