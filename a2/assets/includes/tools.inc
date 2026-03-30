<?php
  session_start();

  function preshow($var) {
    $ret = empty($var) ? 'No Data or 0' : htmlentities($var);
    $ret = print_r($ret,true);
    return "<pre>\n$ret\n</pre>";
  }

  function isLoggedIn() {
    /* We will cover this in later classes */
    /* check in the session: is a user logged in? return true or false */
  }
?>