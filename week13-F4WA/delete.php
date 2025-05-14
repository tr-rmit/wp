<?php 
  if (empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
  }
  // 1. Is there something to delete in $_GET?
  if (empty($_GET['countryid'])) {
    header("Location: modify_table.php");
  }
  $countryid = trim(htmlentities($_GET['countryid'])); 
 
  // 2. Set up some empty variables we will need later
  $newImageName = '';
  $tmpImageName = '';
  $oldImageName = '';

  include("includes/db_connect.inc");

  // 3. Read the existing record in the database to get old image name
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
    } 
  }

  // 4. Got the image to delete, remove record from database

  $sql = "delete from country where countryid = ?";
  $stmt = $conn->prepare($sql);

  $stmt->bind_param("i", $countryid);
  $stmt->execute();
  if ($stmt->affected_rows > 0) {
    if (file_exists('userimages/' . $oldImageName)) {
      unlink('userimages/' . $oldImageName);
    }
  } 

  header("Location: modify_table.php");