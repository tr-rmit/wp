<?php
include_once("assets/includes/tools.inc");
include_once("assets/includes/db_connect.inc");

$title = "Book Detail";
include_once("assets/includes/header.inc");
include_once("assets/includes/nav.inc");
?>

    <main>
      <h1>Book Details</h1>
      <p>Book details for book <?= $_GET['isbn'] ?> to go here.</p>
    </main>

<?php
include("assets/includes/footer.inc");
?>