<?php

include "../db.php";
include "../models/event.model.php";
include "../controllers/home.controller.php";
$home = new HomeController();

if ($_GET['action'] === "fetchData") {
  try {
    $events = $home->loadMoreEvents($_GET['limit']);
    $total = $home->eventCount();

    echo json_encode([
      "statusCode" => 200,
      "events" => $events,
      "total" => $total
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
