<?php
  $title = 'Home';
  $myName = "Trevor Reynolds";
  $myAge = 20;
  $myTeachingScore = 99.99;
  $isTeacher = true;

/* everything is good, lets go forward and generate the page */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books Connect | <?= $title ?></title>
</head>
<body>
  <h1><?= $title ?></h1>
  <p>Hello my name is <?= $myName ?>, I am <?= $myAge ?> years old. It is <?= $isTeacher ? "true" : "false" ?> to say that I am a teacher and my teaching score is <?= $myTeachingScore ?>.</p>
</body>
</html>