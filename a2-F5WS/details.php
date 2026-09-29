<?php
  if(empty($_GET['merchid']) || !filter_var($_GET['merchid'], FILTER_VALIDATE_INT)) {
    header("Location: merch.php");
    exit();
  }
  include('includes/tools.inc');
  include('includes/db_connect.inc');
  $pageName = 'Merch Details';
  $fileName = 'details.php';
  include_once('includes/header.inc');
?>

<?php 
  $sql ="select * from merch where merchid = ?";
  $stmt = mysqli_prepare($conn, $sql);
  // acronym: dibs, bids, etc.
  mysqli_stmt_bind_param($stmt, "i", $_GET['merchid']);
  $result = mysqli_stmt_execute($stmt);
  // Page 9 of today's tutorial
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $item = mysqli_fetch_assoc($result);
  // preshow($item);
?>

  <main class="container-fluid">
    <div class="p-3">
      <h1>Details for <?= $item['Title'] ?></h1>
      <p><?= $item['Description'] ?></p>
      <p><img src="assets/images/merch/<?= $item['Image_path'] ?>" alt="<?= $item['Description'] ?>"></p>
      <p><?= $item['Feature'] ?></p>
      <p><?= $item['Material'] ?></p>
      <p>Price: $<?= number_format($item['Price']); ?> | Product code: #<?= $_GET['merchid'] ?> | This item is <?= $item['Status'] ?></p>
      <p><a href="merch.php">Return to the Merch Table</a></p>
    </div>
  </main>

<?php include_once('includes/footer.inc'); ?>  