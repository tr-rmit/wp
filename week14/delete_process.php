<?php
  include('includes/tools.inc');
// divert "stray" customers back to the countries table
  if (empty($_GET['countryid']) || empty($_SESSION['userid'])) {
    header("Location: index.php");
    exit();
  }
  include('includes/db_connect.inc');
  $title = 'Delete Record';
  include('includes/header.inc');

  $countryid = htmlentities(trim($_GET['countryid']));
  $oldimage='';

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
      $oldimage = $row['image'];
    }
  } else {
    exit("No record found, perhaps someone else deleted it?");
  }
  $sql = "delete from country where countryid = ?";
  $stmt = $conn->prepare($sql);

  $stmt->bind_param("i", $countryid);
  $stmt->execute();
  if ($stmt->affected_rows > 0) {
    echo "<p>Record deleted.</p>";
    if (file_exists('../images/userimages/' . $oldimage)) {
      unlink('../images/userimages/' . $oldimage);
      echo "<p>Image deleted.<p>";
    } else {
      echo "<p>No image deleted, perhaps someone else deleted it?<p>";  
    }
  } else {
    echo "<p>Record and image NOT deleted, perhaps someone else deleted them?<p>";
  }
?>
  <p><a href="index.php">Click here to go back to the table</a></p>
<?php
  include('includes/footer.inc');