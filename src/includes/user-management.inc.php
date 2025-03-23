<?php

// init controller
include "../db.php";
include "../models/user.model.php";
include "../controllers/user-management.controller.php";

if ($_GET['action'] === 'fetchData') {
  try {
    $limit = $_GET['length'];
    $offset = $_GET['start'];
    $keyword = $_GET['keyword'];

    $manager = new UserManagementController();
    $result = $manager->getUsers($keyword, (int) $limit, (int) $offset);

    header('Content-Type: application/json');
    echo json_encode([
      "statusCode" => 200,
      "message" => "Fetch users sucessfully",
      "data" => $result["data"],
      "recordsTotal" => $result["total"],
      "recordsFiltered" => $result["total"],
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

if ($_GET['action'] === 'fetchById') {
  try {
    $userId = $_GET["id"];
    $manager = new UserManagementController();
    $data = $manager->getUserById((int) $userId);

    echo json_encode([
      "statusCode" => 200,
      "message" => "Fetch user sucessfully",
      "data" => $data,
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

if ($_GET['action'] === 'insertData') {
  try {
    // get form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $isAdmin = $_POST["isAdmin"];

    $manager = new UserManagementController();
    $manager->insertUser($username, $email, $firstName, $lastName, filter_var($isAdmin, FILTER_VALIDATE_BOOLEAN));

    echo json_encode([
      "statusCode" => 200,
      "message" => "Insert user sucessfully"
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


if ($_GET['action'] === 'updateData') {
  try {
    // get form data
    $userId = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $isAdmin = $_POST["isAdmin"];

    $manager = new UserManagementController();
    $manager->updateUser((int) $userId, $username, $email, $firstName, $lastName, filter_var($isAdmin, FILTER_VALIDATE_BOOLEAN));

    echo json_encode([
      "statusCode" => 200,
      "message" => "Update user sucessfully"
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


if ($_GET['action'] === 'deleteData') {
  try {
    // get user id
    $id = $_POST["id"];

    $manager = new UserManagementController();
    $manager->deleteUser((int) $id);

    echo json_encode([
      "statusCode" => 200,
      "message" => "Delete user sucessfully"
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
