<?php 

  // 1. Is there POST data? Redirect to login if not
  if (empty($_POST) || trim($_POST['username']) || trim($_POST['password'])) {
    header("Location: login.php");
  }

  include("includes/db_connect.inc");
  $username = ''; 
  $password = ''; 

  foreach ($_POST as $name => $value) {
    $$name = htmlentities(trim($value));
    /* generates these variables:
    $username = $_POST['username'];
    $password = $_POST['password'];
    */
  }
  
  $sql = "select * from users where username = ? and password = SHA(?)";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param("ss", $username, $password);
  
  $stmt->execute();

  $result = $stmt->get_result();

  // if someone already has that username and password, log them in, send them to home page!
  if ($result->num_rows > 0) {
    $_SESSION['user']['username'] = $username;
    header("Location: index.php");
  } else {
    header("Location: login.php");
  }
  $conn->close();

  /* Super basic code 
  if($_POST['username'] == 'Steve' && $_POST['password'] == 'RMIT1234') {
    $_SESSION['user']['username'] = $_POST['username'];
  }*/
  
  