<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">
        <header class="mt-3 p-4 bg text-white rounded mb-3">
            <div class="container text-center">
                <h1>Welcome to the Library</h1>
                <p>Best place to learn and enjoy</p>
            </div>
        </header>
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
        <footer class="page-footer font-small bg-light lighten-5">
            <div class="footer-copyright text-center py-3">&copy; 2025
                Tanya
            </div>
        </footer>
    </div>
    <script src="assets/js/main.js"></script>
</body>

</html>