<?php
session_start();

if(isset($_GET['id_food'])) {
    $foodId = $_GET['id_food'];

    // Initialize the cart array if not already set
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the foodId to the cart
    $_SESSION['cart'][] = $foodId;

    // Get the updated cart count
    $cartCount = count($_SESSION['cart']);

    // Return the cart count as JSON
    header('Content-Type: application/json');
    echo json_encode(['cartCount' => $cartCount]);
    exit();
}

// Redirect back to the menu page if no food ID is provided
header("Location: ../../../pages/menu.php");
exit();
?>
