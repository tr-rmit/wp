<?php
  include_once("assets/includes/tools.inc");
  include_once("assets/includes/db_connect.inc");
  if (!isLoggedIn()) {
    /* redirect to another page, more details later */
    exit();
  } 
  
  /* All good, the user is logged in so we can print out the HTML */
  $title = "Home";
  include_once("assets/includes/header.inc");
?>
        <nav class="navbar navbar-expand-sm bg navbar-dark mb-3 rounded">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="books.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="new_book.php">New Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="gallery.php">Gallery</a>
                </li>
            </ul>
        </nav>
        <main>
            <div id="demo" class="carousel slide mb-3" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                </div>

                <!-- The slideshow -->
                <div class="carousel-inner bg-secondary">
                    <div class="carousel-item active">
                        <img src="assets/images/books/1.png" alt="animal" class="d-block w-25 mx-auto">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/books/2.png" alt="animal" class="d-block w-25 mx-auto">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/books/3.png" alt="animal" class="d-block w-25 mx-auto">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/books/4.png" alt="animal" class="d-block w-25 mx-auto">
                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

            </div>
            <div>
                <h1 class="text-center">Welcome to Our Library</h1>
                <p class="text-center">
                    Step into a world of imagination, discovery, and knowledge! Our library offers a carefully curated
                    collection of books across a wide range of genres — from thrilling mysteries to heartwarming
                    romances
                    and adventurous fantasies. Whether you're seeking inspiration, information, or simply a moment of
                    escape, you'll find something special waiting for you here. Explore our featured titles, browse by
                    genre, or dive into our latest arrivals. Your next favorite book is just a click away!</p>

            </div>
        </main>
<?php 
  include("assets/includes/footer.inc");
?>