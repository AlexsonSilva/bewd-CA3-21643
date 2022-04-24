<?php
include 'library/DBConnection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Pet shelter</title>
  </head>
  <body>
    <div class="container">
       <h1>Add new clothes</h1>
       <form method="post" action="handlenewclothes.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="forName" class="form-label">Clothes Name</label>
                <input type="text" class="form-control" id=""  name="name" aria-describedby="nameInput">
            </div>
            <div class="mb-3">
                <label for="forCategory" class="form-label">Category</label>
                <select class="form-select"  name="category" aria-label="Default select example">
                    <option selected>Select category</option>
                    <option value="shirt">Shirt</option>
                    <option value="t-shirt">T-shirt</option>
                    <option value="shoes">Shoes</option>
                    <option value="jaquets">Jaquets</option>
                    <option value="tracksuit">Tracksuit</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="forSize" class="form-label">Size</label>
                <select class="form-select"  name="size" aria-label="Default select example">
                    <option selected>Select size</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="xxl">XXL</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="forColor" class="form-label">Color</label>
                <input type="text" class="form-control" id=""  name="color" aria-describedby="colorInput">
            </div>
            <div class="mb-3">
                <label for="forPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id=""  name="price" aria-describedby="priceInput">
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

