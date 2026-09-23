  <nav class="navbar navbar-expand-sm py-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'index.php' ? 'active' : '' ?>" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'merch.php' ? 'active' : '' ?>" href="merch.php">Merch</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'gallery.php' ? 'active' : '' ?>" href="gallery.php">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'add.php' ? 'active' : '' ?>" href="add.php">Add Merch</a>
      </li>
    </ul>
  </nav>