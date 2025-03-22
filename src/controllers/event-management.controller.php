<?php

class EventManagementController extends Event
{
  public function getEvents()
  {
    return $this->get();
  }

  public function getEventById($id)
  {
    return $this->getById($id);
  }

  public function insertEvent($eventName, $description, $image, $startDate, $endDate, $location)
  {
    return $this->insert($eventName, $description, $image, $startDate, $endDate, $location);
  }

  public function updateEvent($eventId, $eventName, $description, $image, $startDate, $endDate, $location)
  {
    $this->getById($eventId);
    return $this->update($eventId, $eventName, $description, $image, $startDate, $endDate, $location);
  }

  public function deleteEvent($eventId)
  {
    return $this->delete($eventId);
  }
}
