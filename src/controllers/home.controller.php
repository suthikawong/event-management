<?php

class HomeController extends Event
{
  public function loadMoreEvents($limit)
  {
    return $this->getEvents($limit);
  }

  public function eventCount()
  {
    return $this->getEventCount();
  }
}
