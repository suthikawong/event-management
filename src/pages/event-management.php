<?php
$title = 'Event Management';
?>

<?php ob_start(); ?>
<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/assets/css/pages/event-management.css">
<script defer src="<?= PUBLIC_PATH ?>/assets/js/event-management.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="event-management-page">
  <!-- Header -->
  <div class="event-header">
    <h1>Event Management</h1>
    <button type="button" class="app-button primary add-button">
      <i class="fa-solid fa-plus"></i>
      <div class="add-button-name">Add Event</div>
    </button>
  </div>

  <!-- Search bar -->
  <div class="search-bar">
    <input id="search-keyword" class="app-text-input" type="text" placeholder="Search for event and location">
    <div class="filter-container">
      <!-- <select class="app-select event-date-picker" name="filter" id="filter">
        <option value="all">All</option>
        <option value="upcoming">Upcoming</option>
        <option value="past">Past</option>
      </select> -->
      <button class="app-button outline-primary search-button">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div>Search</div>
      </button>
    </div>
  </div>

  <h1 class="title">Event List</h1>

  <!-- Event table -->
  <table id="event-table" class="table app-table">
    <thead>
      <tr>
        <th></th>
        <th>Event</th>
        <th>Date</th>
        <th>Category</th>
        <th>Location</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <!-- Event form modal -->
  <div class="modal fade app-modal" id="form-modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="POST" class="app-form" id="event-form">
            <input type="hidden" name="id">
            <div class="form-item">
              <div class="image-uploader">
                <div class="uploader-container">
                  <input name="imageName" type="hidden">
                  <input name="image" type="file" accept="image/*" class="image app-image-uploader">
                  <i class="fa-solid fa-cloud-arrow-up"></i>
                  <span>Drag & Drop your image or Browse</span>
                </div>
                <div class="preview-image-container">
                  <img class="preview-image" src="<?= PUBLIC_PATH ?>/assets/images/default-img.png" alt="event image">
                  <a>Delete</a>
                </div>
              </div>
            </div>
            <div class="form-item required">
              <label class="form-item-label">Event</label>
              <input class="app-text-input" name="event" type="text">
            </div>
            <div class="form-item">
              <label class="form-item-label">Description</label>
              <textarea class="app-text-area" name="description"></textarea>
            </div>
            <div class="form-item required">
              <label class="form-item-label">Date</label>
              <!-- <input type="text" name="duration" class="app-date-picker" /> -->
              <input type="text" name="date" class="app-date-picker" />
            </div>
            <div class="form-item required">
              <label class="form-item-label">Category</label>
              <input class="app-text-input" name="category" type="text">
            </div>
            <div class="form-item required">
              <label class="form-item-label">Location</label>
              <input class="app-text-input" name="location" type="text">
            </div>
            <div id="error-message"></div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="app-button outline-primary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="app-button primary submit-button">Save</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete event modal -->
  <div class="modal fade app-modal confirm" id="delete-modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Delete Confirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this event</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="app-button outline-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="app-button danger delete-button">Delete</button>
        </div>
      </div>
    </div>
  </div>

</div>
<?php $content = ob_get_clean(); ?>

<?php include '../components/layout/dashboard.php'; ?>