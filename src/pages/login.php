<?php
$title = 'Login';
?>

<?php ob_start(); ?>
<div class="login-page">
  <img class="login-image" src="<?= APP_URL ?>/assets/images/login-bg.jpg" alt="event image">
  <div class="login-form-container">
    <h1>Login</h1>
    <form action="POST" class="app-form">
      <div class="form-item">
        <label class="form-item-label">Email</label>
        <input type="text" class="app-text-input" placeholder="Email">
      </div>
      <div class="form-item">
        <label class="form-item-label">Password</label>
        <input type="password" class="app-text-input" placeholder="Password">
      </div>
    </form>
    <button type="submit" class="app-button primary">Sign In</button>
  </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php include '../components/layout/auth.php'; ?>