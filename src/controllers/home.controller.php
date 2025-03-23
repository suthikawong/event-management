<?php

class HomeController extends Event
{
  public function loadMoreEvents($keyword = '', $limit = null, $offset = null)
  {
    return $this->get($keyword, $limit, $offset);
  }

  public function eventCount()
  {
    return $this->getCount();
  }
}
