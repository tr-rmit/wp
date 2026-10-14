  <nav class="navbar navbar-expand-sm py-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'index.php' ? 'active' : '' ?>" href="index.php">Home</a> <!-- need to make "active" dynamic -->
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'merch.php' ? 'active' : '' ?>" href="merch.php">Merch</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'gallery.php' ? 'active' : '' ?>" href="gallery.php">Gallery</a>
      </li>
      <li class="nav-item">|</li>
<?php if(isset($_SESSION['userid'])): ?>      
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'add.php' ? 'active' : '' ?>" href="add.php">Add Merch</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'logout.php' ? 'active' : '' ?>" href="logout.php">Log Out</a>
      </li>      
<?php else: ?>
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'register.php' ? 'active' : '' ?>" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $fileName == 'login.php' ? 'active' : '' ?>" href="login.php">Log In</a>
      </li>   
<?php endif; ?>         
    </ul>
  </nav>