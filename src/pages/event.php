<?php
$title = 'Event';
?>

<?php ob_start(); ?>
<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/assets/css/pages/event.css">
<script defer src="<?= PUBLIC_PATH ?>/assets/js/event.js"></script>
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="event-page">
  <section class="image-container">
    <img class="event-img" src="<?= PUBLIC_PATH ?>/assets/images/default-img-large.png" alt="event image">
    <div class="event-img-content">
      <button class="app-button primary back-button desktop">
        <i class="fa-solid fa-chevron-left"></i>
        <div>Back</div>
      </button>
    </div>
  </section>
  <section class="event-container">
    <button class="app-button primary back-button mobile">
      <i class="fa-solid fa-chevron-left"></i>
      <div>Back</div>
    </button>
    <h2 class="event-title"></h2>
    <h3 class="event-desc">Description</h3>
    <div class="event-desc-content"></div>
    <h3 class="event-datetime">Date & Time</h3>
    <div class="event-datetime-content">
      <div>Date: <span></span></div>
      <div>Time: <span></span></div>
    </div>
    <h3 class="event-category">Category</h3>
    <div class="event-category-content"></div>
    <h3 class="event-location">Event location</h3>
    <div class="event-location-content"></div>
    <div class="button-container">
      <button class="app-button outline-primary view-button">View QR Code</button>
      <button class="app-button primary booking-button">Book now</button>
    </div>
  </section>

  <!-- Booking event successfully modal -->
  <div class="modal fade app-modal confirm" id="success-modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <i class="fa-solid fa-circle-check success-icon"></i>
          <div class="content">
            <h2>Thank you!</h2>
            <p>Event detail has been successfully sent to your email.</p>
          </div>
          <button type="button" class="app-button close-button">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Booking event failed modal -->
  <div class="modal fade app-modal confirm" id="failed-modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <i class="fa-solid fa-circle-xmark failed-icon"></i>
          <div class="content">
            <h2>Error</h2>
            <p>Send email failed. Please try again.</p>
          </div>
          <button type="button" class="app-button close-button">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- View QR Code modal -->
  <div class="modal fade app-modal confirm" id="ticket-modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          <div class="content">
            <h2>Scan QR Code</h2>
            <p>Scan this code to verify your booking</p>
            <div id="qrcode"></div>
          </div>
          <div class="divider-with-text">
            <div class="divider"></div>
            <div class="text">or enter the code manually</div>
            <div class="divider"></div>
          </div>
          <div class="link-container">
            <input class="app-text-input" name="qrcode-link" type="text">
            <button class="app-button outline copy-button"><i class="fa-regular fa-copy"></i></button>
          </div>
          <button type="button" class="app-button primary close-button">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php include "../components/layout/landing.php"; ?>