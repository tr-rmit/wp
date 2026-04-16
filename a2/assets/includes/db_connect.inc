<?php 
//Check what server you are accessing
  if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e54061";
  } else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "e54061";
    include("/home/eh1/e54061/.htdb_pass");
    $dbname = "e54061";
  }
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    echo "<p>Database connected, good to go!</p>";
  }
?>