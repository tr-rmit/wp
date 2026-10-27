<?php
  //preshow($_SERVER);

  //die('hey'.$dir_upload_images);
  $picture = $_FILES['picture'];
  $new_image_path = $old_image_path;
  /*
    1. If there is no new image we can update the record
    2. If there is a new image and it is broken we should not update the record
    3. If there is a new image and it is good we should update the record
  */
  if (!empty(trim($picture['name']))) {
    if(!preg_match("#^image/#",$picture['type']) || $picture['error'] !=0 || $picture['size']<10 || $picture['size']>10000000 ) {
      $_SESSION['failure'] = "Something is wrong with the new picture, keeping the old one";
      // $new_image_path = $old_image_path;
    } else {
      // New image is fine, carry on processing
      $new_image_path = $picture['name'];
    }
  } 
  /* I am fairly confident that the image situation is resolved */

  /* Make sure all the fields are fine, ie no blank text fields, I'm skipping this for time reasons */
  // Only update database fields if POSTed fields are not blank
  foreach ($_POST as $name => $value) {
    $value = trim($value);
    if ($value != '')
      $$name = htmlspecialchars($value);
  }

  $sql = "UPDATE merch SET
            Title=?, 
            Description=?, 
            Image_path=?, 
            Feature=?, 
            Material=?, 
            Price=?, 
            Status=?
          WHERE
            merchid=? AND userid=?";

  $stmt = $conn->prepare($sql);
  if (!$stmt) {
    /* redirect them to the merch table page */
    $_SESSION['failure'] = 'An error occurred when preparing the statement on the database.';
    header('Location: merch.php');
    exit();
  }

  $stmt->bind_param("sssssdsii",
    $title,
    $description,
    $new_image_path,
    $feature, 
    $material,
    $price,
    $status,
    $merchid, 
    $userid
  );
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    $_SESSION['success'] = "Book successfully updated.";
    
    // only move file if a new one exists
    if (!empty(trim($picture['name']))) { 
      // die('assets/images/merch/' . $new_image_path);
      if (move_uploaded_file($picture['tmp_name'], 'assets/images/merch/' . $new_image_path)) {
        $_SESSION['success'] .= "<br>Record Updated, image moved to merch images folder.";
      } else {
        $_SESSION['warning'] = "Record Updated but image not moved to merch images folder.";
      }
    }
    header('Location: merch.php');
    exit();
  } else {
    $_SESSION['failure'] = "Book was not updated in the database, sorry :-(";
    // Stay on the edit page
  }

 
?>