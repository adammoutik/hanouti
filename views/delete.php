<?php
session_start();

if(isset($_GET["id"])){
    $id = $_GET["id"];

    if(isset($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $key => $product){
            if($product["id"] == $id){
                if($product["qtt"] > 1){
                    $_SESSION["cart"][$key]["qtt"]--; // Decrement the quantity if greater than 1
                    $_SESSION["total"] -= $product["prix"]; // Deduct the price of one item from the total
                } else {
                    $_SESSION["total"] -= $product["prix"]; // Deduct the price of the last item from the total
                    unset($_SESSION["cart"][$key]); // Remove the item from the cart
                    $_SESSION["cart"] = array_values($_SESSION["cart"]); // Re-index the cart array
                }
                break;
            }
        }
    }
}

header("Location: ../views/home.php");
?>
