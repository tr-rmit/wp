<?php
  if (empty($_GET['countryid'])) {
    // customer is not supposed to be here!
    header("Location: index.php");
    exit();
  }

  include('includes/tools.inc');
  include('includes/db_connect.inc');
  $title = "Delete Record";
  include('includes/header.inc');

  $error = false;
  if (!empty($_GET['countryid'])) {
    $countryid = $_GET['countryid'];
    $sql = "select * from country where countryid=?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $countryid);
    $stmt->execute();
    $records = $stmt->get_result();
    if ($records->num_rows > 0) {
        foreach ($records as $row) {
            $oldimage = $row['image'];
        }
    }
    $sql = "delete from country where countryid = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $countryid);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<p>Record deleted</p>";
        if (file_exists('images/' . $oldimage)) {
            unlink('images/' . $oldimage);
        }
    } else {
        $error = true;
    }
} else {
    $error = true;
}
if ($error) {
    echo "<p>Record NOT deleted<p>";
}
?>
<p><a href="index.php">Click here to go back to the table</a></p>
<?php
include('includes/footer.inc');