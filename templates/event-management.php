<?php
$title = 'Event Management';
?>

<?php ob_start(); ?>
<script defer src="../public/assets/js/event-management.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="event-management-page">
  <!-- Header -->
  <div class="event-header">
    <h1>Event Management</h1>
    <button type="button" class="app-button primary add-button" data-bs-toggle="modal" data-bs-target="#formModal">
      <i class="fa-solid fa-plus"></i>
      <div class="add-button-name">Add Event</div>
    </button>
  </div>

  <!-- Search bar -->
  <div class="search-bar">
    <input class="app-text-input" type="text" placeholder="Search for events">
    <div class="filter-container">
      <select class="app-select event-date-picker" name="filter" id="filter">
        <option value="all">All</option>
        <option value="upcoming">Upcoming</option>
        <option value="past">Past</option>
      </select>
      <button class="app-button outline-primary search-button">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div>Search</div>
      </button>
    </div>
  </div>

  <h1 class="title">Event List</h1>

  <!-- Event table -->
  <table id="eventTable" class="table app-table" style="width:100%">
    <thead>
      <tr>
        <th>Event</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Event:</div>
            <div>BestSelller Book Bootcamp -write, Market & Publish Your Book -Lucknow</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">Start date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-content-container">
            <div class="card-content-title">End date: </div>
            <div>Saturdat, March 18, 9.30PM</div>
          </div>
        </td>
        <td>
          <div class="card-action-container">
            <button><i class="fa-solid fa-pen"></i></button>
            <div class="card-divider"></div>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="table-action-container">
            <button type="button" class="app-button sm outline-primary" data-bs-toggle="modal" data-bs-target="#formModal">Edit</button>
            <button type="button" class="app-button sm outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Delete</button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- Event form modal -->
  <div class="modal fade app-modal" id="formModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="POST" class="app-form">
            <div class="form-item">
              <label class="form-item-label">Event name</label>
              <input class="app-text-input" type="text">
            </div>
            <div class="form-item">
              <label class="form-item-label">Description</label>
              <textarea class="app-text-area"></textarea>
            </div>
            <div class="form-item">
              <label class="form-item-label">Start date</label>
              <input class="app-text-input" type="text">
            </div>
            <div class="form-item">
              <label class="form-item-label">End date</label>
              <input class="app-text-input" type="text">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="app-button outline-primary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="app-button primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete event modal -->
  <div class="modal fade app-modal confirm" id="confirmDeleteModal" tabindex="-1">
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
          <button type="button" class="app-button danger">Delete</button>
        </div>
      </div>
    </div>
  </div>

</div>
<?php $content = ob_get_clean(); ?>

<?php include '../includes/dashboard-layout.php'; ?>