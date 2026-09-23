<?php 
  include_once('includes/tools.inc');
  include_once('includes/db_connect.inc');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    include_once('includes/add_process.inc');
  $pageTitle = 'Add New Merch';
  $fileName = 'add.php';
  include_once('includes/header.inc'); 
?>

  <main class="container-fluid">
    <div class="row p-3">
      <h1>Add Merch</h1>
      <div><?= $status_message ?? '' ?></div>
      <form id="addForm" action="add.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" id="title" class="form-control w-100" value="<?=  $title ?? '' ?>" required>
          <div id="error-message-title" class="alert alert-danger mt-2" role="alert">
            <?=  $errors['title'] ?? ''  ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea rows="3" cols="50" name="description" id="description" class="form-control w-100" required><?=  $description ?? '' ?></textarea>
          <div id="error-message-description" class="alert alert-danger mt-2" role="alert">
            <?=  $errors['description'] ?? ''  ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="feature" class="form-label">Feature</label>
          <textarea rows="3" cols="50" name="feature" id="feature" class="form-control w-100" required><?=  $feature ?? '' ?></textarea>
          <div id="error-message-feature" class="alert alert-danger mt-2" role="alert">
            <?=  $errors['feature'] ?? ''  ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="material" class="form-label">Material</label>
          <textarea rows="3" cols="50" name="material" id="material" class="form-control w-100" required><?=  $material ?? '' ?></textarea>
          <div id="error-message-material" class="alert alert-danger mt-2" role="alert">
            <?=  $errors['material'] ?? ''  ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <div class="input-group">                  
            <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>
            <input type="number" name="price" id="price" required class="form-control" value="<?=  $price ?? '' ?>" aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>
          <div id="error-message-price" class="alert alert-danger mt-2" role="alert">
            <?=  $errors['price'] ?? ''  ?>
          </div>        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" required class="form-control w-100">
            <option>Please Select</option>
            <option value="In Stock">In Stock</option>
            <option value="On Order">On Order</option>
            <option value="Sold Out">Sold Out</option>
          </select>
          <div id="error-message-status" class="alert alert-danger mt-2" role="alert">
            <?=  $errors['status'] ?? ''  ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="picture" class="form-label">Picture</label>
          <input type="file" name="picture" id="picture" class="form-control w-100">
          <div id="error-message-picture" class="alert alert-danger mt-2" role="alert">
            <?=  $errors['picture'] ?? ''  ?>
          </div>
        </div>
        <!-- Bootstrap-styled hidden error message -->
        <div id="error-message" class="alert alert-danger mt-2 d-none" role="alert">You did a bad thing!</div>
        <div class="mb-3">
          <input type=submit value="Add New Merch" class="btn btn-primary">
        </div>
      </form>
    </div>
  </main>


<?php include_once('includes/footer.inc'); ?>