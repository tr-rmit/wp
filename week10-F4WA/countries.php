<?php 
  $title = 'Countries';
  include('includes/header.inc'); 
?>
<main>
  <h1>Countries in a table</h1>

  <table>
  <tr>
    <th>Name</th><th>Image</th><th>Caption</th>
  </tr>
<?php

  $countries = mysqli_query($conn, "select * from country");
  
  while($row = mysqli_fetch_assoc($countries)) {
    echo <<<"MINECRAFT"
      <tr>
        <td><a href="country.php?countryid={$row['countryid']}">{$row['countryname']}</a></td>
        <td><img width="100" src="userimages/{$row['image']}" alt="{$row['caption']}"></td>
        <td>{$row['caption']}</td>
      </tr>

MINECRAFT;      
  }

?>  
</table>
</main>
<?php include('includes/footer.inc'); ?>