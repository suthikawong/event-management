<?php
$title = 'Home';
?>

<?php ob_start(); ?>
<h3>Home</h3>
<div>HTML goes here...</div>
<div>More HTML...</div>
<?php $content = ob_get_clean(); ?>

<?php include '../includes/layout.php'; ?>