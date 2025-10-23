<?php
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Countries';
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
    <h2>Table View</h2>
    <table class="table table-striped table-hover"> <!--  table-striped -->
<?php
    try {
      $countries = mysqli_query($conn, "select * from country");  
      // preshow($row);
    } catch (Exception $ex) {
      echo 'Error: ' .$ex->getMessage();
      die();
    } 
    $firstRun = true;
    while($row = mysqli_fetch_assoc($countries)) {
      if($firstRun) {
        echo "    <tr>\n";
        foreach($row as $colname => $value ) {
          echo "      <th>$colname</th>\n";
        }
        echo "    </tr>\n";
        $firstRun = false;
      }
      echo "    <tr>\n";
      foreach($row as $colname => $value ) {
        echo "      <td>$value</td>\n";
      }
      echo "    </tr>\n";
    }
?>
    </table>
    <h2>Gallery View</h2>
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
        <img class="img-fluid img-thumbnail gallery-img" src="../images/{$row['image']}" width="250"
            alt="{$row['caption']}" data-bs-toggle="modal" data-bs-target="#imageModal">
        <p>{$row['description']}</p>
      </div>

CDATA;
    }
?>
    </div>
  </main>

<?php
include('includes/footer.inc');
?>