<?php

class Event extends DB
{

  protected function getEvents($limit = 3)
  {
    $statement = $this->connect()->prepare('SELECT * FROM events LIMIT ?');
    $statement->bindParam(1, $limit, PDO::PARAM_INT);

    if (!$statement->execute()) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
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
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    $count = $statement->rowCount();
    $statement = null;
    return $count;
  }
}
