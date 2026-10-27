<?php 
  include('includes/tools.inc');
  if(!isset($_SESSION['userid'])) {
   $_SESSION['failure'] = "You need to be logged in before you can edit a record";
    header('Location: login.php');
    exit();
  }
  if(!isset($_GET['merchid']) || is_int($_GET['merchid'])) {
    $_SESSION['failure'] = "No record selected, please select one from the table";
    header('Location: merch.php');
    exit();
  }
  include('includes/db_connect.inc');
  $status_message='';

  $merchid = ''; 
  $userid = ''; 
  $title = ''; 
  $description = ''; 
  $old_image_path = ''; 
  $feature = ''; 
  $material = ''; 
  $price = ''; 
  $status = '';

  $sql = "SELECT merchid, userid, Title, Description, Image_path, Feature, Material, Price, Status FROM merch where merchid=? and userid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) { 
    $_SESSION['failure'] = "Record unavailable, try selecting again from the table";
    header('Location: merch.php');
    exit();
  }

  $stmt->bind_param("ii", $_GET['merchid'], $_SESSION['userid']);
  $stmt->execute();
  $stmt->bind_result(
    $merchid, 
    $userid,
    $title,
    $description,
    $old_image_path,
    $feature, 
    $material,
    $price,
    $status
  );
  $stmt->execute();
  if(!$stmt->fetch()) {
    $_SESSION['failure'] = 'Hey ' . $_SESSION['username'] . ', that\'s not your book to edit!';
    header('Location: merch.php');
    exit();
  }
  $stmt->close();

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $dir_upload_images = __DIR__ . '/assets/images/merch/';
    //echo 'hey' . $dir_upload_images;
    include('includes/edit_process.inc');
  }
    
  $pageName = 'Edit Existing Merch';
  $fileName = 'edit.php';
  include_once('includes/header.inc');
?>

  <main class="container-fluid">
    <div class="row p-3">
      <h1>Edit Merch</h1>
      <?php showFlashAlerts(); ?>
      <div><?=  $status_message ?></div>  <!-- todo: style this message -->
      <form id="editForm" action="edit.php?merchid=<?= $merchid ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" id="title" class="form-control w-100" value='<?= $title ?? '' ?>' required>
        </div>
        <?php 
        /*if (!empty($errors['title']))
          alertBS('danger',$errors['title']); */ 
          if (!empty($errors['title']))
            echo <<<CDATA
        <div id="title-error-message" class="alert alert-danger mt-2" role="alert">{$errors['title']}</div>

CDATA;          
        ?>

        
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea rows="3" cols="50" name="description" id="description" class="form-control w-100" value='<?= $description ?? '' ?>' required><?= $description ?? '' ?></textarea>
        </div>
        <?php 
        /*if (!empty($errors['title']))
          alertBS('danger',$errors['title']); */ 
          if (!empty($errors['title']))
            echo <<<CDATA
        <div id="description-error-message" class="alert alert-danger mt-2" role="alert">{$errors['description']}</div>

CDATA;          
        ?>

        <div class="mb-3">
          <label for="feature" class="form-label">Feature</label>
          <textarea rows="3" cols="50" name="feature" id="feature" class="form-control w-100" value='<?= $feature ?? '' ?>' required><?= $feature ?? '' ?></textarea>
        </div>
        <div id="feature-error-message" class="alert alert-danger mt-2" role="alert"><?= $errors['feature'] ?? '' ?></div>
        
        <div class="mb-3">
          <label for="material" class="form-label">Material</label>
          <textarea rows="3" cols="50" name="material" id="material" class="form-control w-100" value='<?= $material ?? '' ?>' required><?= $material ?? '' ?></textarea>
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
            <optgroup label="Currently">
              <option value="<?= $status ?>" selected><?= $status ?></option>
            </optgroup>
            <optgroup label="All Options">
              <option value="In Stock">In Stock</option>
              <option value="On Order">On Order</option>
              <option value="Sold Out">Sold Out</option>
            </optgroup>
          </select>
        </div>
        <div id="title-error-message" class="alert alert-danger mt-2" role="alert"><?= $errors['status'] ?? '' ?></div>
        
        <div class="mb-2">
          <label for="picture" class="form-label">Picture</label>
          <input type="file" name="picture" id="picture" class="form-control w-100">
        </div>
        <div class="mb-3">
          <label class="form-label">Currently This Image</label><br>
          <img width="200" src="assets/images/merch/<?= $old_image_path ?>" alt="<?= $description ?>">
        </div>
        
        <!-- Bootstrap-styled hidden error message -->
        <div id="error-message" class="alert alert-danger mt-2 d-none" role="alert">You did a bad thing!</div>
        <div class="mb-3">
          <input type=submit value="Edit New Merch" class="btn btn-primary">
        </div>
      </form>
    </div>
  </main>

<?php include_once('includes/footer.inc'); ?>  