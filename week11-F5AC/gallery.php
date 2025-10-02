<?php
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Gallery';
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
    <div id="gallery" class="row">
<?php
    try {
      $countries = mysqli_query($conn, "select * from country");
      // preshow($row);
    } catch (Exception $ex) {
      echo 'Error: ' .$ex->getMessage();
      die();
    }
    while($row = mysqli_fetch_assoc($countries)) {

      echo <<<"CDATA"
      <div class="col-12 col-md-6 col-lg-4 text-center">
        <h3>{$row['countryname']}</h3>
        <img class="img-fluid img-thumbnail gallery-img" src="../images/userimages/{$row['image']}" width="250"
            alt="{$row['caption']}" data-bs-toggle="modal" data-bs-target="#imageModal">
        <p>{$row['description']}</p>
        <p><a href="details.php?countryid={$row['countryid']}">Read More</a></p>
      </div>

CDATA;
    }
?>
    </div>
  </main>

<?php
include('includes/footer.inc');
?>
