<?php

include "../db.php";
include "../models/event.model.php";
include "../controllers/home.controller.php";
$home = new HomeController();

if ($_GET['action'] === "fetchData") {
  $events = $home->loadMoreEvents($_GET['limit']);
  $total = $home->eventCount();
  header('Content-Type: application/json');
  ob_start();
  include "../components/event-card.php";
  $eventCardDiv = ob_get_clean();
  echo json_encode([
    'events' => $events,
    'total' => $total,
    'element' => $eventCardDiv
  ]);
}
