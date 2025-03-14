<?php
$title = 'Event Management';
?>

<?php ob_start(); ?>
<script defer src="../public/assets/js/event-management.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>

<?php $searchButton = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="event-management-page">
  <h1>Dashboard</h1>
  <div class="search-bar">
    <input class="app-text-input" type="text" placeholder="Search for events">
    <div class="filter-container">
      <select class="app-select event-date-picker" name="filter" id="filter">
        <option value="all">All</option>
        <option value="upcoming">Upcoming</option>
        <option value="past">Past</option>
      </select>
      <button class="app-button primary search-button">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div>Search</div>
      </button>
    </div>
  </div>
  <table id="eventTable" class="table app-table" style="width:100%">
    <thead>
      <tr>
        <th>Event</th>
        <th>Start Date</th>
        <th>End Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
      <tr>
        <td>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</td>
        <td>Saturdat, March 18, 9.30PM</td>
        <td>Saturdat, March 18, 9.30PM</td>
      </tr>
    </tbody>
  </table>

</div>
<?php $content = ob_get_clean(); ?>

<?php include '../includes/dashboard-layout.php'; ?>