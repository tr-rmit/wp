<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vars</title>
</head>
<body>
  <h1>Vars</h1>
  <?php
    $name = "Trevor";
    $age = 50;
    $price = 50.0;
    $isTeacher = true;
  ?>
  <p>Welcome <?php echo $name; // print $name; also works ?></p>
  <p>Welcome <?= $name ?>, you are <?= $age ?> years old and cost <?= $price ?>, and it is <?= $isTeacher ? "true" : "false" ?> to say you are a teacher.</p>

</body>
</html>