<?php
  $name = 'Trevor';
  $title = 'Hello';  
  // if (somethingwentwrong) exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>
<body>
  <h1><?= $title ?></h1>
  <p>Welcome <?= $name ?>.</p>
</body>
</html>