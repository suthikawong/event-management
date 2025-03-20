<?php

if ($_GET['action'] === 'login') {
  // get form data
  $username = $_POST["username"];
  $password = $_POST["password"];

  // init controller
  include "../db.php";
  include "../models/user.model.php";
  include "../controllers/login.controller.php";

  try {
    $login = new LoginController($username, $password);
    $login->login();
    $user = $login->getUserByUserId($_SESSION["userId"]);
    echo json_encode([
      "statusCode" => 200,
      "message" => "Login sucessfully",
      "user" => $user
    ]);
  } catch (Exception $e) {
    if ($e->getCode()) {
      echo json_encode([
        "statusCode" => $e->getCode(),
        "message" => $e->getMessage()
      ]);
    } else {
      echo json_encode([
        "statusCode" => 500,
        "message" => "Something went wrong. Please try again."
      ]);
    }
  }
}
