<?php 
  if(empty($_GET['countryid'])) {
    header("Location: gallery.php");
    exit();
  }
  $title = 'Country';
  include('includes/header.inc'); 
?>

<main>  
  <h1>Country Details</h1>

<?php 
  $country = mysqli_query($conn, "select * from country where countryid='{$_GET['countryid']}'");
  $row = mysqli_fetch_assoc($country);
    echo <<<"CDATA"
    <div class="detail">
      <h3>{$row['countryname']}</h3>
      <img src="images/{$row['image']}" alt="{$row['caption']}">
      <p>{$row['description']}</p>
    </div>
  
CDATA;    
?>

  </main>
  <?php include('includes/footer.inc'); ?>
