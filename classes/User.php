<?php
require_once "Database.php";

class User extends Database{

    public function store($request){
        
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`) VALUES ('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            header("location: ../views");
            exit;
        } else {
            die("Error creating the user: " . $this->conn->error);
        }
    }

public function login($request){
    $username = $request['username'];
    $password = $request['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = $this->conn->query($sql);

    if($result->num_rows == 1){
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            session_start();
            $_SESSION['id']        =  $user['id'];
            $_SESSION['username']  =  $user['username'];
            $_SESSION['first_name'] =  $user['first_name'];

            header("location: ../views/dashboard.php");
            exit;
        } else {
            die ("Password is incorrect");
        }
    } else {
        die ("Username not found");
    }
}

public function logout(){
    session_start();
    session_unset();
    session_destroy();

    header("location: ../views.php");
    exit;
}


public function getAllProducts(){
    $sql = "SELECT * FROM products";

    if($result = $this->conn->query($sql)){
        return $result;
    } else {
        die ("Error retrieving all products: " . $this->conn->error);
    }
}

public function addProduct($request){
    $product_name = $request['product_name'];
    $price = $request['price'];
    $quantity = $request['quantity'];
    
    $sql = "INSERT INTO `products`(`product_name`, `price`, `quantity`) VALUES ('$product_name','$price','$quantity') ";

    if($this->conn->query($sql)){
        header("location: ../views/dashboard.php");
        exit;
    } else {
        die ("Error adding the product: " . $this->conn->error);
    }
}

public function getProduct(){
    $id = $_GET['product_id'];
    $sql = "SELECT * FROM products WHERE id = $id";

    if($result = $this->conn->query($sql)){
        return $result->fetch_assoc();
        // ['id' => 1, 'name' => 'cookie']
    } else {
        die ("Error retrieving the product: " . $this->conn->error);
    }
}


public function updateProduct($request){
    $id = $_GET['product_id']; //got error here
    $product_name = $request['product_name'];
    $price = $request['price'];
    $quantity = $request['quantity'];
    
    $sql = "UPDATE products SET `product_name`='$product_name', price=$price, quantity=$quantity WHERE id = $id";

    if($this->conn->query($sql)){
        header("location: ../views/dashboard.php");
        exit;
    } else {
        die ("Error updating the product: " . $this->conn->error);
    }
    }


public function deleteProduct(){
    $id = $_GET['product_id'];
    $sql = "DELETE FROM products WHERE id = $id";

    if($this->conn->query($sql)){
        header ("location: ../views/dashboard.php");
        exit;
    } else {
        die ("Error deleting the product: " . $this->conn->error);
    }
}


}
?>