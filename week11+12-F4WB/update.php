<?php 
  if (empty($_GET['countryid'])) {
    header('Location: modify_table.php');
    exit();
  }
  $countryid = htmlentities(trim($_GET['countryid']));
  $title='Modify Existing';
  include('includes/header.inc');
?>

  <main>
    <h1>Modify a Country</h1>
<?php
  $sql = "select * from country where countryid = ?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("prepare failed: " . $conn->error);
  }  
  $stmt->bind_param("i", $countryid); 
  $stmt->execute();
  $rows = $stmt->get_result();
  if ($rows->num_rows > 0):
    foreach($rows as $row) { ?>

    <form method="post" action="update_process.php"  enctype="multipart/form-data">
      <p><label>Country Name<br>
        <input type="hidden" name="countryid" value="<?= $countryid ?>">
        <input type="text" placeholder="Country Name" id="countryname" name="countryname" value="<?= $row['countryname'] ?>">
      </label></p>
      <p><label>Description<br>
        <textarea placeholder="Describe the Country" id="description" name="description"><?= $row['description'] ?></textarea>
      </label></p>
      <p><label>Select an Image<br>
        <i>... currently <?= $row['image'] ?></i><br>
        <input type="file" id="image" name="image">
      </label></p>
      <p><label>Image Caption<br>
        <input type="text" placeholder="Describe the image" id="caption" name="caption" value="<?= $row['caption'] ?>">
      </label></p>
      <p><button>Update</button></p>
    </form>

<?php }  else: ?>

  <p>Sorry, no country found with that countryid.</p>

<?php endif; ?>  

  </main>
<?php include('includes/footer.inc'); ?>