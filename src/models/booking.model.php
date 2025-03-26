<?php

class Booking extends DB
{

  protected function getBookingByUserId($userId)
  {
    $statement = $this->connect()->prepare('SELECT * FROM booking WHERE user_id = ?');

    if (!$statement->execute(array($userId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement = null;
    return $data;
  }

  protected function insert($userId, $eventId)
  {
    $statement = $this->connect()->prepare("INSERT INTO booking(`user_id`, `event_id`) VALUES (?, ?)");

    if (!$statement->execute(array($userId, $eventId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }
}
