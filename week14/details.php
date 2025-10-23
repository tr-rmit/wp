<?php
// Step 1: redirect any "stray" customers
if(empty($_GET['countryid'])) {
  header("Location: gallery.php");
  exit();
}
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Country Detail';
include('includes/header.inc');
?>
  <main class="container">
    <h2><?= $title ?></h2>
    <table class="table table-striped table-hover"> <!--  table-striped -->

    <div id="gallery" class="row">
<?php
  // Step 2: Clean up GET data
    foreach ($_GET as $name => $value) {
      $$name = trim($value);
    }  
    $sql = "select * from country where countryid = ?"; 
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      exit("An error occurred");
    }
    $stmt->bind_param("i", $countryid);
    $stmt->execute();
    $records = $stmt->get_result();
    if ($records->num_rows > 0) {
      foreach ($records as $row) {
        echo <<<"CDATA"
        <div>
          <h2>{$row['countryname']}</h2>
          <img src='../images/userimages/{$row['image']}' alt='{$row['caption']}' class='img-fluid rounded'>
          <p>{$row['description']}</p>
        </div>

CDATA;
      }
    } else {
      echo "<p class=\"warning\">No countries found</p>";
    }
?>
    </div>
    <p><a href="gallery.php">Back to Gallery</a></p>
  </main>

<?php
include('includes/footer.inc');
?>