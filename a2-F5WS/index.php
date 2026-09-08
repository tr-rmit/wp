<?php 
  include('assets/includes/tools.inc');
  $pageName = 'Home';
  $fileName = 'index.php';
  include_once('assets/includes/header.inc');
?>

  <main class="container-fluid">
    <div class="row">
      <div id="demo" class="carousel slide mb-3 col-lg-6" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
        </div>

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/merch/Asgardian_Mead_Stein.png" alt="Asgardian Mead Stein" class="d-block w-100 mx-auto">
          </div>
          <div class="carousel-item">
            <img src="assets/images/merch/Bifrost_VR_Headset.png" alt="Bifrost VR Headse" class="d-block w-100 mx-auto">
          </div>
          <div class="carousel-item">
            <img src="assets/images/merch/Eye_of_Agamotto_Desk_Clock.png" alt="Eye of Agamotto Desk Clock" class="d-block w-100 mx-auto">
          </div>
          <div class="carousel-item">
            <img src="assets/images/merch/Jarvis_Smart-Home_Projector.png" alt="Jarvis Smart-Home Projector" class="d-block w-100 mx-auto">
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
      <div class="p-3 col-lg-6">
        <h1 class="text-center">Welcome to Our Shop</h1>
        <p class="text-center">
          Step into a world of imagination, discovery, and knowledge! Our shop offers a carefully curated collection of merch across a wide range of characters — from thrilling tech to heartwarming beverages and adventurous fantasy world environments. Whether you're seeking inspiration, formation, or simply a moment of escape, you'll find something special waiting for you here.</p>
      </div>
    </div>
  </main>

<?php include_once('assets/includes/footer.inc'); ?>