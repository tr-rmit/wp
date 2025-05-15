<?php 
  $title='Home';
  include('includes/header.inc');
?>

<main class="container">
<h1>Countries R Us</h1>
  
  <!--div class="container"-->
  <table class="table table-bordered table-striped">
  <tr class="table-dark">
    <th>Id</th><th>Author</th><th>Name</th><th>Description</th><th>Image</th><th>Caption</th>
  </tr>

<?php 
  $countries = mysqli_query($conn, "select * from country");
  while($row = mysqli_fetch_assoc($countries)) {
    // preshow($row);
    echo "<tr>";
    foreach($row as $colvalue) {
      echo "<td>$colvalue</td>";
    }
    echo "</tr>";
  }
?>

  </table>
  <!--/div-->
  </main>
  <?php include('includes/footer.inc'); ?>