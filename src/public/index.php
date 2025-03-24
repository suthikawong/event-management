<?php
require '../config.php';
session_start();

function splitUrl()
{
  $url = $_GET['url'] ?? 'home';
  return explode('/', trim($url, "/"));
}

function loadController()
{
  $url = splitUrl();
  $pagePath = "../pages/" . $url[0] . ".php";
  $filepath = "../" . $_GET['url'];

  // if match with page path
  if (file_exists($pagePath)) {
    require $pagePath;
  }
  // if match with other path
  else if (file_exists($filepath)) {
    require $filepath;
  }
  // if path not match any controller then show 404 page
  else {
    require "../pages/404.php";
  }
}

loadController();
