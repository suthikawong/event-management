<nav>
  <div class="desktop-nav-container">
    <h1>Logo</h1>
    <div class="menu-container">
      <ul class="menu-list">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
      <div class="profile-container">
        <img class="profile-img" src="../public/assets/images/profile.png" alt="profile" class="profile">
        <div class="profile-name">Sophia Rose</div>
      </div>
    </div>
  </div>
  <div class="mobile-nav-container">
    <button class="ham-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu">
      <i class="fa fa-bars"></i>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu">
      <div class="offcanvas-header">
        <div class="menu-header-container">
          <!-- <h5 class="offcanvas-title" id="sideMenuLabel">Offcanvas</h5> -->
          <div class="profile-container">
            <img class="profile-img" src="../public/assets/images/profile.png" alt="profile" class="profile">
            <div class="profile-name">Sophia Rose</div>
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
      </div>
      <div class="divider"></div>
      <div class="offcanvas-body">
        <ul class="menu-list">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>