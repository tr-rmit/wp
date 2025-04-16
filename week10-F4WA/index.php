<?php 
  $title = 'Home';
  include('includes/header.inc'); 
?>
<main>
  <h1>Countries R Us</h1>

  <table>
  <tr>
    <th>Id</th><th>Name</th><th>Description</th><th>Image</th><th>Caption</th>
  </tr>
<?php

  $countries = mysqli_query($conn, "select * from country");
  
  while($row = mysqli_fetch_assoc($countries)) {
    //preshow($row);
    $rows[] = $row;
    echo "  <tr>\n";
    foreach($row as $value) {
      echo "    <td>$value</td>\n";
    }
    echo "  </tr>\n";
  }
  //preshow($rows);

?>  
</table>
</main>
<?php include('includes/footer.inc'); ?>