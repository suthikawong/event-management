<nav class="app-navbar">
  <div class="desktop-nav-container">
    <div class="menu-container">
      <h1>Logo</h1>
      <div class="menu-list">
        <div class="menu-item"><a href="#">Home</a></div>
      </div>
    </div>
    <div class="profile-container">
      <div class="profile-img">SR</div>
      <div class="profile-name">Sophia Rose</div>
    </div>
  </div>
  <div class="mobile-nav-container">
    <button class="ham-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu">
      <i class="fa fa-bars"></i>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu">
      <div class="offcanvas-header">
        <div class="menu-header-container">
          <div class="profile-container">
            <div class="profile-img">SR</div>
            <div>
              <div class="profile-name">Sophia Rose</div>
              <div class="profile-role">Administrator</div>
            </div>
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
      </div>
      <div class="offcanvas-body">
        <div class="body-container">
          <div class="menu-list">
            <div class="menu-item">
              <a href="#">
                <i class="fa-solid fa-house"></i>
                <div>Home</div>
              </a>
            </div>
          </div>
        </div>
        <div class="divider"></div>
        <div class="menu-item">
          <a href="#">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <div>Logout</div>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>