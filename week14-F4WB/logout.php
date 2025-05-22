<?php 
  session_start();
  $_SESSION['usrmsg'] = 'Bye ' . $_SESSION['user']['username'] . ', hope to see you soon!';  
  if(!empty($_SESSION['user']))
    unset($_SESSION['user']);
  header("Location: ".$_SERVER['HTTP_REFERER']);