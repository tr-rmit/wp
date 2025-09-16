<?php
$title = 'Countries';
include('includes/tools.inc');
include('includes/db_connect.inc');
include('includes/header.inc');
?>
  <main>
    <h1><?= $title ?></h1>
    <p>Welcome to the countries Table</p>
    <table>
<?php 
  $countries = mysqli_query($conn, "select * from country");
  $firstRun = true;
  while($row = mysqli_fetch_assoc($countries)) {
    if($firstRun) {
      echo "      <tr>\n";   
      foreach($row as $colname => $value) {
        echo "        <th>$colname</th>\n"; 
      }
      echo "      </tr>\n";
      $firstRun = false;
    }
    // preshow($row);
    echo "      <tr>\n"; 
    foreach($row as $colname => $value) {
      echo "        <td>$value</td>\n"; 
    }
    echo "      </tr>\n";
  }

?>    
    </table>
    <div id="gallery" class="container">
      <div class="gallery-item col-12 col-md-6 col-lg-4 text-center">
        <h3>[[ title ]]</h3>
        <img class="img-fluid img-thumbnail gallery-img" src="../images/[[ image ]]" width="160" height="45" alt="[[ caption ]]" data-bs-toggle="modal" data-bs-target="#imageModal">
        <p>[[ description ]]</p>
      </div>
      
    
<?php  
$countries = mysqli_query($conn, "select * from country");
while($row = mysqli_fetch_assoc($countries)) {
  // preshow($row);
  echo <<<"CDATA"
       <div class="gallery-item col-12 col-md-6 col-lg-4 text-center">
          <h3>{$row['countryname']}</h3>
          <img class="img-fluid img-thumbnail gallery-img" src="../images/{$row['image']}" width="160" height="45" alt="{$row['caption']}" data-bs-toggle="modal" data-bs-target="#imageModal">
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