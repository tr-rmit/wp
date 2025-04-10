<?php 
  $title='Gallery';
  include('includes/header.inc');
?>

  <main>
    <h1>Countries Gallery</h1>

    <div id="gallery">
<?php 
  $countries = mysqli_query($conn, "select * from country");
  while($row = mysqli_fetch_assoc($countries)) {
  echo <<<"CDATA"
      <div class="gallery-item">
        <h3>{$row['countryname']}</h3>
        <img src="images/{$row['image']}" alt="images/{$row['caption']}">
        <p><a href="country.php?countryid={$row['countryid']}">Read More</a></p>
      </div>

CDATA;
  }
?>
    </div>
  </main>
<?php include('includes/footer.inc'); ?>