<?php
  $name = 'Trevor';
  $title = 'Arrays';
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
  <p>Indexed and Associative Arrays</p>
  <?php
    /* in javascript ..
    const arr = [1,2,3,4,5,6,7]; */

    $indexedArray = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
    // we can do this: $indexedArray = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    
    /* in javascript ...
    const obj = {
      Peter : 35,
      Ben : 37, Joe : 43
    }
    */
    
    $associativeArray = [ //array(
      "Peter" => 35, 
      "Ben" => 37, 
      "Joe" => 43
    ];  // );
    
    $length = count($indexedArray);
    for($i=0; $i<$length; $i++) {
      print($indexedArray[$i]);
    }
    echo "<br>\n";
    // in javascript we used a for ( i in arr  ) loop
    foreach ($associativeArray as $name => $age) {
      echo "Name = " . $name . ", Age = " . $age;
      echo "<br>\n";
    }
    // neater version 
    foreach ($associativeArray as $name => $age) {
      echo "Name = $name, Age = $age <br>\n";
    }

  ?>
</body>
</html>