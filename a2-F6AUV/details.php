<?php 
  if(empty($_GET['merchid']) || !filter_var($_GET['merchid'],FILTER_VALIDATE_INT)) {
    header("Location: merch.php");
    exit();
  }
  include_once('includes/tools.inc');
  include_once('includes/db_connect.inc');
  $pageTitle = 'Merch Details';
  $fileName = 'details.php';
  include_once('includes/header.inc'); 

  // lets get one record / row from the database
  $sql = "SELECT * FROM merch WHERE merchid = ?";
  $stmt = mysqli_prepare($conn, $sql);

  // Acronym: dibs or bids for all the data types
  mysqli_stmt_bind_param($stmt, "i", $_GET['merchid']);  
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);

  // Redirect if no record exists
  if (!$row) {
    header("Location: merch.php");
    exit();    
  }

?>      

  <main class="container-fluid">
    <div class="row p-3">
      <h1>Details for <?= $row['Title'] ?></h1>
      <p><?= $row['Description'] ?></p>
      <p><img src="assets/images/merch/<?= $row['Image_path'] ?>" alt="<?= $row['Description'] ?>"></p>
      <p><?= $row['Feature'] ?></p>
      <p><?= $row['Material'] ?></p>
      <p>Price: $<?= number_format($row['Price']) ?> | Status: <?= $row['Status'] ?></p>
      <p><a href="merch.php">Return to the Merch Table</a></p>
    </div>
  </main>

<?php include_once('includes/footer.inc'); ?>