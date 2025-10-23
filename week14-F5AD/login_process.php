<?php
  if (empty($_POST)) {
    header("Location: login_form.php");
    exit();
  }
  include('includes/tools.inc');
  include('includes/db_connect.inc');

  $username = '';
  $userid = '';
  $email = htmlentities(trim($_POST['email']));
  $password = $_POST['password'];

  $stmt = mysqli_prepare($conn, "SELECT userid, username, password FROM users WHERE email = ?");
  mysqli_stmt_bind_param($stmt, "s", $email);  
  try {
    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_bind_result($stmt, $userid, $username, $hash);
      mysqli_stmt_fetch($stmt);
      if ($userid && password_verify($password, $hash)) {
        $_SESSION['userid'] = $userid;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['message'] = "Login successful.";
        header("Location: index.php");
      } else {
        $_SESSION['error'] = "Login failed. Check your credentials.";
        header("Location: login_form.php");
      } 
    } else {
      $_SESSION['error'] = "Login failed. Check your credentials.";
      header("Location: login_form.php");
    } 
  } catch(Exception $e) {
    $_SESSION['error'] = "Login really failed. Check your credentials.";
    header("Location: login_form.php");
  }