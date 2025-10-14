<?php
// divert "stray" customers back to gallery
if (empty($_GET)) {
  header("Location: gallery.php");
  exit();
}
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
  $records = $stmt->get_result();
  if ($records->num_rows > 0) {
    foreach ($records as $row) {
      echo <<<"CDATA"
        <div>
          <h2> {$row['countryname']} </h2>
          <img src='../images/userimages/{$row['image']}' alt='{$row['caption']}' class='img-fluid rounded'>
          <p>{$row['description']}</p>
        </div>

CDATA;        
    }
    
  } else {
    echo "<p class=\"warning\">That country does not exist.</p>";
  }
?>    
    <p><a href="gallery.php">Return to the gallery</a></p>
  </main>

<?php
include('includes/footer.inc');
?>