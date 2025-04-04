<?php

include "../db.php";
include "../models/event.model.php";
include "../controllers/home.controller.php";

if ($_GET['action'] === "fetchData") {
  try {
    $limit = $_GET['length'];
    $offset = $_GET['start'];
    $keyword = $_GET['keyword'];
    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;

    $home = new HomeController();
    $result = $home->loadMoreEvents($keyword, $startDate, $endDate, (int) $limit, (int) $offset);

    header('Content-Type: application/json');
    echo json_encode([
      "statusCode" => 200,
      "message" => "Fetch events sucessfully",
      "data" => $result["data"],
      "recordsTotal" => $result["total"],
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
