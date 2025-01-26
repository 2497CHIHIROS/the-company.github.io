<?php
    include "../classes/User.php";
    $user_obj = new User;
    $product = $user_obj->getProduct();
    //$product = ['id' => 1, 'name' => 'cookie']
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/design.css"> -->
  </head>
  <body>
  <nav class="navbar navbar-expand navbar-light" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h3>
                <i class="fa-solid fa-house"></i>
                </h3>
            </a>
            <div class="navbar-nav">
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0 fs-2">
                        <i class="fa-solid fa-user-xmark text-danger"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
<main class="row justify-content-center gx-0">
    <div class="col-4">
        <h2 class="text-center mb-4 text-warning">
            <i class="fa-regular fa-pen-to-square"></i>
            Edit Product
        </h2>

        <form action="../actions/edit-product.php?product_id=<?=$product['id']?>" method="post">
            <div class="row justify-content-center mb-3">
                <div class="mb-3">
                    <label for="product-name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="<?=$product['product_name']?>" required autofocus>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text"> $ </span>
                            <input type="number" name="price" id="price" class="form-control"  value="<?=$product['price']?>"  required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control"  value="<?=$product['quantity']?>" required>
                    </div>
                </div>
        
                <div>
                    <button type="submit" class="btn btn-warning w-100 my-3">Edit</button>
                </div>                
            </div>    
        </form>
    </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>