<?php

class EventManagementController extends Event
{
  public function getEvents($keyword = '', $limit = null, $offset = null)
  {
    return $this->get($keyword, $limit, $offset);
  }

  public function getEventById($id)
  {
    return $this->getById($id);
  }

  public function getEventCount()
  {
    return $this->getCount();
  }

  public function insertEvent($eventName, $description, $image, $date, $category, $location)
  {
    $this->validateInput($eventName, $date, $category, $location);
    return $this->insert($eventName, $description, $image, $date, $category, $location);
  }

  public function updateEvent($eventId, $eventName, $description, $image, $date, $category, $location)
  {
    $this->validateInput($eventName, $date, $category, $location);
    return $this->update($eventId, $eventName, $description, $image, $date, $category, $location);
  }

  public function deleteEvent($eventId)
  {
    return $this->delete($eventId);
  }

  private function validateInput($eventName, $date, $category, $location)
  {
    if ($this->checkEmptyInput($eventName, $date, $category, $location) == false) {
      throw new Exception("Please fill all required fields", 400);
    }
    return true;
  }

  private function checkEmptyInput($eventName, $date, $category, $location)
  {
    if (empty($eventName) || empty($date) || empty($category) || empty($location)) {
      return false;
    }
    return true;
  }
}
