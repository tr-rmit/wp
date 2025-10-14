<?php
// divert "stray" customers back to form
if (empty($_POST) || empty($_FILES)) {
  header("Location: add.php");
  exit();
}
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Add Country';
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
<?php
// Step 1: Make sure the form is sending you something via POST and FILES
  // preshow($_POST);
  // preshow($_FILES);
  // sleep(3);

// Step 2: Clean up the POST data
  foreach ($_POST as $name => $value) {
    $$name = trim($value);
  }
  $image = trim($_FILES['image']['name']);
  $temp = $_FILES['image']['tmp_name'];
  $type = $_FILES['image']['type'];
  $error = $_FILES['image']['error'];
  $size = $_FILES['image']['size'];
 
  if(empty($image) || $error !=0 || $size > 1000000 || $type != "image/jpeg") {
    exit("The image you are trying to upload is bad.");
  }

  $sql = "INSERT INTO country(countryname,description,image,caption) VALUES (?,?,?,?)";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("An error occurred, are the tables correctly named?"); 
  } 
  $stmt->bind_param("ssss", $countryname, $description, $image, $caption);
  $stmt->execute();
  if ($stmt->affected_rows > 0) {
    echo '<div class="alert alert-success alert-dismissible">';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    echo "<p>New record successfully inserted into the database</p>";
    echo '</div>';
    if (move_uploaded_file($temp, '../images/userimages/' . $image)) {
      echo '<div class="alert alert-success alert-dismissible">';
      echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
      echo "<p>Image moved to folder</p>";
      echo '</div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible">';
      echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
      echo "<p>Image not moved to folder</p>";
      echo '</div>';
    }    
  } else {
    echo '<div class="alert alert-danger alert-dismissible">';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    echo "<p>Record not inserted into the database, image not uploaded either</p>";
    echo '</div>';
  }
?>    
  </main>

<?php
include('includes/footer.inc');
?>