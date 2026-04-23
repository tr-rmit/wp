<?php
  include_once("assets/includes/tools.inc");
  include_once("assets/includes/db_connect.inc");
  if(!isLoggedIn()) {
    /* redirect them to the login page */
    exit();
  }
  
  $title = "Add Book";
  include_once("assets/includes/header.inc");
  include_once("assets/includes/nav.inc");

  /* Bonus exercise for advanced adventurous students (part 1) ...

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // pop most of the insert.php code here
  }

  */
?>

        <main>
          <h1><?=  $title ?></h1>
          <!-- 
          Bonus exercise for advanced adventurous students (part 2) ...
           
          Change action to add.php to turn this form into a processing script and insert records  
          -->
          <form id="uploadForm" action="insert.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control w-50" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control w-50" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input list="statuses" name="status" id="status" class="form-control w-50" required>
                <datalist id="statuses">
                  <option value="Shelved">
                  <option value="Available">
                  <option value="Unavailable">
                </datalist>
            </div>
            <div class="mb-3">
                <label for="published" class="form-label">Year Published</label>
                <input type="number" name="published" id="published" required class="form-control w-50">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Synopsis</label>
                <textarea rows="10" cols="50" name="description" id="description" class="form-control w-50"
                    required></textarea>
            </div>
            <div class="mb-3">
                <label for="file01" class="form-label">Supporting Files</label>
                <input type="file" name="file01" id="file01" class="form-control w-50">
            </div>
            <!-- Bootstrap-styled hidden error message -->
            <div id="error-message" class="alert alert-danger mt-2 d-none" role="alert">You did a bad thing!</div>
            <div class="mb-3">
                <input type=submit value="Add New Book" class="btn btn-primary">
            </div>
          </form>
        </main>
<?php 
  include("assets/includes/footer.inc");
?>        
