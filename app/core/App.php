<?php

class App
{
  private function splitUrl()
  {
    $url = $_GET['url'] ?? 'home';
    return explode('/', $url);
  }

  public function loadController()
  {
    $url = $this->splitUrl();
    $filename = "../app/controllers/" . ucfirst($url[0]) . ".php";
    if (file_exists($filename)) {
      require $filename;
    } else {
      require "../app/controllers/_404.php";
    }
  }
}
