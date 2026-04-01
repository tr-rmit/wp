<?php
  session_start();
  
  /* See Tanya's announcement: https://rmit.instructure.com/courses/159686/discussion_topics/2932046 */
  ini_set('display_errors', 1); 
  error_reporting(E_ALL); 

  /* Updated Pre Show Code generated using Gemini AI and adapted */
  // reserved variable used to track depth in new recursive preshow
  $PRE_SHOW_DEPTH = 0; 
  function preshow($item)
  {
    global $PRE_SHOW_DEPTH;
    // echo "<br>debug: $PRE_SHOW_DEPTH";
    if (is_array($item)) {
      if (empty($item))
        $item = "--Empty Array--";
      // If it's an array, loop through its elements and call the function recursively
      ++$PRE_SHOW_DEPTH;
      foreach ($item as $key => $value) {
        $safeKey = htmlentities($key, ENT_QUOTES, 'UTF-8');
        $item[$safeKey] = preshow($value);
        if ($safeKey != $key)
          unset($key);
      }
      --$PRE_SHOW_DEPTH;
    } elseif (is_string($item)) {
      // If it's a string, apply htmlentities
      $item = htmlentities($item, ENT_QUOTES, 'UTF-8');
      if (empty($item))
        $item = "--Empty String--";
    } elseif (is_bool($item)) {
      $item = $item ? 'true' : 'false';
    }
    // For other types (int, float, etc.), the value is returned unchanged
    
    // echo "<br>debug: $PRE_SHOW_DEPTH";
    if($PRE_SHOW_DEPTH > 0) 
      return $item;
    else
      print '<pre>'.print_r($item,true)."</pre>\n";
  }

  function isLoggedIn()
  {
    return true;
    /* We will cover this in later classes */
    /* check in the session: is a user logged in? return true or false */
  }

  /* Test new preshow */
