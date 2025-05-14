<?php 
  session_start();
  if (empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
  }

  if (empty($_POST)) {
    header("Location: add.php");
    exit();
  } else if (!isset($_FILES['image'])) {
    $_SESSION['err'] = "You forgot to select an image, please select an image";
    header("Location: add.php");
    exit();
  } else if($_FILES['image']['error']!=0) {
    $_SESSION['err'] = "That image failed to upload properly, can you try again?";
    header("Location: add.php");
    exit();
  } else if(!preg_match("#^image/#",$_FILES['image']['type'])) {
    $_SESSION['err'] = "That file was not an image, can you try again?";
    header("Location: add.php");
    exit();
  } else if($_FILES['image']['size'] > 500000) {
    $_SESSION['err'] = "That file is too big, can you try again?";
    header("Location: add.php");
    exit();
  }
  
  // If you get to this point, there is POST and the image passes checks
  foreach ($_POST as $key => $val) {
    $$key = htmlentities(trim($val));
    /* This creates 3 (at time of writing) variables:
      $countryname = "Bulgaria"
      $description = "Im sure its nice"
      $caption = "Local festival"
    */
  }

  $imageName = $_FILES['image']['name'];
  $imageTemp = $_FILES['image']['tmp_name'];

  $title='Add More';
  include('includes/header.inc');

  $sql = "INSERT INTO country(countryname, username, description, image, caption) VALUES (?,?,?,?,?)";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    die("An error occurred - could not prepare");
  } 
  $stmt->bind_param("sssss", $countryname, $_SESSION['user']['username'], $description, $imageName, $caption);
  $stmt->execute();

  if (!empty($stmt->errno)) {
    printf("Error: %d.\n", $stmt->errno);
    die();
  }

?>

  <main>
    <h1>Country Insertion</h1>

<?php
  if ($stmt->affected_rows > 0) {
    echo '<p>New record successfully inserted into the database</p>';
    if (move_uploaded_file($imageTemp, 'userimages/'.$imageName)) {
      echo "<p>Image moved to userimages folder</p>"; 
    } else {
      echo "<p>Image NOT moved to userimages folder</p>";
    }
  } else {
    echo '<p>Record not inserted into the database</p>';
  }
?>
 
  <p><a href="gallery.php">Click here to go back to the gallery</a></p>

  </main>
<?php include('includes/footer.inc'); ?>