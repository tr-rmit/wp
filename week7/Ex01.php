<?php
  $name = 'Trevor';
  $age = 21;
  $gpa = 99.99;
  $isTeacher = true;

  /*
    <?= $isTeacher ? 'am' : 'am not' ?>

    is the same as:

    <?php
      if ($isTeacher) {
        echo "am";
      } else {
        echo "am not"; 
      }
    ?>  
  */

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ex01</title>
</head>
<body>
  <h1>EX01</h1>
  <p>Hello my name is <?= $name ?> I am over <?= $age ?>, my GPA is less than <?= $gpa ?> and I <?= $isTeacher ? 'am' : 'am not' ?> a teacher.</p>
</body>
</html>