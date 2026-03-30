<?php
  $title = 'Home';
  $myName = 'Trevor Reynolds';
  $myAge = 20;
  $myTeachingScore = 99.99;
  $isTeacher = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- note that the title was fixed in AT1 -->
  <title>Books Connect | <?= $title ?></title>
</head>
<body>
  <h1>Vars: demonstrate different "primitive" variables</h1>
  <p>My name is <?= $myName ?> and my teacher status is <?= $isTeacher ? 'true' : 'false' ?>. I am <?= $myAge ?> years old and my teaching score is <?= $myTeachingScore ?> / 1000.</p>
  <hr>
  Just to be clear, <?php echo $myName; ?> and <?php print $myName; ?> and <?php echo ($myName); ?> and <?php print ($myName); ?> procude the same result as <?= $myName ?>.
</body>
</html>