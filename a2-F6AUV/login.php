<?php
  include_once('includes/tools.inc');
  include_once('includes/db_connect.inc');
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    include_once('includes/login_process.inc');  
  $status_message = '';
  $pageTitle = 'Log In';
  $fileName = 'login.php';
  include_once('includes/header.inc');
?>

<main class="container-fluid">

  <h1>Login</h1>
  <div><?= $status_message; ?></div>
  <?= showFlashAlerts() ?>
  <form action="login.php" method="post" class="mt-4">
    <div class="mb-3">
      <label for="login" class="form-label">Username or Email</label>
      <input
        type="text"
        class="form-control"
        id="login"
        name="login"
        required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input
        type="password"
        class="form-control"
        id="password"
        name="password"
        required>
    </div>
    <button type="submit" class="btn btn-primary">
      Login
    </button>
  </form>

</main>

<?php include_once('includes/footer.inc'); ?>