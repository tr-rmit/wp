<?php 
  include_once('includes/tools.inc');
  if(!isset($_SESSION['userid'])) { 
    $_SESSION['failure'] = 'You need to log in before you can edit records.';
    header('Location: login.php');
  }
  if(!isset($_GET['merchid']) || is_int($_GET['merchid'])) {
    $_SESSION['failure'] = "No record selected, please select one from the table";
    header('Location: merch.php');
    exit();
  }  

  include_once('includes/db_connect.inc');

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
    $_SESSION['failure'] = "Record unavailable, try selecting again from the table.";
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

  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    include_once('includes/edit_process.inc');
  $pageTitle = 'Edit Existing Merch';
  $fileName = 'edit.php';
  include_once('includes/header.inc'); 
?>

  <main class="container-fluid">
    <div class="row p-3">
      <h1>Edit Merch</h1>
      <?= showFlashAlerts() ?>
      <form id="editForm" action="edit.php?merchid=<?= $merchid ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" id="title" class="form-control w-100" value="<?=  $title ?? '' ?>" required>
<?php          
          if (!empty($errors['title']))
            echo <<<CDATA
        <div id="title-error-message" class="alert alert-danger mt-2" role="alert">{$errors['title']}</div>
CDATA;

?>

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
            <optgroup label="Currently">
              <option selected value="<?= $status ?>"><?= $status ?></option>
            </optgroup>
            <optgroup label="Available">
              <option value="In Stock">In Stock</option>
              <option value="On Order">On Order</option>
              <option value="Sold Out">Sold Out</option>
            </optgroup>
          </select>
          <div id="error-message-status" class="alert alert-danger mt-2" role="alert">
            <?=  $errors['status'] ?? ''  ?>
          </div>
        </div>
        <div class="mb-1">
          <label for="picture" class="form-label">Picture</label>
          <input type="file" name="picture" id="picture" class="form-control w-100">
        </div>
        <div class="mb-3">
          <label class="form-label">Currently</label><br>
          <img width="200" src="assets/images/merch/<?= $old_image_path ?>" alt="<?= $description ?>">
          <div id="error-message-picture" class="alert alert-danger mt-2" role="alert">
            <?=  $errors['picture'] ?? ''  ?>
          </div>
        </div>
        <!-- Bootstrap-styled hidden error message -->
        <div id="error-message" class="alert alert-danger mt-2 d-none" role="alert">You did a bad thing!</div>
        <div class="mb-3">
          <input type=submit value="Update Merch" class="btn btn-primary">
        </div>
      </form>
    </div>
  </main>


<?php include_once('includes/footer.inc'); ?>