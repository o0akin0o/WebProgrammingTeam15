<?php
// Start the session
session_start();

// Include the database connection file
include 'db_connection.php';

$products = null;
$error = false;

// Check if an action is requested
if (isset($_GET['action'])) {
    function update_cart($add = false) {
        global $conn;

        if (isset($_POST['qty']) && is_array($_POST['qty'])) {
            foreach ($_POST['qty'] as $id => $qty) {
                // Validate $id and $qty
                if (is_numeric($id) && is_numeric($qty)) {
                    $id = (int) $id;
                    $qty = (int) $qty;

                    if ($qty > 0) {
                        if ($add) {
                            $_SESSION['cart'][$id] = isset($_SESSION['cart'][$id]) ? ($_SESSION['cart'][$id] + $qty) : $qty;
                        } else {
                            $_SESSION['cart'][$id] = $qty;
                        }
                    } else {
                        unset($_SESSION['cart'][$id]);
                    }
                }
            }
        }
    }

    switch ($_GET['action']) {
        case "add":
            update_cart(true);
            break;

        case "delete":
            if (isset($_GET['id'])) {
                unset($_SESSION['cart'][$_GET['id']]);
            }
            header('Location: ./cart.php');
            exit;
            break;

        case "submit":
            if (isset($_POST['update_click'])) {
                update_cart();
                header('Location: ./cart.php');
                exit;
            } elseif (isset($_POST['order_click'])) {
                if (empty($_POST['qty'])) {
                    $error = "Your cart is empty";
                } elseif (empty($_POST['name']) && !empty($_POST['qty'])) {
                    $error = "You did not input name";
                } elseif (empty($_POST['phone']) && !empty($_POST['qty'])) {
                    $error = "You did not input phone number";
                } elseif (empty($_POST['address']) && !empty($_POST['qty'])) {
                    $error = "You did not input address";
                } else {
                    // Your order processing logic goes here
                }
            }
            break;
    }
}

if (!empty($_SESSION['cart'])) {
    $join = implode(",", array_keys($_SESSION['cart']));
    $products = mysqli_query($conn, "SELECT * FROM `Products` WHERE `id` IN ($join)");
}
?>
