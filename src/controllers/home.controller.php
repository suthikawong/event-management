<?php

class HomeController extends Event
{
  public function loadMoreEvents($keyword = '', $startDate = null, $endDate = null, $limit = null, $offset = null)
  {
    return $this->get($keyword, $startDate, $endDate, $limit, $offset);
  }

  public function eventCount()
  {
    return $this->getCount();
  }
}
