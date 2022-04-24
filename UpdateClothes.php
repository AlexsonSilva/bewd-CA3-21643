<?php 
    include "library/DBConnection.php";

    $sql = "SELECT * FROM clothes WHERE id=".$_GET['id'];

    $result = $conn->query($sql);
    $clothes = $result->fetch_assoc();
  

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Clothes Store</title>
  </head>
  <body>
    <?php include 'NavBar.php' ?>
    <div class="container">
        <h3>Edit Clothes</h3>
        <form action="EditClothes.php" method="POST">
            <input type="hidden" value="<?=$_GET['id']?>" name="id">
            <div class="mb-3">
                <label for="forName" class="form-label">Clothes Name</label>
                <input  type="text" 
                        class="form-control" 
                        id="name"  
                        name="name" 
                        aria-describedby="nameHlep" 
                        value="<?= $clothes['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="forCategory" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" aria-describedby="categoryHelp" value="<?= $clothes['category'] ?>">
                    <option selected>Select category</option>
                    <option <?= ($clothes['category'] === 'shirt')? 'selected' : null ?> value="shirt">Shirt</option>
                    <option <?= ($clothes['category'] === 't-shirt')? 'selected' : null ?> value="t-shirt">T-shirt</option>
                    <option <?= ($clothes['category'] === 'shoes')? 'selected' : null ?> value="shoes">Shoes</option>
                    <option <?= ($clothes['category'] === 'jaquets')? 'selected' : null ?> value="jaquets">Jaquets</option>
                    <option <?= ($clothes['category'] === 'tracksuit')? 'selected' : null ?> value="tracksuit">Tracksuit</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="forSize" class="form-label">Size</label>
                <select class="form-select" id="size" name="size" aria-describedby="sizeHelp" value="<?= $clothes['size'] ?>">
                    <option selected>Select size</option>
                    <option <?= ($clothes['size'] === 'xs')? 'selected' : null ?> value="xs">XS</option>
                    <option <?= ($clothes['size'] === 's')? 'selected' : null ?> value="s">S</option>
                    <option <?= ($clothes['size'] === 'm')? 'selected' : null ?> value="m">M</option>
                    <option <?= ($clothes['size'] === 'l')? 'selected' : null ?> value="l">L</option>
                    <option <?= ($clothes['size'] === 'xl')? 'selected' : null ?> value="xl">XL</option>
                    <option <?= ($clothes['size'] === 'xxl')? 'selected' : null ?> value="xxl">XXL</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="forColor" class="form-label">Color</label>
                <input type="text" class="form-control" id="color"  name="color" aria-describedby="colorHelp" value="<?= $clothes['color'] ?>">
            </div>
            <div class="mb-3">
                <label for="forPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id="price"  name="price" aria-describedby="priceHelp" value="<?= $clothes['price'] ?>">
            </div>
            <div class="mb-3">
                <input type="file" name="image" id="imageToUpload">
            </div>
            <button type="submit" class="btn btn-primary">Submit clothes</button>
        </form>
    </div>

         




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>