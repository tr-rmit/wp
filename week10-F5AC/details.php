<?php
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Country Detail';
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
<?php
// Step 1: check that we have form data and image is uploaded to tmp area
  preshow($_GET);
  exit();
// Step 2: Clean up GET data
  foreach ($_GET as $name => $value) {
    $$name = trim($value);
  }  

  if ($error == 0 && $type == 'image/jpeg' && $size < 1000000) {
// success
    $sql = "select * from country where countryid = ?"; 
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      exit("An error occurred");
    }
    $stmt->bind_param("i", $countryid);
    $stmt->execute();

    // Stay tuned for next week's solution!
  }
    
?>
</form>

  </main>

<?php
include('includes/footer.inc');
?>