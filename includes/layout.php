<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=\, initial-scale=1.0">
  <title><?php echo $title; ?></title>
</head>

<body>
  <?php require '../includes/header.php'; ?>
  <?php require '../includes/nav.php'; ?>
  <main>
    <?php
    echo $content;
    ?>
  </main>
  <?php require '../includes/footer.php'; ?>
</body>

</html>