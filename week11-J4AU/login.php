<?php 
  $title = 'Login';
  include('includes/header.inc'); 
?>

<main>
  <h1>Login</h1>  
  <form action="login_process.php" method="post">
    <p><label>Name<sup>*</sup> <input name="name" type="text" placeholder="name" required></label></p>
    <p><label>Pass<sup>*</sup> <input name="password" type="password" placeholder="password" required></label></p>
    <p><button>Log In</button></p>
  </form>

</main>

<?php include('includes/footer.inc'); ?>