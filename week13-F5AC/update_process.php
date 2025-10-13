<?php
// 0. Is there POST data? Redirect to modify table if not
if (empty($_POST)) {
  // customer is not supposed to be here!
  header("Location: update_form.php");
  exit();
}
include('includes/tools.inc');
include('includes/db_connect.inc');

// Step 1: check that we have form data and image is uploaded to tmp area
  preshow($_POST);
  preshow($_FILES);
  //sleep(3);

// 2. Set up some empty variables we will need later
  $newImageName = '';
  $tmpImageName = '';
  $oldImageName = '';

// Step 2: Clean up POST data
  foreach ($_POST as $name => $value) {
    $$name = trim($value);
  }  

// 3. If there is an image we need the old image name from the database
  if (!empty($_FILES['image']['name'])) {
    if($_FILES['image']['error']!=0) {
      die('file upload error');
    } else if(!preg_match("#^image/#",$_FILES['image']['type'])) {
      die('not an image');
    } else if($_FILES['image']['size'] > 1000000) {
      die('image too big!');
    }
    // 3.1. new image is ok! 
    $newImageName = trim(htmlentities($_FILES['image']['name']));
    $tmpImageName = trim(htmlentities($_FILES['image']['tmp_name']));
  }

// 4. At this stage, we have no image OR enough image details needed to perform an update, let's start creating a HTML page
  $title = "Update Country";
  include("includes/header.inc");

  // 5. Put POST data into variables with same name as key
  foreach ($_POST as $key => $val) {
    $$key = trim(htmlentities($val));
    /* eg
    $countryid = 6
    $countryname = 'Bulgaria'
    $description = 'Im sure its nice'
    $caption = 'Local Festival'
    $<script>Give me your password</script> = '&lt;script&gt;&lt;/script&gt;'
    */

  }

  // 6. Read the existing record in the database to get old image name
  $sql = "select image from country where countryid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
  }
  //preshow($countryid);
  $stmt->bind_param("i", $countryid);
  $stmt->execute();
  $records = $stmt->get_result();
  if ($records->num_rows > 0) {
    foreach ($records as $row) {
      $oldImageName = $row['image'];
      //echo ("Debug: $oldImageName");
    } 
  } else {
    //preshow($_POST);
    //die("Could not find that country! Even though it was in the form ...  weird?");
  }

?>
  <main class="container">
    <h1><?= $title ?></h1>

<?php
  // 7. This is a bit of a hack: we are not updating the image name if it doesn't exist, but rather than write two separate SQL statements, we will use the old image name in an update if a new image name does not exist
  //print_r($oldImageName.' :-> '.$newImageName);
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
      if (file_exists('../images/userimages/' . $oldImageName)) {
  // remove old file
        unlink('../images/userimages/' . $oldImageName);
      }
  // Upload new image
      if (move_uploaded_file($tmpImageName, '../images/userimages/' . $newImageName)) {
        echo "Image moved to folder";
      } else {
        echo "Image not moved to folder";
      }
    }
  } else {
    echo "<p>Record $countryname NOT updated.<p>";
  }

?>

<p><a href="index.php">Click here to go back to the table</a></p>

</main>

<?php
include('includes/footer.inc');
?>