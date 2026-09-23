<h3>POST</h3>
<?php
    
  foreach($_POST as $name => $value) {
    $$name = htmlspecialchars(trim($value));
    echo "$name => $value<br>\n";
  }
  preshow($_FILES);

  $picture = $_FILES['picture'];

  $status_message = 'Initially Unset'; // later set this to ''
  $errors = [];

  if (strlen($title)<10)
    $errors['title'] = 'Title is too short';
  if (strlen($title)<10)
    $errors['description'] = 'Description is too short';
  if (strlen($title)<10)
    $errors['feature'] = 'Feature is too short';
  if (strlen($material)<10)
    $errors['material'] = 'Material is too short';
  if(!filter_var($price, FILTER_VALIDATE_INT) || $price<10)
    $errors['price'] = 'Price needs to be an integer greater than $10';

  if ($status != "Sold Out" && $status != "On Order" && $status != "In Stock")
    $errors['status'] = $status . ' is not an option try not hacking this select box'; 

  if(empty(htmlspecialchars(trim($picture['name']))) || !preg_match("#^image/#",$picture['type']) || $picture['error'] !=0 || $picture['size']<10 || $picture['size']>10000000)
    $errors['picture'] = 'Could not process this image'; // very generic, think about more messages done by multiple checks

  preshow($errors);

  if(count($errors) == 0) {
    // do something useful with the POSTed data

    $sql = "INSERT INTO merch (Title, Description, Image_path, Feature, Material, Price, Status) VALUES (?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);

    // dibs or bids
    mysqli_stmt_bind_param($stmt,"sssssis",
      $title,
      $description,
      $picture['name'], // todo: append a uniqid() string on the end of the name but not the extension, eg namefdf7df6d.png
      $feature,
      $material,
      $price,
      $status
    );    
    
    $inserted = mysqli_stmt_execute($stmt);

    if ($inserted) {
      if (move_uploaded_file($picture['tmp_name'], 'assets/images/merch/'.$picture['name']))
        $status_message = 'Record inserted, image moved to the right folder';
        // redirect to another page, eg the gallery page or the merch table page
      else 
        $status_message = 'Record inserted, but unable to move image to the right folder';
    } else {
      $status_message = 'Record NOT inserted, unwilling to even try to move image to the right folder';
    }

  }
?>