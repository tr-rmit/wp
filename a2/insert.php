<?php

use Dom\CDATASection;

  include_once("assets/includes/tools.inc");
  include_once("assets/includes/db_connect.inc");
  if(!isLoggedIn()) {
    /* redirect them to the login page */
    exit();
  }
  
  $title = "Insert Book";
  include_once("assets/includes/header.inc");
  include_once("assets/includes/nav.inc");
?>

<main>
  <h1><?=  $title ?></h1>
  <?php 
    // Developer use only, remove preshows when everything is working
    //preshow($_POST);
    //preshow($_FILES);

  // htmlspecialchars stop XSS attacks
  foreach ($_POST as $name => $value) {
    $$name = htmlspecialchars(trim($value)); // very similar to htmlentites()
  }

  $file01 = trim($_FILES['file01']['name']);
  $temp = $_FILES['file01']['tmp_name'];
  $error = $_FILES['file01']['error'];
  $type = $_FILES['file01']['type'];
  $size = $_FILES['file01']['size'];
  
  // || $error !=0 || !str_starts_with($type, "image/") || $size > 1000000
  if(empty($file01)) {
    exit("This image is not suitable, no record inserted, no image uploaded");
  }

  // Image loks good, lets look at the POST data now

  // Prepared statements stop SQL injection attacks
  $sql = "INSERT INTO books(author, title, description, image_path, status, published) VALUES (?,?,?,?,?,?)"; // Prepared statements stop SQL injection attacks

  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("An error occurred when preparing the statement on the database.");
  }
  // dibs
  $stmt->bind_param("ssssss", $author, $title, $description, $file01, $status, $published);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo <<<CDATA
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p>New record successfully inserted into the database</p>
      </div>

CDATA;        
    if (move_uploaded_file($temp, 'assets/images/books/' . $file01)) {
      echo <<<CDATA
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p>Image moved to book images folder</p>
      </div>

CDATA;      
    } else {
      echo <<<CDATA
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p>Image not moved to book images folder</p>
      </div>
      
CDATA;      
    }
  } else {
echo <<<CDATA
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p>Book was not inserted into the database, sorry :-(</p>
      </div>
      
CDATA;     
  }

  echo "<p></p><a href='add.php'>Return to the Add Book page</a></p>";
  ?>

</main>

<?php 
  include("assets/includes/footer.inc");
?>    