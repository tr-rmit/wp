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
    // this is like const
    define('NAME','Trevor');
    // these are like var and let
    $name = 'Trevor';
    $age = 50;
    $price = 99.99;
    $isTeacher = true;
    $name='not trevor';
    print $name;
    print NAME;
    /* These produce errors
    NAME = 'something else';
    define('NAME','Not Trevor'); */
  ?>

<p>Hi there <?php echo $name; ?>.</p>
<p>Hi there <?= $name ?>, you are <?= $age ?> years old and it is 
<?= $isTeacher ? 'true' : 'false' ?> to say you are a teacher.</p>

</body>
</html>