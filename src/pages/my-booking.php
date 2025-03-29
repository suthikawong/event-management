<?php
$title = 'My Booking';
?>

<?php ob_start(); ?>
<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/assets/css/pages/my-booking.css">
<script defer src="<?= PUBLIC_PATH ?>/assets/js/my-booking.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="my-booking-page">
  <section class="event-container">
    <div class="event-header">
      <span class="event-title">
        <h1>My</h1>
        <h1>Booking</h1>
      </span>
    </div>
    <div id="event-card-container">
    </div>
  </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php include "../components/layout/landing.php"; ?>