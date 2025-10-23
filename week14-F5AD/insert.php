<?php
if(empty($_POST) || $empty($_FILES)) {
  header("Location: add.php");
  exit();
}
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Insert';
include('includes/header.inc');
?>
  <main class="container">
    <h2><?= $title ?></h2>
<?php
// Step 1: Are we getting any POST and FILES data eg from add.php?
  //preshow($_POST);
  //preshow($_FILES);
  //sleep(3);
  
  foreach ($_POST as $name => $value) {
    $$name = trim($value);
  }

  $image = trim($_FILES['image']['name']);
  $temp = $_FILES['image']['tmp_name'];
  $error = $_FILES['image']['error'];
  $type = $_FILES['image']['type'];
  $size = $_FILES['image']['size'];

  if(empty($image) || $error !=0 || $type != "image/jpg" || $size > 1000000) {
    exit("This image is not suitable, no record inserted, no image uploaded");
  }

  $sql = "INSERT INTO country(countryname,description,image,caption) VALUES (?,?,?,?)"; //  '); drop tables; <-- this won't work

  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("An error occurred when preparing the statement on the database.");
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
      echo "<p>Image moved to userimages folder</p>";
      echo '</div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible">';
      echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
      echo "<p>Image not moved to userimages folder</p>";
      echo '</div>';
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible">';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    echo "<p>Record not inserted into the database</p>";
    echo '</div>';
  }

?>    
  </main>

<?php
include('includes/footer.inc');
?>