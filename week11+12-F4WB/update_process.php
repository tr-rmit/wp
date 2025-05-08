<?php 
  if (empty($_POST)) {
    die("no POST data"); // redirect user to the form
  }
  $imageName = '';
  $imageTemp = '';
  $imageOld = '';
  if (!empty($_FILES['image']['name']) && !empty($_FILES['image']['tmp_name']) ) {
    echo "<p>Not empty $imageName | $imageOld</p>";
    if($_FILES['image']['error']!=0) {
      die('file upload error'); // not sure what to do here
    } else if(!preg_match("#^image/#",$_FILES['image']['type'])) {
      die('not an image'); // redirect user to the form
    } else if($_FILES['image']['size'] > 500000) {
      die('image too big!');
    }  
    $imageName = htmlentities(trim($_FILES['image']['name']));
    $imageTemp = htmlentities(trim($_FILES['image']['tmp_name']));
  }
  $title='Modify Existing';
  include('includes/header.inc');

  $sql = "select countryname, image from country where countryid=?";
  
  $stmt = $conn->prepare($sql);
  //echo "<p>hello2</p>";
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
  }
  $stmt->bind_param("i", $countryid);
  $stmt->execute();
  $records = $stmt->get_result();
  if ($records->num_rows > 0) {
    foreach ($records as $row) {
      preshow($row);
      $countryname = $row['countryname'];
      $imageOld = $row['image'];
    }
  }
  echo "<p>$imageName | $imageOld</p>";
  if (empty($imageName)) {
    $imageName = $imageOld;
  }
  echo "<p>$imageName | $imageOld</p>";
  
  
  // If you get to this point, there is POST and the image (if one was submitted) passes checks
  foreach ($_POST as $key => $val) {
    $$key = htmlentities(trim($val));
  }

  echo $imageName;
  $sql = "UPDATE country SET countryname=?, description=?,image=?, caption=? WHERE countryid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    die("An error occurred - could not prepare: ".$conn->error);
  } 
  // update code
  $stmt->bind_param("ssssi", $countryname, $description, $imageName, $caption, $countryid);
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
    echo "<p>Record $countryname updated<p>";

/* old compulsory file code 
    if (move_uploaded_file($imageTemp, 'userimages/'.$imageName)) {
      echo "<p>Image moved to userimages folder</p>"; 
    } else {
      echo "<p>Image NOT moved to userimages folder</p>";
    }
*/
  
    if ($imageOld != $imageName) {
      //Delete old image
      if (file_exists('userimages/' . $imageOld)) {
        unlink('userimages/' . $imageOld);
        echo "<p>$imageOld removed folder</p>";
      }
      //Upload new one
      if (move_uploaded_file($imageTemp, 'userimages/' . $imageName)) {
        echo "<p>$imageName placed in folder</p>";
      } else {
        echo "<p>$imageName NOT moved to folder</p>";
      }
    }

  } else {
    echo '<p>Record not inserted into the database</p>';
  }
?>
 
  <p><a href="gallery.php">Click here to go back to the gallery</a></p>

  </main>

<?php include('includes/footer.inc'); ?>