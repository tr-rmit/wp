    <nav class="navbar p-3 navbar-expand-md bg-dark navbar-dark rounded">
      <a class="nav-link px-2" href="index.php">Home</a>
      <a class="nav-link px-2" href="gallery.php">Gallery</a>
      &bull;&nbsp;
<?php if (isset($_SESSION['userid'])) { ?>
      <span>Welcome <?= $_SESSION['username'] ?></span> 
      &nbsp;&bull;
      <a class="nav-link px-2" href="add.php">Add Country</a>
      <a class="nav-link px-2" href="logout.php">Logout</a>
<?php } else { ?> 
      <a class="nav-link px-2" href="register_form.php">Register</a>
      <a class="nav-link px-2" href="login_form.php">Login</a>
<?php } ?>
    </nav>
