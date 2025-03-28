<?php

// init controller
include "../db.php";
include "../models/booking.model.php";
include "../controllers/booking.controller.php";

if ($_GET['action'] === 'fetchBookingByUserId') {
  try {
    $userId = $_SESSION["userId"];
    $manager = new BookingController();
    $data = $manager->getBooking($userId);

    echo json_encode([
      "statusCode" => 200,
      "message" => "Sent email successfully",
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
