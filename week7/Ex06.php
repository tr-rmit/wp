<?php
  ini_set('display_errors', 1); 
  error_reporting(E_ALL);
  $simpleArray = [1,2,3,4,5,6,7,8,9];
  $assocArray = [
    'Alison' => 20,
    'Roxi'  => 37,
    'Pippin' => 43
  ];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ex06</title>
</head>
<body>
  <h1>EX06</h1>
  <p><?= $simpleArray[9] ?></p>
  <ul>
<?php 
    $length = count($simpleArray);
    for ($i=0; $i<$length; ++$i) {
      echo "    <li> $i => $simpleArray[$i] </li>\n";
    }
  ?>  </ul>
  <ul><?php 
    foreach ($assocArray as $name => $age) {
      echo "<li> $name => $age </li>";
    }
  ?></ul>
</body>
</html>