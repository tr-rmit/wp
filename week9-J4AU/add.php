<?php 
  $title = 'Add More';
  include('includes/header.inc'); 
?>

<main>  
  <h1>Add A Country</h1>

  <form method="post" action="add.php" enctype="multipart/form-data">
  <p><label>Country Name<br>
    <input type="text" placeholder="Country Name" id="name" name="name"></label></p>
  <p><label>Description<br>
    <textarea placeholder="Describe the Country" id="description" name="description"></textarea>
  </label></p>
  <p><label>Select an Image<br>
    <input type="file" id="image" name="image">
  </label></p>
  <p><label>Image Caption<br>
    <input type="text" placeholder="Describe the image" id="caption" name="caption">
  </label></p>
  <p><button>Insert</button></p>

  </form>

  </main>
  <?php include('includes/footer.inc'); ?>
