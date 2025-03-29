<?php
$title = 'Home';
?>

<?php ob_start(); ?>
<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/assets/css/pages/home.css">
<script defer src="<?= PUBLIC_PATH ?>/assets/js/home.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="home-page">
  <section class="hero-container">
    <img class="hero-img" src="<?= PUBLIC_PATH ?>/assets/images/hero-page-img.png" alt="hero image">
    <h1 class="hero-title">MADE FOR THOSE WHO DO</h1>
    <div class="search-bar">
      <div class="input-container">
        <h6>Looking for</h6>
        <input type="text" id="search-keyword" class="app-text-input" placeholder="Search for event, category, location">
      </div>
      <div class="input-container">
        <h6>When</h6>
        <select class="app-select" name="when" id="when">
          <option value="today">Today</option>
          <option value="tomorrow">Tomorrow</option>
          <option value="7days">7 Days</option>
          <option value="30days">30 Days</option>
          <option value="all" selected="selected">All</option>
        </select>
      </div>

      <button class="app-button primary search-button">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div>Search</div>
      </button>
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