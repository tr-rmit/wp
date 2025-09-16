<?php 
  session_start();

  function preshow($var) {
    echo '<pre>';
    if (empty($var)) {
      echo 'No data';
    } else {
      print_r($var);
    }
    echo '</pre>';
  }
  
  ?>