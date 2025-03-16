<?php
$title = 'Events';
?>

<?php ob_start(); ?>
<div class="events-page">
  <section>
    <div class="search-bar">
      <div class="input-container">
        <h6>Looking for</h6>
        <input type="text" class="app-text-input" placeholder="Choose event type">
      </div>
      <button class="app-button search-button"><i class="fa fa-search search-icon"></i></button>
    </div>
  </section>
  <section class="event-container">
    <div class="event-header">
      <span class="event-title">
        <h1>Event</h1>
        <h1>List</h1>
      </span>
    </div>
    <div class="event-card-container">
      <div class="event-card">
        <img class="event-img" src="<?= APP_URL ?>/assets/images/event-img.jpg" alt="event image">
        <div class="event-name">BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
        <div class="event-date">Saturdat, March 18, 9.30PM</div>
        <div class="event-where">ONLINE EVENT - Attend anywhere</div>
      </div>
      <div class="event-card">
        <img class="event-img" src="<?= APP_URL ?>/assets/images/event-img.jpg" alt="event image">
        <div class="event-name">BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
        <div class="event-date">Saturdat, March 18, 9.30PM</div>
        <div class="event-where">ONLINE EVENT - Attend anywhere</div>
      </div>
      <div class="event-card">
        <img class="event-img" src="<?= APP_URL ?>/assets/images/event-img.jpg" alt="event image">
        <div class="event-name">BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
        <div class="event-date">Saturdat, March 18, 9.30PM</div>
        <div class="event-where">ONLINE EVENT - Attend anywhere</div>
      </div>
      <div class="event-card">
        <img class="event-img" src="<?= APP_URL ?>/assets/images/event-img.jpg" alt="event image">
        <div class="event-name">BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
        <div class="event-date">Saturdat, March 18, 9.30PM</div>
        <div class="event-where">ONLINE EVENT - Attend anywhere</div>
      </div>
      <div class="event-card">
        <img class="event-img" src="<?= APP_URL ?>/assets/images/event-img.jpg" alt="event image">
        <div class="event-name">BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
        <div class="event-date">Saturdat, March 18, 9.30PM</div>
        <div class="event-where">ONLINE EVENT - Attend anywhere</div>
      </div>
    </div>
    <button class="app-button load-button">Load more</button>
  </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php include '../includes/layout.php'; ?>