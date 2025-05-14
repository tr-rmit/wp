<?php 
  $title='Home';
  include('includes/header.inc');
?>

<main>
<h1>Countries R Us</h1>

  <table class="table table-striped table-bordered">
    <thead class="table-dark">
    <tr>
      <th>Id</th><th>Owner</th><th>Country Name</th><th>Description</th><th>Image</th><th>Caption</th>
    </tr>
    </thead>
    <tbody>
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
    </tbody>
  </table>
  </main>
  <?php include('includes/footer.inc'); ?>