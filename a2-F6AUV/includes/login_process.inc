<?php
  foreach ($_POST as $name => $value) {
    $$name = htmlspecialchars(trim($value));
  }

  $errors = [];

  //Prepared SELECT
  $sql = "
    SELECT userid, username, email, password_hash
    FROM users
    WHERE username = ? OR email = ?
  ";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param(
    $stmt,
    "ss",
    $login,
    $login
  );
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $user = mysqli_fetch_assoc($result);

  //Verify Password
  if ($user && password_verify($password, $user["password_hash"])) {
    $_SESSION["userid"] = $user["userid"];
    $_SESSION["username"] = $user["username"];
    $_SESSION['success'] = "Welcome back {$SESSION['username']}!";
    header("Location: index.php");
    exit;
  }

  //If the login fails, show a general message:
  $_SESSION['failure'] = "Login failed. Please check your username/email and password.";
  $status_message = "Login failed. Please check your username/email and password.";
