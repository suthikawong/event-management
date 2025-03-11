<?php
$title = 'Dashboard';
?>

<?php ob_start(); ?>
<div class="dashboard-page">
  <section>
    <div>Dashboard</div>
  </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php include '../includes/dashboard-layout.php'; ?>