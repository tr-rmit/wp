<?php 
  session_start();
  if(!empty($_SESSION['user'])) {
    $_SESSION['usrmsg'] = 'You are logged out, sad to see you go ' . $_SESSION['user']['username'] . '.';
    unset($_SESSION['user']);
  }
  header("Location: ".$_SERVER['HTTP_REFERER']);