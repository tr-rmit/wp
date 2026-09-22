<?php
  include('assets/includes/tools.inc');
  include('assets/includes/db_connect.inc');
  $pageName = 'Gallery';
  $fileName = 'gallery.php';
  include_once('assets/includes/header.inc');
?>

  <main class="container-fluid">
    <div class="p-3">
      <h1>Merch Gallery</h1>
      <div>
        <select id="merchFilter">
          <option value="">All</option>
          <option value="in-stock">In Stock</option>
          <option value="on-order">On Order</option>
          <option value="sold-out">Sold Out</option>
        </select>
      </div>
      <div id="gallery" class="row p-2 mt-2">
        <!-- Hard coded reference items, to be deleted -->
        <div class="col-12 col-md-6 col-xl-4 col-xxl-3" data-status="on-order">
          <div class="gallery-item h-100">
            <h3>Asgardian Mead Stein</h3>
            <p><img class="img-fluid img-thumbnail gallery-img" src="assets/images/merch/Asgardian_Mead_Stein.png" alt="Eleanor Hart" data-bs-toggle="modal" data-bs-target="#imageModal"></p>
            <h4>Description</h4>
            <p>A heavy, Viking-style drinking horn and stein combo etched with runes of Odin.</p>
            <h4>Feature</h4>
            <p>Features an internal micro-pump and cooling unit that keeps beverages ice-cold and automatically "refills" the foam layer every time you slam it on a table.</p>
            <h4>Material</h4>
            <p>Stainless steel core wrapped in genuine leather and carved Uru-look resin.</p>
            <h4>Price</h4>
            <p>$3,500 <span class="badge on-order">On Order</span></p>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4 col-xxl-3" data-status="in-stock">
          <div class="gallery-item h-100">
            <h3>Bifrost VR Headset</h3>
            <p><img class="img-fluid img-thumbnail gallery-img" src="assets/images/merch/Bifrost_VR_Headset.png" alt="Eleanor Hart" data-bs-toggle="modal" data-bs-target="#imageModal"></p>
            <h4>Description</h4>
            <p>A virtual reality headset styled after Heimdall's armor with a glowing iridescent rainbow visor.</p>
            <h4>Feature</h4>
            <p>When you put it on, it simulates the sensory experience of a Bifrost teleportation beam before loading your destination.</p>
            <h4>Material</h4>
            <p>Brushed gold-tone alloy and polished asgardian glass.</p>
            <h4>Price</h4>
            <p>$1,500 <span class="badge in-stock">In Stock</span></p>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4 col-xxl-3" data-status="sold-out">
          <div class="gallery-item h-100">
            <h3>Eye of Agamotto Desk Clock</h3>
            <p><img class="img-fluid img-thumbnail gallery-img" src="assets/images/merch/Eye_of_Agamotto_Desk_Clock.png" alt="Eleanor Hart" data-bs-toggle="modal" data-bs-target="#imageModal"></p>
            <h4>Description</h4>
            <p>A heavy brass and bronze pendant mounted on an obsidian stand that acts as a fully functional mechanical desk clock.</p>
            <h4>Feature</h4>
            <p>The middle eye slowly opens and closes using a complex gear system as the hours pass, and the entire dial spins backward during Daylight Saving Time adjustments.</p>
            <h4>Material</h4>
            <p>Antiqued bronze with a real amber-tinted glass core.</p>
            <h4>Price</h4>
            <p>$750 <span class="badge sold-out">Sold Out</span></p>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4 col-xxl-3" data-status="in-stock">
          <div class="gallery-item h-100">
            <h3>Jarvis Smart-Home Projector</h3>
            <p><img class="img-fluid img-thumbnail gallery-img" src="assets/images/merch/Jarvis_Smart-Home_Projector.png" alt="Eleanor Hart" data-bs-toggle="modal" data-bs-target="#imageModal"></p>
            <h4>Description</h4>
            <p>A desktop holographic projector shaped like Tony Stark&#39;s classic Mark II helmet core.</p>
            <h4>Feature</h4>
            <p>Projects a glowing blue AI interface onto any wall and responds to your voice with classic sarcastic Jarvis commentary while controlling your house lights.</p>
            <h4>Material</h4>
            <p>Glossy hot-rod red and titanium-finish polyresin.</p>
            <h4>Price</h4>
            <p>$5,000 <span class="badge in-stock">In Stock</span></p>
          </div>
        </div>
        <!-- Database items -->
<?php // lets get some records / rows from the database
  $sql = "SELECT * FROM merch";
  $result = mysqli_query($conn, $sql); 

  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      // preshow($row);
      $badgeStatus = statusToBadge($row['Status']);
      echo <<<"MERCHITEM"
        <div class="col-12 col-md-6 col-xl-4 col-xxl-3" data-status="$badgeStatus">
          <div class="gallery-item h-100">
            <h3>{$row['Title']}</h3>
            <p><img class="img-fluid img-thumbnail gallery-img" src="assets/images/merch/{$row['Image_path']}" alt="{$row['Title']}" data-bs-toggle="modal" data-bs-target="#imageModal"></p>
            <h4>Description</h4>
            <p>{$row['Description']}</p>
            <h4>Feature</h4>
            <p>{$row['Feature']}</p>
            <h4>Material</h4>
            <p>{$row['Material']}</p>
            <h4>Price</h4>
            <p>\${$row['Price']} <span class="badge $badgeStatus">{$row['Status']}</span></p>
          </div>
        </div>

  MERCHITEM;
          }
        }
        ?>
      </div>

      <!-- Only One Modal! -->
      <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content w-80">
            <div class="modal-body text-center">
              <img id="modalImage" class="img-fluid  img-thumbnail w-100" src="assets/images/4-up.png" alt="All 4 Products">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
<?php include_once('assets/includes/footer.inc'); ?>