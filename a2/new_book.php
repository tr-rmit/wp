<?php
  $title = "New Book";
  include_once("assets/includes/header.inc");
?>
        <nav class="navbar navbar-expand-sm bg navbar-dark mb-3 rounded">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="books.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="new_book.php">New Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="gallery.php">Gallery</a>
                </li>
            </ul>
        </nav>
        <main>
        <form id="uploadForm" action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control w-50" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control w-50" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control w-50" required>
            </div>
            <div class="mb-3">
                <label for="published" class="form-label">Year</label>
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
