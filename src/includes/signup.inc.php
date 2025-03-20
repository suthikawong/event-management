<?php


if ($_GET['action'] === 'insertData') {
  // get form data
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];
  $email = $_POST["email"];
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];

  // init controller
  include "../db.php";
  include "../models/user.model.php";
  include "../controllers/signup.controller.php";

  try {
    $signup = new SignupController($username, $password, $confirmPassword, $email, $firstName, $lastName);
    $signup->signupUser();
    echo json_encode([
      "statusCode" => 200,
      "message" => "Create user sucessfully"
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
