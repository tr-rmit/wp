<?php 

  // 1. Is there POST data? Redirect to register if not
  if (empty($_POST) || empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
    header("Location: register.php");
    exit();
  }

  // 2. Because usernames are the unique primary key, need to check first!
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

 
  $sql = "select * from users where username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  // 3.1. if someone already has that username, send them back to register
  if ($result->num_rows > 0) {
    header("Location: register.php");
    $conn->close();
    exit();
  } // 3.2. else if no one has that username, register them, send them to home page!
  else {
    
    $sql = "insert into users (username, password, reg_date) values (?, SHA(?), now())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
      $_SESSION['user']['username'] = $_POST['username'];
      header('Location: index.php');
      $conn->close();
      exit();
    } else {
      header('Location: register.php');
      $conn->close();
      exit(); // <-- not necessary
    }
  }