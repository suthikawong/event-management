<?php

class Home extends Controller
{
  public function index($a = '')
  {
    $eventModel = new Event;
    $result = $eventModel->getEvents();
    echo "This is the home controller";
    show($result);
    $this->view('home');
  }
}
