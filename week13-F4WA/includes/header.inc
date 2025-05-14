<?php include_once('includes/db_connect.inc'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>COUNTRIESRUS | <?= $title ?></title>
  <meta charset=utf-8>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="<?= strtolower(str_replace(' ','',$title)) ?>page">
    <header>
      <h1>🌎🌍🌏 Countries 'R Us</h1>
<?php include('includes/nav.inc'); ?>
    </header>