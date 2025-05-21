<?php 
  session_start();
  if(!empty($_SESSION['user']))
    unset($_SESSION['user']);
  $_SESSION['usrmsg'] = "Logout successful, bye!";
  header("Location: ".$_SERVER['HTTP_REFERER']);