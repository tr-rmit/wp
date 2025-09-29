<?php
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Home';
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
    <table class="table table-striped table-hover"> <!--  table-striped -->
<?php
    try {
      $countries = mysqli_query($conn, "select * from country");  
      // preshow($row);
    } catch (Exception $ex) {
      echo 'Error: ' .$ex->getMessage();
      die();
    } 
    $firstRun = true;
    while($row = mysqli_fetch_assoc($countries)) {
      if($firstRun) {
        echo "    <tr>\n";
        foreach($row as $colname => $value ) {
          echo "      <th>$colname</th>\n";
        }
        echo "    </tr>\n";
        $firstRun = false;
      }
      echo "    <tr>\n";
      foreach($row as $colname => $value ) {
        echo "      <td>$value</td>\n";
      }
      echo "    </tr>\n";
    }
?>
    </table>

  </main>

<?php
include('includes/footer.inc');
?>