<?php


class Database
{
  protected function connect()
  {
    try {
      $dbUrl = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
      $con = new PDO($dbUrl, DBUSER, DBPASS);
      return $con;
    } catch (PDOException $e) {
      print "Error: " . $e->getMessage()() . "<br/>";
      die();
    }
  }
}
