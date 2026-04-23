<?php
  include_once("assets/includes/tools.inc");
  include_once("assets/includes/db_connect.inc");

  $title = "Books";
  include_once("assets/includes/header.inc");
  include_once("assets/includes/nav.inc");
?>
    <main class="w-800 p-3">
      <h1><?=  $title ?></h1>
      <table class="table table-striped table-hover">
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Synopsis</th>
          <th>Year Published</th>
          <th>Date Added</th>
          <th>Status</th>
        </tr>
<?php
  try {
    $books = mysqli_query($conn, "select * from books");  
    
  } catch (Exception $ex) {
    echo 'Error: ' .$ex->getMessage();
    die();
  } 
  while($row = mysqli_fetch_assoc($books)) {
    // preshow($row);
    echo <<<"CDATA"
          <tr>
            <td><a href='details.php?isbn={$row['isbn']}'>{$row['title']}</a></td>
            <td>{$row['author']}</td>
            <td>{$row['description']}</td>
            <td>{$row['published']}</td>
            <td>{$row['created_at']}</td>
            <td>{$row['status']}</td>
          </tr>    
CDATA;    
  }

?>          

        </table>
    </main>
<?php 
  include("assets/includes/footer.inc");
?>