<?php
  include_once("assets/includes/tools.inc");
  include_once("assets/includes/db_connect.inc");

  $title = "Book Detail";
  include_once("assets/includes/header.inc");
  include_once("assets/includes/nav.inc");

  $isbn = htmlspecialchars(trim($_GET['isbn']));

  $sql = "select * from books where isbn = ?"; 
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    exit("An error occurred");
  }
  $stmt->bind_param("i", $isbn);
  $stmt->execute();
  $records = $stmt->get_result();
   
?>

    <main>
      <h1>Book Details</h1>
<?php
  if ($records->num_rows > 0) {
    foreach ($records as $record) {
      echo <<<"CDATA"
      <div>
        <h2>{$record['title']}</h2>
        <h3>- by {$record['author']}</h3>
        <img src='assets/images/books/{$record['image_path']}' alt='{$record['title']}' class='img-fluid rounded'>
        <p>{$record['description']}</p>
        <ul>
          <li>Published in {$record['published']}</li>
          <li>Added to our library in {$record['created_at']}</li>
          <li>Currently this book is {$record['status']}</li>
        </ul>
      </div>

CDATA;
    }
  }
?>
    </main>

<?php
include("assets/includes/footer.inc");
?>