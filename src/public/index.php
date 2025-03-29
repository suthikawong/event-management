<?php
require '../config.php';
session_start();

function splitUrl()
{
  $url = $_GET['url'] ?? 'home';
  return explode('/', trim($url, "/"));
}

function getInternalFilePath($url)
{
  $shiftUrl = array_slice($url, count($url) - 2);
  return "../" . implode('/', $shiftUrl);
}

function loadController()
{
  $url = splitUrl();
  $pagePath = "../pages/" . $_GET['url'] . ".php";
  $internalFilepath = getInternalFilePath($url);
  $adminPages = array("event-management", "user-management");
  $loginPages = array("my-booking");

  // if match with page path
  if (file_exists($pagePath)) {
    if (in_array($url[0], $adminPages) && (!isset($_SESSION["userId"]) || !$_SESSION["isAdmin"])) {
      header("Location: ../public/home");
    } else if (in_array($url[0], $loginPages) && (!isset($_SESSION["userId"]))) {
      header("Location: ../public/home");
    }
    require $pagePath;
  }
  // if match home path with event id
  else if ($url[0] == "home" && count($url) === 2) {
    require "../pages/event.php";
  }
  // if match with other path
  else if (file_exists($internalFilepath)) {
    require $internalFilepath;
  }
  // if path not match any controller then show 404 page
  else {
    require "../pages/404.php";
  }
}

loadController();
