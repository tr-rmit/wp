<?php
  if (empty($_GET['countryid'])) {
    // customer is not supposed to be here!
    header("Location: index.php");
    exit();
  }
  include('includes/tools.inc');
  include('includes/db_connect.inc');
  $title = 'Confirm Delete';
  include('includes/header.inc');

  $countryid = htmlentities(trim($_GET['countryid']));
  $sql = "select * from country where countryid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
  }
  $stmt->bind_param("i", $countryid);
  $stmt->execute();
  $records = $stmt->get_result();
  if ($records->num_rows > 0) {
    foreach ($records as $row) {
      echo "<div class='details'>";
      echo "<h2>Are you sure you want to delete this record?</h2>";
      echo "<h3>{$row['countryname']}</h3>";
      echo "<p>{$row['description']}</p>";
      echo "<img src='../images/userimages/{$row['image']}' alt='{$row['caption']}' class='delete-img'>";
      echo "<p class='confirm'>";
      echo "<a class='btn btn-secondary' href='index.php'>Cancel</a> ";
      // encode url to make html valid
      $imagename = urldecode("../images/userimages/{$row['image']}");
      echo "<a class='btn btn-danger' href='delete_process.php?countryid={$row['countryid']}'>Delete</a>";
      echo "</p>";
      echo '</div>';
    }
  }