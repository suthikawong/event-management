<?php

class Event extends DB
{

  protected function get($limit = null, $offset = null)
  {
    $statement = '';
    if (is_int($limit) && is_int($offset)) {
      $statement = $this->connect()->prepare('SELECT * FROM events LIMIT :limit OFFSET :offset');
      $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
      $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
    } else {
      $statement = $this->connect()->prepare('SELECT * FROM events');
    }

    if (!$statement->execute()) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement = null;
    return $data;
  }

  protected function getById($id)
  {
    $statement = $this->connect()->prepare('SELECT * FROM events WHERE event_id = ?');

    if (!$statement->execute(array($id))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }

    if ($statement->rowCount() == 0) {
      $statement = null;
      throw new Exception("Event not found", 404);
    }

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement = null;
    return $data[0];
  }

  protected function getCount()
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

  protected function insert($eventName, $description, $image, $startDate, $endDate, $location)
  {
    $statement = $this->connect()->prepare("INSERT INTO events(`event_name`, `description`, `image`, `start_date`, `end_date`, `location`) VALUES (?, ?, ?, ?, ?, ?)");

    if (!$statement->execute(array($eventName, $description, $image, $startDate, $endDate, $location))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }

  protected function update($eventId, $eventName, $description, $image, $startDate, $endDate, $location)
  {
    $statement = $this->connect()->prepare("UPDATE events SET `event_name` = ?, `description` = ?, `image` = ?, `start_date` = ?, `end_date` = ?, `location` = ? WHERE event_id = ?");

    if (!$statement->execute(array($eventName, $description, $image, $startDate, $endDate, $location, $eventId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }

  protected function delete($eventId)
  {
    $statement = $this->connect()->prepare("DELETE FROM events WHERE event_id = ?");

    if (!$statement->execute(array($eventId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }
}
