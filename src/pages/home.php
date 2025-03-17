<?php
$title = 'Home';
?>

<?php ob_start(); ?>
<script defer src="<?= APP_URL ?>/assets/js/home.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="home-page">
  <section class="hero-container">
    <img class="hero-img" src="<?= APP_URL ?>/assets/images/hero-page-img.png" alt="hero image">
    <h1 class="hero-title">MADE FOR THOSE WHO DO</h1>
    <div class="search-bar">
      <div class="input-container">
        <h6>Looking for</h6>
        <input type="text" class="app-text-input" placeholder="Choose event type">
      </div>
      <button class="app-button primary search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
  </section>
  <section class="event-container">
    <div class="event-header">
      <span class="event-title">
        <h1>Upcoming</h1>
        <h1>Event</h1>
      </span>
    </div>
    <div id="event-card-container">
    </div>
    <button class="app-button primary load-button">Load more</button>
  </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php include "../components/layout/landing.php"; ?>