<?php
  if (empty($_GET['countryid'])) {
    header("Location: index.php");
    exit();
  }
  include('includes/tools.inc');
  include('includes/db_connect.inc');
  $title = 'Update Country';
  include('includes/header.inc');
?>
  <main class="container">
  <h1><?= $title ?></h1>

<?php  
  $countryid = htmlentities(trim($_GET['countryid']));
  $sql = "select * from country where countryid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
      exit("prepare failed: " . $conn->error);
  }
  $stmt->bind_param("i", $countryid);
  $stmt->execute();
  $records = $stmt->get_result();
  foreach ($records as $row) {
?>
    <form method="post" action="update_process.php" enctype="multipart/form-data">
      <div class="form-group">
        <input type="hidden" name="countryid" value="<?= $row['countryid'] ?>">
        <label>Country Name:</label>
        <input type="text" name="countryname" class="form-control" value="<?= $row['countryname'] ?>">
        <label>Description:</label>
        <textarea cols="50" rows="5" name="description" class="form-control"><?= $row['description'] ?></textarea>
        <label>Select an Image:</label>
        <span><?= $row['image'] ?></span>
        <input type="file" name="image" class="form-control"> 
        <label>Image Caption:</label>
        <input type="text" name="caption" class="form-control" value="<?= $row['caption'] ?>">
      </div>
      <input type="submit" name="submit" value="Update" class="btn btn-primary">
      <!--button type="submit" class="btn btn-primary" name="countryid" value="<?= $row['countryid'] ?>">Update</button-->      
    </form>
<?php } ?>
  </main>

<?php
include('includes/footer.inc');
?>