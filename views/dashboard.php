<?php

session_start();
require "../classes/User.php";

$user = new User;
$all_products = $user->getAllProducts();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->

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
                <span class="navbar-text">Welcome, <?=$_SESSION['username']?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0 fs-2">
                        <i class="fa-solid fa-user-xmark text-danger"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h2 class="text-center float-start ">Product List</h2>
            <a href="add-product.php" class="btn border-0 text-info fw-bold fs-2 float-end">
                <i class="fa-solid fa-plus"></i>
            </a>

            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th><!-- for action buttons --></th>
                        <th><!-- for action buttons --></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($product = $all_products->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?= $product['id']?></td>
                        <td><?= $product['product_name']?></td>
                        <td><?= $product['price']?></td>
                        <td><?= $product['quantity']?></td>
                        <td>
                            <a href="edit-product.php?product_id=<?=$product['id']?>" class="btn btn-warning" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="../actions/delete-product.php?product_id=<?=$product['id']?>" class="btn btn-danger" title="Delete">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                        <td>
                            <a href="payment.php" class="btn btn-success" title="Buy">
                            <i class="fa-solid fa-cash-register"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>