<?php

// init controller
include "../db.php";
include "../models/event.model.php";
include "../controllers/event-management.controller.php";
include "../controllers/booking.controller.php";

if ($_GET['action'] === 'fetchById') {
  try {
    $eventId = $_GET["id"];
    $manager = new EventManagementController();
    $data = $manager->getEventById((int) $eventId);

    echo json_encode([
      "statusCode" => 200,
      "message" => "Fetch event sucessfully",
      "data" => $data,
      "uploadPath" => UPLOADS_PATH
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

if ($_GET['action'] === 'sendEmail') {
  try {
    // $toEmail = $_GET["toEmail"];
    // $manager = new BookingController();
    // $result = $manager->sendEmail();
    $result = true;

    if ($result) {
      echo json_encode([
        "statusCode" => 200,
        "message" => "Sent email successfully"
      ]);
    } else {
      echo json_encode([
        "statusCode" => 500,
        "message" => "Sent email fail"
      ]);
    }
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
