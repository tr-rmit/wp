<?php
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Country Detail';
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
<?php
// Step 1: Make sure the form is sending you something via GET
  // preshow($_GET);
  // sleep(3);

// Step 2: Clean up the GET data
  foreach ($_GET as $name => $value) {
    $$name = trim($value);
  }
  
  $sql = "select * from country where countryid = ?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("An error occurred, are the tables correctly named?"); 
  } 
  $stmt->bind_param("i", $countryid);
  $stmt->execute();
  if ($stmt->affected_rows > 0) {

  // Stay tuned, full solution next week!
  }
?>    
  </main>

<?php
include('includes/footer.inc');
?>