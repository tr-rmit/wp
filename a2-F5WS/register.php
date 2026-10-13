<?php
  include('includes/tools.inc');
  include('includes/db_connect.inc');
  $status_message='';
  if ($_SERVER['REQUEST_METHOD'] == "POST")
    include('includes/register_process.inc');
  $pageName = 'Register';
  $fileName = 'register.php';
  include_once('includes/header.inc');
?>
<main class="container my-4">
  <h1>Register</h1>
  <?php showFlashAlerts(); ?>
  <form action="register.php" method="post" class="mt-4">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input
        type="text"
        class="form-control"
        id="username"
        name="username"
        maxlength="50"
        required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input
        type="email"
        class="form-control"
        id="email"
        name="email"
        maxlength="100"
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
    <div class="mb-3">
      <label for="confirm_password" class="form-label">Confirm
        Password</label>
      <input
        type="password"
        class="form-control"
        id="confirm_password"
        name="confirm_password"
        required>
    </div>
    <button type="submit" class="btn btn-primary">
      Register
    </button>
  </form>
</main>

<?php
  include_once("includes/footer.inc");
?>