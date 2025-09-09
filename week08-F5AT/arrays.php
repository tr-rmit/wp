<?php
// old "only way" in PHP
  $indexedArray = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
  $associativeArray = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
// then they fixed it :-)  
  $indexedArray = [1, 2, 3, 4, 5, 6, 7, 8, 9];
  $associativeArray = [
    "Peter" => 35, 
    "Ben" => 37, 
    "Joe" => 43
  ];
/*
  In Javascript:
  const associativeArray = {
    Peter : 35, 
    Ben : 37, 
    Joe : 43
  };
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arrays</title>
</head>
<body>
  <h1>Arrays</h1>
  <h2>Indexed</h2>
  <?php
    $length = count($indexedArray);
    for($i=0; $i<$length; $i++) {
      echo $indexedArray[$i] . ', ';
    }
  ?>

  <h2>Associative</h2>
<?php
    // $age is $associativeArray[$name]
    foreach($associativeArray as $name => $age) { 
      echo "  <p>Name: " . $name . ", Age: " . $age . "</p>\n";
      echo "  <p>Name: $name, Age: $age</p>\n";
    }
  ?>
</body>
</html>