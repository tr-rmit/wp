<?php
  $title = 'Arrays';  
  /* Old School Code:
  $indexedArray = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
  $associativeArray = array("Peter" => 35, "Ben" => 37, "Joe" => 43);

  New School Code: */
  $indexedArray = [1,2,3,4,5,6,7];
  $associativeArray = [
    'Peter' => 35,
    'Ben' => 37,
    'Joe'=> 43
  ];


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

  <h2>Indexed Array + For Loop</h2>
<?php 
  $length = count($indexedArray);
  for($i=0; $i<$length; $i++) { // use $length to make the loop faster
    echo '  <p>' . $indexedArray[$i] . "</p>\n";
  }
?>

  <h2>Associative Array + Foreach Loop</h2>
<?php 
  // Foreach is like javascript's for ( ___ in ____ ) loop
  foreach($associativeArray as $i => $v) { // use $length to make the loop faster
    echo '  <p>name is ' . $i . ' and their age is ' . $associativeArray[$i] . "</p>\n";
  }
  foreach($associativeArray as $name => $age) { // use $length to make the loop faster
    echo "  <p>$name is $age years old.</p>\n";
  }
?>  
  
</body>
</html>