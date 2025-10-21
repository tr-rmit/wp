<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries R Us | <?php echo $title; ?></title>
    
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container shadow">
    <header class="bg-primary text-white rounded">
      <h1 class="p-3">Countries R Us</h1>
  <?php include('nav.inc'); ?>  
  
<?php if (isset($_SESSION['message'])) { ?>
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong>
<?php print $_SESSION['message']; unset($_SESSION['message']); ?>
  </div>
<?php } ?>

<?php if (isset($_SESSION['error'])) { ?>
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Error!</strong>
<?php print $_SESSION['error'];  unset($_SESSION['error']); ?>
  </div>
<?php } ?>

    </header>

