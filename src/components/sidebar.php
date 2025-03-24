<?php

$abbreviation = strtoupper($_SESSION["firstName"][0]) . strtoupper($_SESSION["lastName"][0]);
$fullname = $_SESSION["firstName"] . " " . $_SESSION["lastName"];
$role = 'User';
if ($_SESSION["isAdmin"]) {
  $role = 'Administrator';
}
?>

<div class="app-sidebar">
  <div class="desktop-sidebar-container">
    <div class="menu-header-container">
      <div class="profile-container">
        <div class="profile-img"><?= $abbreviation ?></div>
        <div>
          <div class="profile-name"><?= $fullname ?></div>
          <div class="profile-role"><?= $role ?></div>
        </div>
      </div>
    </div>
    <div class="body-container">
      <div class="menu-list">
        <div class="menu-item">
          <a href="../public/event-management">
            <i class="fa-solid fa-calendar"></i>
            Event Management
          </a>
        </div>
        <div class="menu-item">
          <a href="../public/user-management">
            <i class="fa-solid fa-user"></i>
            User Management
          </a>
        </div>
      </div>
    </div>
    <div class="divider"></div>
    <div class="menu-item">
      <a class="logout-button">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <div>Logout</div>
      </a>
    </div>
  </div>
  <div class="mobile-sidebar-container">
    <button class="ham-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu">
      <i class="fa fa-bars"></i>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu">
      <div class="offcanvas-header">
        <div class="menu-header-container">
          <div class="profile-container">
            <div class="profile-img"><?= $abbreviation ?></div>
            <div>
              <div class="profile-name"><?= $fullname ?></div>
              <div class="profile-role"><?= $role ?></div>
            </div>
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
      </div>
      <div class="offcanvas-body">
        <div class="body-container">
          <div class="menu-list">
            <div class="menu-item">
              <a href="../public/event-management">
                <i class="fa-solid fa-calendar"></i>
                Event Management
              </a>
            </div>
            <div class="menu-item">
              <a href="../public/user-management">
                <i class="fa-solid fa-user"></i>
                User Management
              </a>
            </div>
          </div>
        </div>
        <div class="divider"></div>
        <div class="menu-item">
          <a class="logout-button">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <div>Logout</div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>