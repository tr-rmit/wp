<?php 
  $title = 'Modify Existing';
  include('includes/header.inc'); 
?>

<main>  
  <h1>Countries R Us</h1>

  <table id="modifytable">
  <tr>
    <th>Id</th><th>Name</th><th>Image</th><th colspan="2">Make Changes</th>
  </tr>
<?php 
  $countries = mysqli_query($conn, "select * from country");

  while($row = mysqli_fetch_assoc($countries)) {
    // preshow($row);
    echo <<<"CDATA"
  <tr>
    <td>{$row['countryid']}</td>
    <td>{$row['countryname']}</td>
    <td><img width="150" src="userimages/{$row['image']}" alt="{$row['caption']}"></td>
    <td><a href="update.php?countryid={$row['countryid']}">Update</a></td>
    <td><a href="delete.php?countryid={$row['countryid']}">Delete</a></td>
  </tr>

CDATA;
  }
?>

  </table>
  </main>
  <?php include('includes/footer.inc'); ?>
