<?php
$title = 'User Management';
?>

<?php ob_start(); ?>
<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/assets/css/pages/user-management.css">
<script defer src="<?= PUBLIC_PATH ?>/assets/js/user-management.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="user-management-page">
  <!-- Header -->
  <div class="user-header">
    <h1>User Management</h1>
    <!-- <button type="button" class="app-button primary add-button">
      <i class="fa-solid fa-plus"></i>
      <div class="add-button-name">Add User</div>
    </button> -->
  </div>

  <!-- Search bar -->
  <div class="search-bar">
    <input id="search-keyword" class="app-text-input" type="text" placeholder="Search for user">
    <div class="filter-container">
      <button class="app-button outline-primary search-button">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div>Search</div>
      </button>
    </div>
  </div>

  <h1 class="title">User List</h1>

  <!-- User table -->
  <table id="user-table" class="table app-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Permission</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <!-- User form modal -->
  <div class="modal fade app-modal" id="form-modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="POST" class="app-form" id="user-form">
            <input type="hidden" name="id">
            <div class="form-item required">
              <label class="form-item-label">Username</label>
              <input class="app-text-input" name="username" type="text">
            </div>
            <div class="form-item required">
              <label class="form-item-label">Email</label>
              <input class="app-text-input" name="email" type="text">
            </div>
            <div class="form-item required">
              <label class="form-item-label">First Name</label>
              <input class="app-text-input" name="firstName" type="text">
            </div>
            <div class="form-item required">
              <label class="form-item-label">Last Name</label>
              <input class="app-text-input" name="lastName" type="text">
            </div>
            <div class="form-item form-check">
              <input name="isAdmin" class="form-check-input" type="checkbox" value="">
              <label class="form-item-label form-check-label" for="flexCheckDefault">
                Admin Permission
              </label>
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

  <!-- Delete user modal -->
  <div class="modal fade app-modal confirm" id="delete-modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Delete Confirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this user</p>
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