<?php
$title = 'Signup';
?>

<?php ob_start(); ?>
<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/assets/css/pages/signup.css">
<script defer src="<?= PUBLIC_PATH ?>/assets/js/signup.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="signup-page">
  <div class="overlay"></div>
  <div class="signup-form-container">
    <h1>Signup</h1>
    <form method="POST" id="signup-form" class="app-form">
      <div class="input-form">
        <div class="form-item">
          <label class="form-item-label">First Name</label>
          <input type="text" name="firstName" class="app-text-input">
        </div>
        <div class="form-item">
          <label class="form-item-label">Last Name</label>
          <input type="text" name="lastName" class="app-text-input">
        </div>
        <div class="form-item">
          <label class="form-item-label">Email</label>
          <input type="text" name="email" class="app-text-input">
        </div>
        <div class="form-item">
          <label class="form-item-label">Username</label>
          <input type="text" name="username" class="app-text-input">
        </div>
        <div class="form-item">
          <label class="form-item-label">Password</label>
          <input type="password" name="password" class="app-text-input">
        </div>
        <div class="form-item">
          <label class="form-item-label">Confirm Password</label>
          <input type="password" name="confirmPassword" class="app-text-input">
        </div>
      </div>
      <div id="error-message"></div>
      <button type="submit" name="submit" class="app-button primary submit-button">Sign Up</button>
    </form>
    <div class="login-text">Already have an account? <a>Log In</a></div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include '../components/layout/auth.php'; ?>