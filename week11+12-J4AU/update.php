<?php 
  if(empty($_GET['countryid'])) {
    header("Location: modify_table.php");
    exit();
  }
  $countryid = htmlentities(trim($_GET['countryid']));
  $title = 'Update Existing';
  include('includes/header.inc'); 
?>

<main>  
  <h1>Update A Country</h1>

  <?php
    $sql = "select * from country where countryid = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      exit("prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $countryid);
    $stmt->execute();
    $rows = $stmt->get_result();
    if ($rows->num_rows > 0) :
      foreach($rows as $row) { ?>
  
  <form method="post" action="update_process.php" enctype="multipart/form-data">
    <input type="hidden" name="countryid" value="<?= $row['countryid'] ?>">
    <p><label>Country Name<br>
      <input type="text" placeholder="Country Name" id="name" name="countryname" value="<?= $row['countryname'] ?>"></label></p>
    <p><label>Description<br>
      <textarea placeholder="Describe the Country" id="description" name="description"><?= $row['description'] ?></textarea>
    </label></p>
    <p><label>Select an Image<br>
      <span><?= $row['image'] ?></span><br>
      <input type="file" id="image" name="image">
    </label></p>
    <p><label>Image Caption<br>
      <input type="text" placeholder="Describe the image" id="caption" name="caption" value="<?= $row['caption'] ?>">
    </label></p>
    <p><button>Update</button></p>

  </form>

<?php } else: ?>

  <p>☠️ No Records Found. Return to <a href="modify_table.php">modify table page</a>.</p>
  
<?php endif; ?>  
  </main>
  <?php include('includes/footer.inc'); ?>
