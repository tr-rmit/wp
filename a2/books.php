<?php
  $title = "Books";
  include_once("assets/includes/header.inc");
?>
    <nav class="navbar navbar-expand-sm bg navbar-dark mb-3 rounded">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="books.php">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="new_book.php">New Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="gallery.php">Gallery</a>
            </li>
        </ul>
    </nav>
    <main class="w-800 p-3">
        <table class="table table-striped table-hover">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
            </tr>
            <tr>
                <td><a href='#'>Whispers of the Wind</a></td>
                <td>Eleanor Hart</td>
                <td>Historical Fiction</td>
                <td>2021</td>
            </tr>
            <tr>
                <td><a href='#'>Neon Shadows</a></td>
                <td>Jackson Vale</td>
                <td>Science Fiction</td>
                <td>2023</td>
            </tr>
            <tr>
                <td><a href='#'>Roots Beneath the Ice</a></td>
                <td>Sara Nguyen</td>
                <td>Adventure</td>
                <td>2020</td>
            </tr>
            <tr>
                <td><a href='#'>The Last Ember</a></td>
                <td>Thomas Grey</td>
                <td>Fantasy</td>
                <td>2022</td>
            </tr>
            <tr>
                <td><a href='#'>Through Glass Skies</a></td>
                <td>Amara Singh</td>
                <td>Romance</td>
                <td>2024</td>
            </tr>
            <tr>
                <td><a href='#'>The Silent Archivist</a></td>
                <td>Leo Ramirez</td>
                <td>Mystery/Thriller</td>
                <td>2019</td>
            </tr>
        </table>
    </main>
<?php 
  include("assets/includes/footer.inc");
?>