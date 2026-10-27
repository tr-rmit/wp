<?php
/*
<h1>Steps</h1>
<ol>
  <li>Check that there is POST merchid, redirect to merch table if there isn't</li>
  <li>Check that someone is logged in, redirect to login page if there isn't</li>
  <li>Include database code</li>
  <li>Get the image name before we delete the record</li>
  <li>Run delete statement where merchid and userid match</li>
  <li>Number of affected rows > 0 ? <br> [Y] success message & remove image :<br> [N] failure message<br>redirect to merch table</li>
</ol>
*/
  include_once("includes/tools.inc");

// Check that there is POST merchid, redirect to merch table if there isn't
  if (!isset($_POST['merchid']) || !filter_var($_POST['merchid'],FILTER_VALIDATE_INT)) {
    $_SESSION['failure'] = "No record selected for deletion";
    header("Location: merch.php");
    exit();
  }

// Check that someone is logged in, redirect to login page if there isn't
  if (!isset($_SESSION['userid']) || !filter_var($_SESSION['userid'],FILTER_VALIDATE_INT)) {
    $_SESSION['failure'] = "You need to log in before you can delete records";
    header("Location: login.php");
    exit();
  }

// Include database code 
  include_once("includes/db_connect.inc");

// Get the image name if allowed, as well as merch and user ids
  $merchid = '';
  $userid = '';
  $image_path = '';

  $sql = "SELECT merchid, userid, image_path FROM merch WHERE merchid = ? AND userid = ?"; 
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    $_SESSION['failure'] = 'An error occurred when preparing the statement on the database.';
    header("Location: merch.php");
    exit();
  }

  $stmt->bind_param("ii", $_POST['merchid'], $_SESSION['userid']);
  $stmt->execute();
  $stmt->bind_result($merchid, $userid, $image_path);
  $stmt->execute();
  $stmt->fetch();
  $stmt->close(); // <-- we are finished with the fetching  


// Run delete statement where merchid and userid match  
  $sql = "DELETE FROM merch where merchid = ? and userid = ?";
  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    $_SESSION['failure'] = 'An error occurred when preparing the statement on the database.';
    header("Location: merch.php");
    exit();
  }

  $stmt->bind_param("ii", $merchid, $userid);
  $stmt->execute();
  if ($stmt->affected_rows > 0) {
    $_SESSION['success'] = "Merch deleted from the database, associated image";
    if (file_exists('assets/images/merch/' . $image_path)) {
      unlink('assets/images/merch/' . $image_path);
      $_SESSION['success'] .= " removed.";
    } else {
      $_SESSION['success'] .= " not found.";
    }
    header("Location: merch.php");
    exit();
  } else {
    $_SESSION['success'] = "Record not deleted from the database, no associated image removed.";
    header("Location: merch.php");
    exit();
  }

?>

