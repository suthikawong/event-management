<?php
$title = 'Login';
?>

<?php ob_start(); ?>
<script defer src="<?= PUBLIC_PATH ?>/assets/js/login.js"></script>
<?php $jsFiles = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="login-page">
  <div class="overlay"></div>
  <div class="login-form-container">
    <h1>Login</h1>
    <form method="POST" id="login-form" class="app-form">
      <div class="form-item">
        <label class="form-item-label">Username</label>
        <input type="text" name="username" class="app-text-input">
      </div>
      <div class="form-item">
        <label class="form-item-label">Password</label>
        <input type="password" name="password" class="app-text-input">
      </div>
      <div id="error-message"></div>
      <button type="submit" name="submit" class="app-button primary submit-button">Sign In</button>
    </form>
    <div class="signup-text">Don't have an account? <a>Sign Up</a></div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include '../components/layout/auth.php'; ?>