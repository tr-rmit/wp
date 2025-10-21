<?php
 
  include('includes/tools.inc');
  include('includes/db_connect.inc');

  $username = htmlentities(trim($_POST['username']));
  $email = htmlentities(trim($_POST['email']));
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  $stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

  if (mysqli_stmt_execute($stmt)) {
    // Auto-login the user after registration
    $userid = mysqli_insert_id($conn);
    $_SESSION['userid'] = $userid;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['message'] = "Registration and login are successful.";
    header("Location: index.php");
  } else {
    $_SESSION['error'] = "Registration failed. Try a different email or username.";
    header("Location: register.php");
  }
  exit();