<?php

// init controller
include "../db.php";
include "../models/event.model.php";
include "../controllers/event-management.controller.php";

if ($_GET['action'] === 'fetchData') {
  try {
    $limit = $_GET['length'];
    $offset = $_GET['start'];
    $keyword = $_GET['keyword'];

    $manager = new EventManagementController();
    $result = $manager->getEvents($keyword, (int) $limit, (int) $offset);

    header('Content-Type: application/json');
    echo json_encode([
      "statusCode" => 200,
      "message" => "Fetch events sucessfully",
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
    $eventId = $_GET["id"];
    $manager = new EventManagementController();
    $data = $manager->getEventById((int) $eventId);

    echo json_encode([
      "statusCode" => 200,
      "message" => "Fetch event sucessfully",
      "data" => $data
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

function uploadImage()
{
  $originaImagelName = $_FILES["image"]["name"];
  if ($originaImagelName) {
    $newImageName = uniqid() . time() . "." . pathinfo($originaImagelName, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["image"]['tmp_name'], UPLOADS_PATH . '/' . $newImageName);
    return $newImageName;
  } else if (!empty($_POST["imageName"])) {
    return $_POST["imageName"];
  }
  return null;
}

if ($_GET['action'] === 'insertData') {
  try {
    // get form data
    $event = $_POST["event"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $category = $_POST["category"];
    $location = $_POST["location"];
    $image = uploadImage();

    $manager = new EventManagementController();
    $manager->insertEvent($event, $description, $image, $date, $category, $location);

    echo json_encode([
      "statusCode" => 200,
      "message" => "Insert event sucessfully"
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
    $id = $_POST["id"];
    $event = $_POST["event"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $category = $_POST["category"];
    $location = $_POST["location"];
    $image = uploadImage();

    $manager = new EventManagementController();
    $manager->updateEvent((int) $id, $event, $description, $image, $date, $category, $location);

    echo json_encode([
      "statusCode" => 200,
      "message" => "Update event sucessfully"
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
    // get event id
    $id = $_POST["id"];

    $manager = new EventManagementController();
    $manager->deleteEvent((int) $id);

    echo json_encode([
      "statusCode" => 200,
      "message" => "Delete event sucessfully"
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
