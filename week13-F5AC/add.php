<?php
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Add Country';
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
    <form method="post" action="insert.php" enctype="multipart/form-data">
    <div class="form-group">
        <label>Country Name:</label>
        <input type="text" name="countryname" class="form-control">
        <label>Description:</label>
        <textarea cols="50" rows="5" name="description" class="form-control"></textarea>
        <label>Select an Image:</label>
        <input type="file" name="image" class="form-control">
        <label>Image Caption:</label>
        <input type="text" name="caption" class="form-control">
    </div>
    <input type="submit" name="submit" value="Insert" class="btn btn-primary">
</form>

  </main>

<?php
include('includes/footer.inc');
?>