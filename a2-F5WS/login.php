<?php
include('includes/tools.inc');
if(isset($_SESSION['userid'])) 
  header('Location: index.php');
include('includes/db_connect.inc');
$status_message='';
if ($_SERVER['REQUEST_METHOD'] == "POST")
  include('includes/login_process.inc');
$pageName = 'Log In';
$fileName = 'login.php';
include_once('includes/header.inc');
?>

<main class="container my-4">
  <h1>Login</h1>
  <?php showFlashAlerts(); ?>
  <div><?=  $status_message ?></div>  <!-- todo: style this message -->
  <form action="login.php" method="post" class="mt-4">
    <div class="mb-3">
      <label for="login" class="form-label">Username or Email</label>
      <input
        type="text"
        class="form-control"
        id="login"
        name="login"
        value='<?= $login ?? '' ?>'
        required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input
        type="password"
        class="form-control"
        id="password"
        name="password"
        value='<?= $password ?? '' ?>'
        required>
    </div>
    <button type="submit" class="btn btn-primary">
      Login
    </button>
  </form>
</main>

<?php
include_once("includes/footer.inc");
?>