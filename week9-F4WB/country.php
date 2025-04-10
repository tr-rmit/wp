<?php 
  if (empty($_GET['countryid'])) {
    header('Location: gallery.php');
    exit();
  }
  $title='Country';
  include('includes/header.inc');
?>

  <main>
    <h1>Country Details</h1>

    <div id="detail">
<?php 
  $country = mysqli_query($conn, "select * from country where countryid='{$_GET['countryid']}'");
  $row = mysqli_fetch_assoc($country);
  echo <<<"CDATA"
      <h3>{$row['countryname']}</h3>
      <img src="images/{$row['image']}" alt="images/{$row['caption']}">
      <p>{$row['description']}</p>

CDATA;

?>
    </div>
  </main>
<?php include('includes/footer.inc'); ?>