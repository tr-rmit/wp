<?php 
  if(!isset($_GET['countryid'])) {
    header("Location: gallery.php");
    exit();
  }
  $id = htmlentities($_GET['countryid']);
  $title = 'Country';
  include('includes/header.inc'); 
?>
<main>
  <h1>Country Detail</h1>

<?php

  $sql = "select * from country where countryid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
  }
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $rows = $stmt->get_result();
  if ($rows->num_rows > 0) {
    foreach($rows as $row) { 
      echo <<<"CDATA"
      <div class="gallery-item">
        <h3>{$row['countryname']}</h3>
        <img src="userimages/{$row['image']}" alt="{$row['caption']}">
        <p>{$row['description']}</p>
      </div>

CDATA;
    }    
  } else {
    echo "<p>Sorry, no country found with that id.</p>";
  }

?>

</main>
<?php include('includes/footer.inc'); ?>