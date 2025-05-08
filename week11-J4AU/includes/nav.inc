      <nav>
        <a href="index.php">Home</a>
        <a href="gallery.php">Gallery</a>
        <a href="add.php">Add More</a>
<?php if(empty($_SESSION['user'])) : ?>
        <a href="login.php">Log In</a>
        <a href="register.php">Register</a>
<?php else: ?>
        <a href="modify_table.php">Modify Existing</a>
        <span>Hey <?= $_SESSION['user']['name'] ?></span>
        <a href="logout.php">Log Out</a>
<?php endif; ?>

  </nav>
