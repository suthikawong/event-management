<?php
$title = 'Signup';
?>

<?php ob_start(); ?>
<div class="signup-page">
  <div class="overlay"></div>
  <div class="signup-form-container">
    <h1>Signup</h1>
    <form action="includes/signup.inc.php" method="POST" class="app-form">
      <div class="input-form">
        <div class="form-item">
          <label class="form-item-label">First Name</label>
          <input type="text" name="firstname" class="app-text-input">
        </div>
        <div class="form-item">
          <label class="form-item-label">Last Name</label>
          <input type="text" name="lastname" class="app-text-input">
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
      <button type="submit" name="submit" class="app-button primary submit-button">Sign In</button>
    </form>
  </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include '../components/layout/auth.php'; ?>