<?php
  include_once("assets/includes/tools.inc");
  include_once("assets/includes/db_connect.inc");
  
  $title = "Gallery";
  include_once("assets/includes/header.inc");
  include_once("assets/includes/nav.inc");
?>
        <main class="row">
          <h1>Book Gallery</h1>
            <div>
            <!-- Old school event listener: onchange -->
              <select onchange="filterBooks(this.value)">
                <option value="">All</option>
                <option value="shelved">Shelved only</option>
                <option value="reserved">Reserved only</option>
              </select>
            </div>
            <div class="col-12 col-md-6 col-lg-4 text-center"  data-status="shelved">
                <h3>Whispers of the Wind</h3>
                <img class="img-fluid img-thumbnail gallery-img" src="assets/images/books/1.png" width="160" height="45"
                    alt="Eleanor Hart" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>Set in the Victorian era, a young woman defies societal expectations to chase her dreams across the
                    wild moors of England.</p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 text-center"  data-status="shelved">
                <h3>Neon Shadows</h3>
                <img class="img-fluid img-thumbnail gallery-img" src="assets/images/books/2.png" width="160" height="45"
                    alt="Jackson Vale" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>In a neon-lit future city, a detective must solve a conspiracy that could change humanity forever.
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 text-center"  data-status="shelved">
                <h3>Roots Beneath the Ice</h3>
                <img class="img-fluid img-thumbnail gallery-img" src="assets/images/books/3.png" width="160" height="45"
                    alt="Sara Nguyen" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>An epic tale of survival and self-discovery unfolds as a team of explorers unearth secrets buried
                    deep in the Arctic tundra.</p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 text-center"  data-status="shelved">
                <h3>The Last Ember</h3>
                <img class="img-fluid img-thumbnail gallery-img" src="assets/images/books/4.png" width="160" height="45"
                    alt="Thomas Grey" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>When magic is nearly extinct, a reluctant hero rises to restore the lost flames of an ancient world.
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 text-center"  data-status="reserved">
                <h3>Through Glass Skies</h3>
                <img class="img-fluid img-thumbnail gallery-img" src="assets/images/books/5.png" width="160" height="45"
                    alt="Amara Singh" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>A love story unfolds between two pilots whose lives are as turbulent as the storms they fly through.
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 text-center"  data-status="shelved">
                <h3>The Silent Archivist</h3>
                <img class="img-fluid img-thumbnail gallery-img" src="assets/images/books/6.png" width="160" height="45"
                    alt="Leo Ramirez" data-bs-toggle="modal" data-bs-target="#imageModal">
                <p>When rare manuscripts start disappearing from a famous library, a reclusive archivist must uncover
                    the truth before it's too late.</p>
            </div>
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