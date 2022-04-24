<?php 

include 'library/DBConnection.php';


$name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
//declare the error array
$error =[];

if(!isset($name) || empty($name)){
    $error['name'] = 'Clothes name is required';
}
if(!isset($category) || empty($category)){
    $error['category'] = 'Category is required';
}
if(!isset($size) || empty($size)){
    $error['size'] = 'Size is required';
}
if(!isset($color) || empty($color)){
    $error['color'] = 'Color is required';
}
if(!isset($price) || empty($price)){
    $error['price'] = 'Price is required';
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

if(empty($error)){

    $sql = "INSERT INTO clothes (name, category, size, color, price, image) VALUES (?,?,?,?,?,?)";

    $stmt= $conn->prepare($sql);

    $stmt->bind_param("ssssds",  $name, $category, $size, $color, $price, $target_file);

    $stmt->execute();
    $conn->close();

    header("Location: index.php");
} else{
    echo '<pre>';
    print_r($error);
    echo '</pre>';
    require_once("NewClothes.php");
}