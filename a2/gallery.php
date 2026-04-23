<?php
  include_once("assets/includes/tools.inc");
  include_once("assets/includes/db_connect.inc");
  
  $title = "Gallery";
  include_once("assets/includes/header.inc");
  include_once("assets/includes/nav.inc");
?>
        <main class="row">
          <div class="d-flex justify-content-between">
            <h1><?=  $title ?></h1>
            <div>
            <!-- Old school event listener: onchange -->
              <select onchange="filterBooks(this.value)">
                <option value="">All</option>
                <option value="shelved">Shelved only</option>
                <option value="reserved">Reserved only</option>
              </select>
            </div>
          </div>
<?php
  try {
    $books = mysqli_query($conn, "select * from books");  
    
  } catch (Exception $ex) {
    echo 'Error: ' .$ex->getMessage();
    die();
  } 
  while($row = mysqli_fetch_assoc($books)) {
    // preshow($row);
    //$year_written = new DateTime("Y",$row['written_in']);
    echo <<<"CDATA"
            <div class="col-12 col-md-6 col-lg-4 text-center"  data-status="{$row['status']}">
                <h3>{$row['title']}</h3>
                <h4>- by {$row['author']} ({$row['published']}) </h4>
                <img class="img-fluid img-thumbnail gallery-img" src="assets/images/books/{$row['image_path']}" width="160" height="45"
                    alt="{$row['author']}" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>{$row['description']}</p>
            </div>

CDATA;
  }
?>
           
        </main>
        <!-- Only One Modal! -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img id="modalImage" class="img-fluid" src="assets/images/books/1.png" alt="Large Book Cover">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
<?php 
  include("assets/includes/footer.inc");
?>