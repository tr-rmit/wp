<?php

/* Call this function in the booking page like so: 
   $fieldErrors = validateBooking();
   If the array is empty, then no errors were generated
*/
function validateBooking() {
  $errors = []; // new empty array to return error messages
  if ($_POST['customer']['name'] == '') {
    $errors['customer']['name'] == "Name can't be blank";
  } else {
    // more advanced checks here
  }
  if ($_POST['customer']['email'] == '') {
    $errors['customer']['email'] == "Email can't be blank";
  } else {
    // more advanced checks here
  }
  // ... etc
}



?>