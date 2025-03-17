<?php
require '../config.php';

function splitUrl()
{
  $url = $_GET['url'] ?? 'home';
  return explode('/', trim($url, "/"));
}

function loadController()
{
  $url = splitUrl();
  $filename = "../pages/" . $url[0] . ".php";
  // if path match controller name
  if (file_exists($filename)) {
    require $filename;
  }
  // if path not match any controller then show 404 page
  else {
    require "../pages/404.php";
  }
}

loadController();
