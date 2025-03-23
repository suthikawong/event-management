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

  public function insertEvent($eventName, $description, $image, $startDate, $endDate, $location)
  {
    $this->validateInput($eventName, $startDate, $endDate, $location);
    return $this->insert($eventName, $description, $image, $startDate, $endDate, $location);
  }

  public function updateEvent($eventId, $eventName, $description, $image, $startDate, $endDate, $location)
  {
    $this->validateInput($eventName, $startDate, $endDate, $location);
    $this->getById($eventId);
    return $this->update($eventId, $eventName, $description, $image, $startDate, $endDate, $location);
  }

  public function deleteEvent($eventId)
  {
    return $this->delete($eventId);
  }

  private function validateInput($eventName, $startDate, $endDate, $location)
  {
    if ($this->checkEmptyInput($eventName, $startDate, $endDate, $location) == false) {
      throw new Exception("Please fill all required fields", 400);
    }
    return true;
  }

  private function checkEmptyInput($eventName, $startDate, $endDate, $location)
  {
    if (empty($eventName) || empty($startDate) || empty($endDate) || empty($location)) {
      return false;
    }
    return true;
  }
}
