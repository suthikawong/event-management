<?php
$title = 'Not Found';
?>

<?php ob_start(); ?>
<h1>Page not found</h1>
<?php $content = ob_get_clean(); ?>

<?php include '../components/layout/auth.php'; ?>