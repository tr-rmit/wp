<?php 
  if(!isset($_GET['countryid'])) {
    header("Location: gallery.php");
    exit();
  }
  $title = 'Country';
  include('includes/header.inc'); 
?>
<main>
  <h1>Country Detail</h1>

<?php
/*
  $countries = mysqli_query($conn, "select * from country");
  
  while($row = mysqli_fetch_assoc($countries)) {
    echo <<<"CDATA"
    <div class="gallery-item">
      <h3>{$row['countryname']}</h3>
      <img src="images/{$row['image']}" alt="{$row['caption']}">
      <p><a href="country.php?id={$row['countryid']}">Read More</a></p>
    </div>

CDATA;    

  }
*/
?>

</main>
<?php include('includes/footer.inc'); ?>