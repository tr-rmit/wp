<?php
  $name = 'Trevor';
  $title = 'My Second PHP File';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>
<body>
  <h1>Hello</h1>
  <p>Hello World</p>
  <?php
    // variable
    $name = "Trevor";
    $age = 50;
    $number = 99.99;
    $isAwake = true;
    // $isAwake = "true"; <-- weakly typed languages let you do this
    // constant
    define("NAME", "Trevor");
    $name = "trev";
    echo $name;
    echo NAME;
  ?>
</body>
</html>