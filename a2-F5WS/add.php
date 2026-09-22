<?php 
  include('assets/includes/tools.inc');
  include('assets/includes/db_connect.inc');
  if ($_SERVER['REQUEST_METHOD'] == "POST")
    include('assets/includes/add_process.inc');
  $pageName = 'Add New Merch';
  $fileName = 'add.php';
  include_once('assets/includes/header.inc');
?>

  <main class="container-fluid">
    <div class="row p-3">
      <h1>Add Merch</h1>
      <div><?=  $status_message ?></div>  <!-- todo: style this message -->
      <form id="addForm" action="add.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" id="title" class="form-control w-100" value='<?= $title ?? '' ?>' required>
        </div>
        <div id="title-error-message" class="alert alert-danger mt-2" role="alert"><?= $errors['title'] ?? '' ?></div>
        
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea rows="3" cols="50" name="description" id="description" class="form-control w-100" value='<?= $description ?? '' ?>' required></textarea>
        </div>
        <div id="description-error-message" class="alert alert-danger mt-2" role="alert"><?= $errors['description'] ?? '' ?></div>

        <div class="mb-3">
          <label for="feature" class="form-label">Feature</label>
          <textarea rows="3" cols="50" name="feature" id="feature" class="form-control w-100" value='<?= $feature ?? '' ?>' required></textarea>
        </div>
        <div id="feature-error-message" class="alert alert-danger mt-2" role="alert"><?= $errors['feature'] ?? '' ?></div>
        
        <div class="mb-3">
          <label for="material" class="form-label">Material</label>
          <textarea rows="3" cols="50" name="material" id="material" class="form-control w-100" value='<?= $material ?? '' ?>' required></textarea>
        </div>
        <div id="material-error-message" class="alert alert-danger mt-2" role="alert"><?= $errors['material'] ?? '' ?></div>
        
        <div class="mb-3">
          <label for="material" class="form-label">Price</label>
          <div class="input-group">                  
            <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>
            <input type="number" name="price" id="price" required class="form-control" value='<?= $price ?? '' ?>' aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
              <span class="input-group-text">.00</span>
            </div>
          </div>
        </div>
        <div id="price-error-message" class="alert alert-danger mt-2" role="alert"><?= $errors['price'] ?? '' ?></div>
        
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" required class="form-control w-100">
            <option>Please Select</option>
            <option value="In Stock">In Stock</option>
            <option value="On Order">On Order</option>
            <option value="Sold Out">Sold Out</option>
          </select>
        </div>
        <div id="title-error-message" class="alert alert-danger mt-2" role="alert"><?= $errors['status'] ?? '' ?></div>
        
        <div class="mb-3">
          <label for="picture" class="form-label">Picture</label>
          <input type="file" name="picture" id="picture" class="form-control w-100">
        </div>
        
        <!-- Bootstrap-styled hidden error message -->
        <div id="error-message" class="alert alert-danger mt-2 d-none" role="alert">You did a bad thing!</div>
        <div class="mb-3">
          <input type=submit value="Add New Merch" class="btn btn-primary">
        </div>
      </form>
    </div>
  </main>

<?php include_once('assets/includes/footer.inc'); ?>  