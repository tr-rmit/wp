<?php 

  // Check the "order", does it make sense?

  // 1. Is there POST data? Redirect to modify table if not
  if (empty($_POST)) {
    header("Location: modify_table.php");
  }

  // 2. Set up some empty variables we will need later
  $newImageName = '';
  $tmpImageName = '';
  $oldImageName = '';

  // 3. If there is an image we need the old image name from the database
  if (!empty($_FILES['image']['name'])) {
    if($_FILES['image']['error']!=0) {
      die('file upload error');
    } else if(!preg_match("#^image/#",$_FILES['image']['type'])) {
      die('not an image');
    } else if($_FILES['image']['size'] > 500000) {
      die('image too big!');
    }
    // 3.1. new image is ok! 
    $newImageName = $_FILES['image']['name'];
    $tmpImageName = $_FILES['image']['tmp_name'];
  }

  // 4. At this stage, we have no image OR enough image details needed to perform an update, let's start creating a HTML page

  include("includes/header.inc");

  // 5. Read the existing record in the database to get old image name
  $sql = "select image from country where countryid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
  }
  $stmt->bind_param("i", $countryid);
  $stmt->execute();
  $records = $stmt->get_result();
  if ($records->num_rows > 0) {
    foreach ($records as $row) {
      $oldImageName = $row['image'];
    }
  }
  
  // 6. Put POST data into variables with same name as key
  foreach ($_POST as $key => $val) {
    $$key = trim(htmlentities($val));
    /* eg
    $countryname = 'Bulgaria'
    $description = 'Im sure its nice'
    $caption = 'Local Festival'
    $<script>Give me your password</script> = '&lt;script&gt;&lt;/script&gt;'
    */
  }

  // 7. This is a bit of a hack: we are not updating the image name if it doesn't exist, but rather than write two separate SQL statements, we will use the old image name in an update if a new image name does not exist
  if (empty($newImageName)) 
    $newImageName = $oldImageName;
  $sql = "UPDATE country SET countryname=?, description=?, image=?, caption=? WHERE countryid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    die("An error occurred - could not prepare");
  } 
  $stmt->bind_param("ssssi", $countryname, $description, $newImageName, $caption, $countryid);
  $stmt->execute();
 
  if (!empty($stmt->errno)) {
    printf("Error: %d.\n", $stmt->errno);
    die();
  }

  // 8. If the record was updated ... 
  if ($stmt->affected_rows > 0) {
    echo "<p>Record $countryname updated<p>";
  // ... AND there is a temp image waiting in $_FILES
  if (!empty($tmpImageName)) {
  // ... make sure the old file actually exists
      if (file_exists('images/' . $oldImageName)) {
  // remove old file
        unlink('images/' . $oldImageName);
      }
  // Upload new image
      if (move_uploaded_file($tmpImageName, 'images/' . $newImageName)) {
        echo "Image moved to folder";
      } else {
        echo "Image not moved to folder";
      }
    }
  }
?>

<main>

<?php /*
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
*/
?>

</main>

<?php  
  include("includes/footer.inc");
?>


