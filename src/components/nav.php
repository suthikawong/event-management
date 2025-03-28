<?php

if (isset($_SESSION["userId"])) {
  $abbreviation = strtoupper($_SESSION["firstName"][0]) . strtoupper($_SESSION["lastName"][0]);
  $fullname = $_SESSION["firstName"] . " " . $_SESSION["lastName"];
  $role = 'User';
  if ($_SESSION["isAdmin"]) {
    $role = 'Administrator';
  }
}
?>

<nav class="app-navbar">
  <div class="desktop-nav-container">
    <div class="menu-container">
      <h1>Logo</h1>
      <div class="menu-list">
        <div class="menu-item"><a href="<?= PUBLIC_PATH ?>/home">Home</a></div>
        <?php if (isset($_SESSION["userId"])) { ?>
          <div class="menu-item"><a href="<?= PUBLIC_PATH ?>/booked-events">Booked Events</a></div>
        <?php } ?>
      </div>
    </div>
    <?php
    if (isset($_SESSION["userId"])) {
    ?>
      <div class="right-container">
        <div class="profile-container">
          <div class="profile-img"><?= $abbreviation ?></div>
          <div>
            <div class="profile-name"><?= $fullname ?></div>
            <div class="profile-role"><?= $role ?></div>
          </div>
        </div>
        <div id="popover-trigger-btn" tabindex="0" class="icon-container popover-dismiss" data-bs-toggle="popover">
          <i class="fa-solid fa-chevron-up"></i>
        </div>
        <div hidden>
          <div data-name="popover-content" class="popover-content">
            <div class="upper-container">
              <div class="profile-container">
                <div class="profile-img"><?= $abbreviation ?></div>
                <div>
                  <div class="profile-name"><?= $fullname ?></div>
                  <div class="profile-role"><?= $role ?></div>
                </div>
              </div>
              <div class="popover-menu-item">
                <a href="<?= PUBLIC_PATH ?>/event-management">
                  <i class="fa-solid fa-chart-simple"></i>
                  <div>Dashboard</div>
                </a>
              </div>
            </div>
            <div class="divider"></div>
            <div class="lower-container">
              <div class="popover-menu-item">
                <a class="logout-button">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  <div>Logout</div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    } else {
    ?>
      <button class="app-button primary login-button">Login</button>
    <?php
    }
    ?>
  </div>
  <div class="mobile-nav-container">
    <button class="ham-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu">
      <i class="fa fa-bars"></i>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu">

      <div class="offcanvas-header">
        <div class="menu-header-container">
          <?php
          if (isset($_SESSION["userId"])) {
          ?>
            <div class="profile-container">
              <div class="profile-img"><?= $abbreviation ?></div>
              <div>
                <div class="profile-name"><?= $fullname ?></div>
                <div class="profile-role"><?= $role ?></div>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div>LOGO</div>
          <?php } ?>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
      </div>
      <div class="offcanvas-body">
        <div class="body-container">
          <div class="menu-list">
            <div class="menu-item">
              <a href="<?= PUBLIC_PATH ?>/home">
                <i class="fa-solid fa-house"></i>
                Home
              </a>
            </div>
            <?php if (isset($_SESSION["userId"])) { ?>
              <div class="menu-item">
                <a href="<?= PUBLIC_PATH ?>/booked-events">
                  <i class="fa-solid fa-house"></i>
                  Booked Events
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="dashboard-button-container">
          <a href="<?= PUBLIC_PATH ?>/event-management">
            <div class="dashboard-button">
              <i class="fa-solid fa-chart-simple"></i>
              <div>Dashboard</div>
            </div>
          </a>
        </div>
        <div class="divider"></div>
        <div class="menu-item">
          <?php
          if (isset($_SESSION["userId"])) {
          ?>
            <a class="logout-button">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <div>Logout</div>
            </a>
          <?php
          } else {
          ?>
            <a class="login-button">
              <i class="fas fa-sign-in"></i>
              <div>Login</div>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</nav>