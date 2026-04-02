<?php
  include("../a2/assets/includes/tools.inc");

  $title = 'Arrays: Indexed &amp; Associative';
  $dim1Names = ['Alison', 'Roxi', 'Pippin' ];
  $dim1Ages = [20, 37, 43];
  $dim1Assoc = [
    'Alison' => 20,
    'Roxi' => 37,
    'Pippin' => 43
  ];
  $dim2Assoc = [
    'Alison' => [
      'id' => 's54062',
      'age' => 20
    ],
    'Roxi' => [
      'id' => 's54063',
      'age' => 37
    ],
    'Pippin' => [
      'id' => 's54064',
      'age' => 43
    ]
  ];
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
  <h2>Indexed</h2>
  <p>
    <?php 
      $count = count($dim1Names);
      for($i=0; $i<$count; ++$i) {
        echo 'Employee #' . ($i+1) . " is $dim1Names[$i] and is $dim1Ages[$i] years old.<br>";
      }
    ?>
  </p>
  <h2>Associative</h2>
  <p>Almost works: <br>
    <?php 
      // $count = count($dim1Names);
      foreach($dim1Assoc as $name => $age) {
        echo 'Employee #' . ($i+1) . " is $name and is $age years old.<br>";
      }
      //preshow($dim1Assoc);
    ?>
    <br> Works better: <br>
    <?php 
      // $count = count($dim1Names);
      foreach($dim2Assoc as $name => $details) {
        echo "Employee id: {$details['id']} is $name and is {$details['age']} years old.<br>";
      }
      preshow($dim2Assoc);
    ?>
  </p>
    <blockquote>For Homework: Can you rewrite the code so that 1) ids are the key and 2) age and name are inside the nested details array?.</blockquote> 
</body>
</html>