<?php

class BookingController extends Event
{
  public function sendEmail()
  {
    $fromEmail = FROM_EMAIL;
    $toEmail = TO_EMAIL;
    $subject = "Test Email";
    $message = "This is a test email";
    $headers = "From: $fromEmail";

    if (mail($toEmail, $subject, $message, $headers)) {
      return true;
    } else {
      return false;
    }
  }
}
