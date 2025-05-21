<?php 
  session_start();
  if (empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
  }
  $title='Modify Table';
  include('includes/header.inc');
?>

<main>
<h1>Countries R Us</h1>

  <table id="modifytable">
  <tr>
    <th>Id</th><th>Name</th><th>Image</th><th colspan="2">Make Changes</th>
  </tr>

<?php 
  $sql = "select * from country where username = ?";
  //die($sql);
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
  }  
  $stmt->bind_param("s", $_SESSION['user']['username']); 
  $stmt->execute();
  $rows = $stmt->get_result();
  if ($rows->num_rows > 0) {
    foreach($rows as $row) {
      echo <<<"CDATA"
    <tr>
      <td>{$row['countryid']}</td>
      <td>{$row['countryname']}</td>
      <td><img width="150" src="userimages/{$row['image']}" alt="{$row['caption']}"</td>
      <td><a href="update.php?countryid={$row['countryid']}">Modify</a></td>
      <td><a href="delete.php?countryid={$row['countryid']}">Delete</a></td>
    </tr>

CDATA;
    } 
  } else {
    echo "<tr><td colspan=\"5\">No countries found in your account.</td></tr>";
  }
?>

  </table>
  </main>
  <?php include('includes/footer.inc'); ?>