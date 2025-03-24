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
  $adminPages = array("event-management", "user-management");

  // if match with page path
  if (file_exists($pagePath)) {
    if (in_array($url[0], $adminPages) && (!isset($_SESSION["userId"]) || !$_SESSION["isAdmin"])) {
      header("Location: ../public/home");
    }
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
