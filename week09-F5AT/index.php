<?php
$title = 'Countries';
include('includes/tools.inc');
include('includes/db_connect.inc');
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
    <h2>Table View</h2>
    <table class="table table-striped table-hover"> <!--  table-striped -->
<?php
  try {
    $countries = mysqli_query($conn, "select * from country");
    //preshow($countries);
    $firstRun = true;
    $row;
    while($row = mysqli_fetch_assoc($countries)) {
      if ($firstRun) {
        echo "      <tr>\n"; 
        foreach($row as $colname => $value) {
          echo "        <th>".ucwords($colname)."</th>\n"; 
        }
        echo "      </tr>\n";
        $firstRun = false;
      }
      echo "      <tr>\n"; 
      foreach($row as $colname => $value) {
        echo "        <td>$value</td>\n"; 
      }
      echo "      </tr>\n";
    }
?> 
    </table> 
    <h2>Gallery View</h2>
    <div id="gallery" class="row">
<?php    
    $countries = mysqli_query($conn, "select * from country");
    $row = mysqli_fetch_assoc($countries);
    while($row = mysqli_fetch_assoc($countries)) {
      echo <<<"CDATA"
      <div class="col-12 col-md-6 col-lg-4 text-center">
        <h3>{$row['countryname']}</h3>
        <img class="img-fluid img-thumbnail gallery-img" src="../images/{$row['image']}" alt="{$row['caption']}" data-bs-toggle="modal" data-bs-target="#imageModal">
        <p>{$row['description']}</p>
      </div>
CDATA;
    }
  } catch (Exception $ex) {
    echo 'Error: ' .$ex->getMessage();
  }
?> 
    </div>
    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img id="modalImage" class="img-fluid " src="" alt="Large Book Cover">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php
include('includes/footer.inc');
?>