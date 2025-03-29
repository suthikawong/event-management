<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=\, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/assets/css/styles.css">
  <link rel="stylesheet" href="<?= PUBLIC_PATH ?>/assets/css/layout/dashboard.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css"> -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script defer src="https://kit.fontawesome.com/0acac55abd.js" crossorigin="anonymous"></script>
  <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script defer src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script defer src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
  <script defer type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script defer src="<?= PUBLIC_PATH ?>/assets/js/components/sidebar.js"></script>
  <script defer src="<?= PUBLIC_PATH ?>/assets/js/components/table.js"></script>
  <script defer type="text/javascript">
    var publicPath = "<?= PUBLIC_PATH ?>";
    var uploadsPath = "<?= UPLOADS_PATH ?>";
  </script>

  <?php echo $jsFiles; ?>
</head>

<body>
  <div id='page-container'>
    <?php require '../components/sidebar.php'; ?>
    <main id='main-container'>
      <?php
      echo $content;
      ?>
    </main>
  </div>
  <?php include '../components/toast.php'; ?>
</body>

</html>