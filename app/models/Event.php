<?php

class Event extends Database
{
  function getEvents()
  {
    $statement = $this->connect()->prepare('select * from event');
    if (!$statement->execute()) {
      $statement = null;
      // header("location: ../")
      exit();
    }
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }
}
