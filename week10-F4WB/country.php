<?php 
  if (empty($_GET['countryid'])) {
    header('Location: gallery.php');
    exit();
  }
  $countryid = htmlentities(trim($_GET['countryid']));

  $title='Country';
  include('includes/header.inc');
?>

  <main>
    <h1>Country Details</h1>

    <div id="detail">
<?php 
  // $country = mysqli_query($conn, "select * from country where countryid='{$_GET['countryid']}'");
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
      <h3>{$row['countryname']}</h3>
      <img src="userimages/{$row['image']}" alt="{$row['caption']}">
      <p>{$row['description']}</p>

CDATA;      
    }
  } else {
    echo "      <p>Sorry, no country found with that countryid.</p>";
  }
  /*
    b i d s
    d i b s
  */

?>

    </div>
  </main>
<?php include('includes/footer.inc'); ?>