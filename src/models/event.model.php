<?php

class Event extends DB
{

  protected function getEvents($limit = 3)
  {
    $statement = $this->connect()->prepare('SELECT * FROM events LIMIT ?');
    $statement->bindParam(1, $limit, PDO::PARAM_INT);

    if (true) {
      $statement = null;
      header("location: ../home?error=statementfailed");
      exit();
    }

    $data = $statement->fetchAll();
    $statement = null;
    return $data;
  }

  protected function getEventCount()
  {
    $statement = $this->connect()->prepare('SELECT event_id FROM events');

    if (!$statement->execute()) {
      $statement = null;
      header("location: ../home?error=statementfailed");
      exit();
    }

    $count = $statement->rowCount();
    $statement = null;
    return $count;
  }
}
