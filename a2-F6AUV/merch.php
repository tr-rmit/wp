<?php
  include_once('includes/tools.inc');
  include_once('includes/db_connect.inc');
  $pageTitle = 'Merch';
  $fileName = 'merch.php';
  include_once('includes/header.inc'); 
?>

  <main class="container-fluid">
    <div class="row p-3">
      <h1>Merch</h1>
      <?php showFlashAlerts(); ?>
      <table class="table table-striped table-hover">
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Price</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        <!-- Hard coded rows
        <tr>
          <td><a href='#'>Asgardian Mead Stein</a></td>
          <td>A heavy, Viking-style drinking horn and stein combo etched with runes of Odin.</td>
          <td>$3,500</td>
          <td>On Order</td>
        </tr>
        <tr>
          <td><a href='#'>Bifrost VR Headset</a></td>
          <td>A virtual reality headset styled after Heimdall's armor with a glowing iridescent rainbow visor.</td>
          <td>$1,500</td>
          <td>In Stock</td>
        </tr>
        <tr>
          <td><a href='#'>Eye of Agamotto Desk Clock</a></td>
          <td>A heavy brass and bronze pendant mounted on an obsidian stand that acts as a fully functional mechanical desk clock.</td>
          <td>$750</td>
          <td>Sold Out</td>
        </tr>
        <tr>
          <td><a href='#'>Jarvis Smart-Home Projector</a></td>
          <td>A desktop holographic projector shaped like Tony Stark’s classic Mark II helmet core.</td>
          <td>$5,000</td>
          <td>In Stock</td>
        </tr> -->  
        <!-- Dynamic from database rows -->  
<?php         
  $sql = "SELECT * FROM merch";
  $result = mysqli_query($conn, $sql); 

  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      // preshow($row);
      $formattedPrice = statusToBadge($row['Price']);
      $tdEditDelete = '';
      if(isset($_SESSION['userid']) && $_SESSION['userid'] == $row['userid'] ?? 0)
        $tdEditDelete = '<a class="btn btn-primary" href="edit.php?merchid=' . $row['merchid'] . '">Edit</a> <button type="button" class="btn btn-danger">Delete</button>';      
      echo <<<"MERCHITEM"
        <tr>
          <td><a href='details.php?merchid={$row['merchid']}'>{$row['Title']}</a></td>
          <td>{$row['Description']}</td>
          <td>\$$formattedPrice</td>
          <td>{$row['Status']}</td>
          <td>$tdEditDelete</td>
        </tr>
MERCHITEM;

    }
  }
?>
      </table>
    </div>
  </main>

<?php include_once('includes/footer.inc'); ?>