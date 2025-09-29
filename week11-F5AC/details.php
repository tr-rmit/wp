<?php
if (empty($_GET['countryid'])) {
  // customer is not supposed to be here!
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
// Step 1: check that we have form data and image is uploaded to tmp area
  //preshow($_GET);

// Step 2: Clean up GET data
  foreach ($_GET as $name => $value) {
    $$name = trim($value);
  }  
  
// success
    $sql = "select * from country where countryid = ?"; 
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      exit("An error occurred");
    }
    $stmt->bind_param("i", $countryid);
    $stmt->execute();
    $records = $stmt->get_result();

    // Stay tuned for next week's solution!

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
      echo "<p class=\"warning\">No records found</p>";
    }
  
    
?>
    <p><a href="gallery.php">Back to Gallery</a></p>
  </main>

<?php
include('includes/footer.inc');
?>