<?php

class Event extends DB
{

  protected function get($keyword, $startDate, $endDate, $limit, $offset)
  {
    $sql = 'SELECT * FROM events';
    $sqlCount = 'SELECT event_id FROM events';

    if (!empty($keyword) || !empty($startDate) || !empty($endDate)) {
      $conditions = array();
      if (!empty($keyword)) {
        $condition = '(event_name LIKE :keyword OR category LIKE :keyword OR location LIKE :keyword)';
        array_push($conditions, $condition);
      }
      if (!empty($startDate) && !empty($endDate)) {
        $condition = '(date BETWEEN :startDate AND :endDate)';
        array_push($conditions, $condition);
      }
      $where = ' WHERE ' . implode(' AND ', $conditions);
      $sql = $sql . $where;
      $sqlCount = $sqlCount . $where;
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
    if (!empty($startDate)) {
      $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
      $statementCount->bindParam(':startDate', $startDate, PDO::PARAM_STR);
    }
    if (!empty($endDate)) {
      $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
      $statementCount->bindParam(':endDate', $endDate, PDO::PARAM_STR);
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

  protected function insert($eventName, $description, $image, $date, $category, $location)
  {
    $statement = $this->connect()->prepare("INSERT INTO events(`event_name`, `description`, `image`, `date`, `category`, `location`) VALUES (?, ?, ?, ?, ?, ?)");

    if (!$statement->execute(array($eventName, $description, $image, $date, $category, $location))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }

  protected function update($eventId, $eventName, $description, $image, $date, $category, $location)
  {
    $this->getById($eventId);
    $statement = $this->connect()->prepare("UPDATE events SET `event_name` = ?, `description` = ?, `image` = ?, `date` = ?, `category` = ?, `location` = ? WHERE event_id = ?");

    if (!$statement->execute(array($eventName, $description, $image, $date, $category, $location, $eventId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }

  protected function delete($eventId)
  {
    $this->getById($eventId);
    $statement = $this->connect()->prepare("DELETE FROM events WHERE event_id = ?");

    if (!$statement->execute(array($eventId))) {
      $statement = null;
      throw new Exception("Something went wrong. Please try again.", 500);
    }
    $statement = null;
  }
}
