<?php
foreach ($_POST as $name => $value) {
  $value = trim(htmlspecialchars($value));
  echo ($name . ' => ' . $value . "<br>\n");
  $$name = $value;
}

// Basic Validation
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
$bind = mysqli_stmt_bind_param(
  $stmt,
  "sss",
  $username,
  $email,
  $password_hash
);
try {
  if ($stmt && $bind && mysqli_stmt_execute($stmt)) {
    $_SESSION['success'] = "Welcome to Bookverse, ".$username." we're too lazy to log you so you'll have to do it";
    header("Location: login.php");
    exit;
  } else {
    $_SESSION['failure'] = 'Not sure why that failed ...';
  }
} catch (mysqli_sql_exception $e) {
  $_SESSION['failure'] = 'Someone already has that username and email combination';
}

// Redirect After Successful Registration
}
