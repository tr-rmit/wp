<?php
  foreach ($_POST as $name => $value) {
    $$name = htmlspecialchars(trim($value));
  }
  $status_message = '';
  $errors = [];

  if ($username === "") {
    $errors[] = "Username is required.";
  }
  if ($email === "") {
    $errors[] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email address is not valid.";
  }
  if ($password === "") {
    $errors[] = "Password is required.";
  }
  if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
  }

  if(count($errors) == 0) {
    // Hash the Password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    // Prepared Insert
    $sql = "
      INSERT INTO users
      (username, email, password_hash)
      VALUES (?, ?, ?)
    ";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
      $stmt,
      "sss",
      $username,
      $email,
      $password_hash
    );

    try {
      $registered = mysqli_stmt_execute($stmt);

      if ($registered) {
        $_SESSION['success'] = 'Welcome '.$_SESSION['username'].' to the M.M.M.M.!';
      // Redirect After Successful Registration
        header("Location: login.php");
        exit;
      }
    } catch (mysqli_sql_exception $e) {
      $status_message = 'Someone already has that username and email combination';
      $_SESSION['failure'] = 'Someone already has that username and email combination';
    } 
  }