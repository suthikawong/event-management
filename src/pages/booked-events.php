<?php
$title = 'Booked Events';
?>

<?php ob_start(); ?>
<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/assets/css/pages/booked-events.css">
<script defer src="<?= PUBLIC_PATH ?>/assets/js/booked-events.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="booked-events-page">
  <section class="event-container">
    <div class="event-header">
      <span class="event-title">
        <h1>Booked</h1>
        <h1>Event</h1>
      </span>
    </div>
    <div id="event-card-container">
    </div>
  </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php include "../components/layout/landing.php"; ?>