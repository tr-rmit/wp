<?php
if ($_SERVER["SERVER_NAME"] === "localhost") {
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "mmmm"; // bookverse in the assignment
} else {
  $host = "talsprddb02.int.its.rmit.edu.au";
  $user = "e54061";
  include("/home/eh1/e54061/.htdb_pass"); // contains just this line: $password = "RMIT1234!";
  $database = "e54061";
}

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
  die("Database connection failed.");
} else {
  // echo "<p>Sucessfully connected to the database</p>";
}
