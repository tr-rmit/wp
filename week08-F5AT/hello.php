<?php 
  $name = 'Trevor';
  $title = "Hello";
  function getName() {
    global $name;
    return $name;
  }
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

  <?php 
    print getName();
    //print NAME;
    /* These procude errors
    NAME = 'something else';
    define('NAME','Not Trevor'); */
  ?>

<p>Hi there <?php echo $name; ?>.</p>
<p>Hi there <?= $name ?>, you are <?= $age ?> years old and it is 
<?= $isTeacher ? 'true' : 'false' ?> to say you are a teacher.</p>

</body>
</html>