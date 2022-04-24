<?php

echo '<pre>';

print_r($_POST);


//connect to the database
include 'library/DBConnection.php';

// set up the sql string with prepared statements
$sql = "UPDATE clothes 
        SET name=?, 
            category=?,
            size=?, 
            color=?, 
            price=?  
        WHERE id=?";

//set up the variables
$id = $_POST["id"];
$name = $_POST["name"];
$category = $_POST["category"];
$size = $_POST["size"];
$color = $_POST["color"];
$price = $_POST["price"];
// $image = $_POST["image"];

$stmt= $conn->prepare($sql);


    $stmt->bind_param("ssssdi",  $name, $category, $size, $color, $price, $id);

    $stmt->execute();
    $conn->close();






echo '<pre>';

print_r($conn);
echo '</pre>';

//redirect back to index page
header("Location: index.php");


?>