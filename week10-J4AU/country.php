<?php 
  if(empty($_GET['countryid'])) {
    header("Location: gallery.php");
    exit();
  }
  $title = 'Country';
  $countryid = htmlentities(trim($_GET['countryid']));
  include('includes/header.inc'); 
?>

<main>  
  <h1>Country Details</h1>

<?php 
  $sql = "select * from country where countryid = ?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
  }
  $stmt->bind_param("i", $countryid);
  $stmt->execute();
  $rows = $stmt->get_result();
  if ($rows->num_rows > 0) {
    foreach($rows as $row) { 
      echo <<<"CDATA"
      <div class="detail">
        <h3>{$row['countryname']}</h3>
        <img src="userimages/{$row['image']}" alt="{$row['caption']}">
        <p>{$row['description']}</p>
      </div>
  
CDATA;    
    }
  }
?>

  </main>
  <?php include('includes/footer.inc'); ?>
