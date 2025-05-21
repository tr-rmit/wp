<?php 
  $title='Home';
  include('includes/header.inc');
  $rows=[];
  $countries = mysqli_query($conn, "select * from country");
  while($row = mysqli_fetch_assoc($countries)) {
    // preshow($row);
    $rows[] = $row;
  }
  //preshow($rows);
  //die();
?>


<main class="container">
  <div id="masthead">
    <div id="featuredimages" class="carousel slide" data-bs-ride="carousel">

      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <!--  
        <button type="button" data-bs-target="#featuredimages" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#featuredimages" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#featuredimages" data-bs-slide-to="2"></button>
        -->
<?php 
          $activeclass = ' class="active"';
          foreach ($rows as $r => $row) {
            echo '        <button type="button" data-bs-target="#featuredimages" data-bs-slide-to="'.$r.'"'.$activeclass.'></button>'."\n";
            $activeclass = '';
          }
?>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
      <!-- 
      
        <div class="carousel-item active">
          <img src="userimages/australia.jpg" alt="Los Angeles" class="d-block w-100">
          <div class="carousel-caption">
            <h3>Los Angeles</h3>
            <p>We had such a great time in LA!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="userimages/canada.jpg" alt="Chicago" class="d-block w-100">
          <div class="carousel-caption">
            <h3>Chicago</h3>
            <p>Thank you, Chicago!</p>
          </div> 
        </div>
        <div class="carousel-item">
          <img src="userimages/etosha.jpg" alt="New York" class="d-block w-100">
          <div class="carousel-caption">
            <h3>New York</h3>
            <p>We love the Big Apple!</p>
          </div>  
        </div>

      -->
<?php  
  $activeclass = 'active';
  foreach ($rows as $row) {
    echo <<<"CDATA"
        <div class="carousel-item $activeclass">
          <img src="userimages/{$row['image']}" alt="{$row['caption']}" class="d-block w-100">
          <div class="carousel-caption">
            <h3>{$row['countryname']}</h3>
            <p>by {$row['username']}</p>
          </div>  
        </div>

CDATA;
    $activeclass = '';
  }
?>
      </div>


     <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#featuredimages" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#featuredimages" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div> <!-- carousel? -->
    <div id="corpbanner">
      <h1>Countries R Us</h1>
      <h2>We do Countries Well</h2>
    </div>
  </div> <!-- masthead -->
  
  <table class="table table-striped table-bordered">
    <thead class="table-dark">
    <tr>
      <th>Id</th><th>Owner</th><th>Country Name</th><th>Description</th><th>Image</th><th>Caption</th>
    </tr>
    </thead>
    <tbody>
<?php 
  foreach($rows as $row) {
    echo "<tr>";
    foreach($row as $colvalue) {
      echo "<td>$colvalue</td>";
    }
    echo "</tr>";
  }
?>
    </tbody>
  </table>
  </main>
  <?php include('includes/footer.inc'); ?>