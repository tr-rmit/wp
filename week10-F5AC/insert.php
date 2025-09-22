<?php
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Testing Insert';
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
<?php
// Step 1: check that we have form data and image is uploaded to tmp area
  preshow($_POST);
  preshow($_FILES);
  sleep(3);

// Step 2: Clean up POST data
  foreach ($_POST as $name => $value) {
    $$name = trim($value);
  }  
// Step 3: Get the uploaded file details
  $image = trim($_FILES['image']['name']);
  $temp = $_FILES['image']['tmp_name'];
  $error = $_FILES['image']['error'];
  $type = $_FILES['image']['type'];
  $size = $_FILES['image']['size'];

  if ($error == 0 && $type == 'image/jpeg' && $size < 1000000) {
// success
    $sql = "INSERT INTO country(countryname,description,image,caption) VALUES (?,?,?,?)"; 
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      exit("An error occurred");
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
    } 
    
  } else {
    echo "<p class='warning'>Image is not suitable, failed to upload country and image.</p>";
  }
?>
</form>

  </main>

<?php
include('includes/footer.inc');
?>