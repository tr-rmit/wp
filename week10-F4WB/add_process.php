<?php 
  if (empty($_POST)) {
    die("no POST data"); // redirect user to the form
  } else if (!isset($_FILES['image'])) {
    die("image not found"); // redirect user to the form
  } else if($_FILES['image']['error']!=0) {
    die('file upload error'); // not sure what to do here
  } else if(!preg_match("#^image/#",$_FILES['image']['type'])) {
    die('not an image'); // redirect user to the form
  } else if($_FILES['image']['size'] > 500000) {
    die('image too big!');
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