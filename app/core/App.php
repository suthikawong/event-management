<?php

class App
{
  private $controller = 'Home';
  private $method = 'index';

  private function splitUrl()
  {
    $url = $_GET['url'] ?? 'home';
    return explode('/', trim($url, "/"));
  }

  public function loadController()
  {
    $url = $this->splitUrl();
    $filename = "../app/controllers/" . ucfirst($url[0]) . ".php";
    // if path match controller name
    if (file_exists($filename)) {
      require $filename;
      $this->controller = ucfirst($url[0]);
    }
    // if path not match any controller then show 404 page
    else {
      require "../app/controllers/_404.php";
      $this->controller = "_404";
    }
    // init controller
    $controller = new $this->controller;
    // call method in controller and sending parameters
    call_user_func_array([$controller, $this->method], []);
  }
}
