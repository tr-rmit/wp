<?php 
  if(!empty($_SESSION['user']))
    unset($_SESSION['user']);

  // 1. Is there POST data? Redirect to login if not
  if (empty($_POST) || empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
    header("Location: login.php");
    exit();
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