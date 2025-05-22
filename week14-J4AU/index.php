<?php 
  $title='Home';
  include('includes/header.inc');
  $rows=[];
  $countries = mysqli_query($conn, "select * from country");
  while($row = mysqli_fetch_assoc($countries)) {
    $rows[] = $row;
  }
?>

<main class="container">
  <h1>Countries R Us</h1>

  <div id="masthead">
    <!-- Carousel goes on the left -->
    <div id="featuredimages" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
    <!-- Hard Code Template  
      <button type="button" data-bs-target="#featuredimages" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#featuredimages" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#featuredimages" data-bs-slide-to="2"></button>
    -->
    <?php
    $activeClass = ' class="active"';
    foreach ($rows as $r => $row) {
    echo '      <button type="button" data-bs-target="#featuredimages" data-bs-slide-to="'.$r.'"'.$activeClass.'></button>'."\n";
    $activeClass = '';
    }
    ?>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
    <!-- Hard Code Template
      <div class="carousel-item active">
        <img src="userimages/australia.jpg" alt="Los Angeles" class="d-block w-100">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>We had such a great time in LA!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="userimages/indonesia.jpg" alt="Chicago" class="d-block w-100">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div> 
      </div>
      <div class="carousel-item">
        <img src="userimages/canada.jpg" alt="New York" class="d-block w-100">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>  
      </div> 
      -->
    <?php
    $activeClass = 'active';
    foreach ($rows as $r => $row) {
    echo <<<"CDATA"
      <div class="carousel-item $activeClass">
        <img src="userimages/{$row['image']}" alt="{$row['caption']}" class="d-block w-100">
        <div class="carousel-caption">
          <h3>{$row['countryname']}</h3>
          <p>by {$row['username']}</p>
        </div>
      </div>    

    CDATA;
    $activeClass = '';
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
    </div> <!-- end Carousel -->  
    <div id="corpbanner">
      <h1>Countries R Us</h1>
      <h2>We do Countries Well</h2>
    </div>
  </div>
  
  <table class="table table-striped table-bordered">
  <tr class='table-dark'>
    <th>Id</th><th>Author</th><th>Name</th><th>Description</th><th>Image</th><th>Caption</th>
  </tr>

<?php 
  
  foreach($rows as $row) {
    //preshow($row);
    echo "<tr>";
    foreach($row as $colvalue) {
      echo "<td>$colvalue</td>";
    }
    echo "</tr>";
  }
?>

  </table>
  </main>
  <?php include('includes/footer.inc'); ?>