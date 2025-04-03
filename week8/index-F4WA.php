<?php include('includes/db_connect.inc'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Countries R Us</title>
</head>
<body>
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
    echo "<tr>";
    foreach($row as $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  //preshow($rows);


?>  
</table>
</body>
</html>