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
  $filename = explode('.', $url[0]);
  $filepath = "../pages/" . $url[0] . ".php";

  // fix redirect to <filename>.inc.php
  if (count($filename) > 1 && $filename[1] == 'inc') {
    require "../includes/" . $url[0];
  }
  // fix redirect to components/*
  else if (count($url) > 1 && $url[0] === 'components' && file_exists("../" . join('/', $url))) {
    require "../" . join('/', $url);
  }
  // if path match controller name
  else if (file_exists($filepath)) {
    require $filepath;
  }
  // if path not match any controller then show 404 page
  else {
    require "../pages/404.php";
  }
}

loadController();
