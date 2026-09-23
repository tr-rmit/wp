<?php 
  // Initial debug
  // preshow($_POST);
  foreach($_POST as $name => $value) {
    $value = trim(htmlspecialchars($value));
    echo($name . ' => ' . $value . "<br>\n");
    $$name = $value;
  }
  //echo $title;
  $status_message = 'Initally Unset';
  $picture = $_FILES['picture'];
  preshow($picture);

  $errors = []; // new Array();

  
  if (strlen($title)<10)
    $errors['title'] = 'Title is too short';
  else 
    //$errors['title'] = '';

  if (strlen($description)<10)
    $errors['description'] = 'Description is too short';
  else 
    //$errors['description'] = '';
  
  if (strlen($feature)<10)
    $errors['feature'] = 'Feature is too short';
  else 
    //$errors['feature'] = '';
  
  if (strlen($material)<10)
    $errors['material'] = 'Material is too short'; 
  else 
    //$errors['material'] = '';
  
  if (!filter_var($price, FILTER_VALIDATE_INT) || $price < 0)
    $errors['price'] = 'Price must be a positive integer'; 
  else 
    //$errors['price'] = '';

  if ($status != "Sold Out" && $status != "On Order" && $status != "In Stock")
    $errors['status'] = $status . ' is not an option try not hacking this select box'; 
  else 
    //$errors['status'] = '';

  if (empty(trim($picture['name'])) || !preg_match("#^image/#",$picture['type']) || $picture['error'] !=0 || $picture['size']<10 || $picture['size']>10000000 )
    $errors['picture'] = "Something is wrong with the picture";
  else 
    //$errors['picture'] = '';


  if (count($errors) == 0) {
    // do something useful and redirect

    $sql = "INSERT INTO merch (Title, Description, Image_path, Feature, Material, Price, Status) VALUES (?,?,?,?,?,?,?)";
 
    $stmt = mysqli_prepare($conn, $sql);
    // dibs bids 
    mysqli_stmt_bind_param($stmt,"sssssis",
      $title,
      $description,
      $picture['name'], // todo: append a uniqid() string on the end of the name but not the extension, eg namefdf7df6d.png
      $feature,
      $material,
      $price,
      $status
    );

    // echo 'reached line '.__LINE__;

    $inserted = mysqli_stmt_execute($stmt);

    // die('reached line '.__LINE__);

    if ($inserted) {
      if (move_uploaded_file($picture["tmp_name"], 'assets/images/merch/'.$picture['name'])) {
        $status_message = "Record inserted, image moved to right folder"; 
        // redirect to another page, eg the gallery page or the merch table page
      } else {
        $status_message = "Record inserted, but there was a problem saving the image to disk"; 
      }
    } else {
      $status_message = "Record not inserted, image not saved to disk"; 
    }


  } else {
    // stay on this page
  }

  preshow($errors);
  



?>