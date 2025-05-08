<?php 

  // Check the "order", does it make sense

  if (empty($_POST)) {
    die("no POST data"); // consider header("Location: add.php");
  } else if (!isset($_FILES['image'])) {
    die("image not found"); // consider header("Location: add.php");
  } else if($_FILES['image']['error']!=0) {
    die('file upload error');
  } else if(!preg_match("#^image/#",$_FILES['image']['type'])) {
    die('not an image');
  } else if($_FILES['image']['size'] > 500000) {
    die('image too big!');
  }

  // If you get to this point, there is POST and the image passes checks

  foreach ($_POST as $key => $val) {
    $$key = trim(htmlentities($val));
    /*
    $countryname = 'Bulgaria'
    $description = 'Im sure its nice'
    $caption = 'Local Festival'
    $<script>Give me your password</script> = '&lt;script&gt;&lt;/script&gt;'
    */
  }

  $imageName = $_FILES['image']['name'];
  $imageTemp = $_FILES['image']['tmp_name'];

// enough has gone right to justify a page creation
  echo "All good on line 33";
  
  include("includes/header.inc");

  $sql = "INSERT INTO country(countryname, description, image, caption) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    die("An error occurred - could not prepare");
  } 
  $stmt->bind_param("ssss", $countryname, $description, $imageName, $caption);
  $stmt->execute();
 
  if (!empty($stmt->errno)) {
    printf("Error: %d.\n", $stmt->errno);
    die();
  }
?>

<main>

<?php
  if ($stmt->affected_rows > 0) {
    echo '<p>New record successfully inserted into the database</p>';
    if (move_uploaded_file($imageTemp, 'userimages/'.$imageName)) {
      echo "<p>Image moved to folder</p>";
    } else {
      echo "<p>Image not moved to folder</p>";
    }
  } else {
    echo '<p>Record not inserted into the database</p>';
  }
  echo '<p><a href="gallery.php">Click here to go back to the gallery</a></p>';

?>

</main>

<?php  
  include("includes/footer.inc");
?>


