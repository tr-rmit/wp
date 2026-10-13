<?php
session_start();
$_SESSION = [];
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  // Don't be fooled, next lines unset the cookies by setting the time in the past
  setcookie(
    session_name(),
    "",
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
  );
}
session_destroy();
header("Location: index.php");
exit;
