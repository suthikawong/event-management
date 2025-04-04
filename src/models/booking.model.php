<?php

class Booking extends DB
{

  protected function getBookingByUserId($userId)
  {
    $statement = $this->connect()->prepare('SELECT e.* FROM bookings b LEFT JOIN events e ON e.event_id = b.event_id WHERE user_id = ?');

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
    $statement = $this->connect()->prepare("INSERT INTO bookings(`user_id`, `event_id`) VALUES (?, ?)");

    if (!$statement->execute(array($userId, $eventId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }
}
