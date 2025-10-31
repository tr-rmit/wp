<?php
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Home';
include('includes/header.inc');
?>
  <main class="container">
    <h2><?= $title ?></h2>
    <table class="table table-striped table-hover"> <!--  table-striped -->
<?php
    try {
      $sql = "select * from country left join users on country.userid = users.userid";
      $countries = mysqli_query($conn, $sql);  
      // preshow($row);
    } catch (Exception $ex) {
      echo 'Error: ' .$ex->getMessage();
      die();
    } 
    $firstRun = true;
    while($row = mysqli_fetch_assoc($countries)) {
      unset($row['password']); // don't show this field!
      if($firstRun) {
        echo "    <tr>\n";
        foreach($row as $colname => $value ) {
          echo "      <th>$colname</th>\n";
        }
        if (!empty($_SESSION['userid'])) {
          echo "      <th colspan='2'>Make Changes</th>\n";
          echo "    </tr>\n";
        }
        $firstRun = false;
      }
      echo "    <tr>\n";
      foreach($row as $colname => $value ) {
        echo "      <td>$value</td>\n";
      }
      if (!empty($_SESSION['userid'])) {
        echo "      <td><a class='btn btn-primary' href='update_form.php?countryid={$row['countryid']}'>Update</a></td>\n";
        echo "      <td><a class='btn btn-danger' href='delete_confirm.php?countryid={$row['countryid']}'>Delete</a></td>\n";
        echo "    </tr>\n";
      }
    }
?>
    </table>
  </main>

<?php
include('includes/footer.inc');
?>