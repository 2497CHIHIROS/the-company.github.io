<?php
    include "../classes/User.php";

    $user_obj = new User;
    
    $product = $user_obj->deleteProduct();
?>