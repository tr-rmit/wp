<?php include('includes/db_connect.inc'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>COUNTRIESRUS | <?= $title ?></title>
  <meta charset=utf-8>
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="<?= strtolower(str_replace(' ','',$title)) ?>page">
    <header>
      <h1>🌎🌍🌏 Countries 'R Us</h1>
<?php include('includes/nav.inc'); ?>
    </header>