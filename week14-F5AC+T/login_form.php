<?php
include('includes/tools.inc');
include('includes/db_connect.inc');
$title = 'Login';
include('includes/header.inc');
?>
  <main class="container">
    <h1><?= $title ?></h1>
    <form action="login_process.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </main>

<?php
include('includes/footer.inc');
?>