<?php 
  session_start();
  if(!empty($_SESSION['user']))
    unset($_SESSION['user']);
  $title = 'Register';
  include('includes/header.inc'); 
?>

<main>
  <h1>Register</h1>  
  <form action="register_process.php" method="post">
    <p><label>Name<sup>*</sup> <input name="username" type="text" placeholder="name" required></label></p>
    <p><label>Pass<sup>*</sup> <input name="password" type="password" placeholder="password" required></label></p>
    <p><button>Register</button></p>
  </form>

</main>

<?php include('includes/footer.inc'); ?>