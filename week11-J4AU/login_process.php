<?php 
  session_start();
  if($_POST['name'] == 'Steve' && $_POST['password'] == 'RMIT1234') {
    $_SESSION['user']['name'] = $_POST['name'];
  }
  header("Location: index.php");