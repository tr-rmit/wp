      <nav>
        <a href="index.php">Home</a>
        <a href="gallery.php">Gallery</a>
<?php if(empty($_SESSION['user']['username'])) : ?>
        <a href="login.php">Log In</a>
        <a href="register.php">Register</a> 
<?php else : ?>
        <a href="add.php">Add More</a>
        <a href="modify_table.php">Modify Existing</a>
        <span>Hey <?= $_SESSION['user']['username'] ?></span>
        <a href="logout.php">Log Out</a>
<?php endif; ?>
      </nav>
<?php if (isset($_SESSION['usrmsg'])) : ?>
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong>
        <?= $_SESSION['usrmsg'] ?>
      </div>
<?php unset($_SESSION['usrmsg']); endif; ?>      
<?php if (isset($_SESSION['err'])) : ?>
      <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Error!</strong>
        <?= $_SESSION['err'] ?>
      </div>
<?php unset($_SESSION['err']); endif; ?>      