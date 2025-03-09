<?php
$title = 'About';
?>

<?php ob_start(); ?>
<h3>About</h3>
<div>HTML goes here...</div>
<div>More HTML...</div>
<?php $content = ob_get_clean(); ?>

<?php include '../includes/layout.php'; ?>