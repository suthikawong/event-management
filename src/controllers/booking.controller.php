<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

class BookingController extends Booking
{
  public function bookEvent($userId, $event)
  {
    $this->insert($userId, $event['event_id']);
    $email = $_SESSION['email'];
    return $this->sendEmail($email, $event);
  }

  public function getBooking($userId)
  {
    return $this->getBookingByUserId($userId);
  }

  private function sendEmail($toEmail, $event)
  {
    try {
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = SENDER_EMAIL;
      $mail->Password = SENDER_APP_PASSWORD;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
      $mail->setFrom(SENDER_EMAIL, SENDER_NAME);
      $mail->addAddress($toEmail);

      $eventId = $event['event_id'];
      $eventName = $event['event_name'];
      $dateTime = date_create($event['date']);
      $eventDate = date_format($dateTime, 'd/m/Y');
      $eventTime = date_format($dateTime, 'h:i A');
      $location = $event['location'];
      $publicPath = PUBLIC_PATH;

      $mail->isHTML(true);
      $html = "<p>Your booking for $eventName is confirmed! Below are your booking details:</p>
              <br>
              <p>📅 Date: $eventDate</p>
              <p>⏰ Time: $eventTime</p>
              <p>📍 Location: $location</p>
              <br>
              <p>🔍 Next Steps:</p>
              <p>View your event details and access your QR code here:</p>
              <a href='$publicPath/home/$eventId'>View Event & QR Code</a>";

      $mail->Subject = 'Your Booking Confirmation';
      $mail->Body    = $html;

      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
}
