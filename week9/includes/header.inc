<?php include('includes/db_connect.inc'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Countries R Us | <?= $title ?></title> 
</head>
<body id="<?= str_replace(" ","",$title) ?>page">
  <header>
<?php include('includes/nav.inc'); ?>
  </header>