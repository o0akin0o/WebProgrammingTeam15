<?php
// Start the session
session_start();

// Include the database connection file
include 'db_connection.php';

$products = null;
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}
$error = false;
// Check if an action is requested
if (isset($_GET['action'])) {
  function update_cart($add = false)
  {

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
      break;
    case "submit":




      if (isset($_POST['update_click'])) {
        update_cart();
        header('Location: ./cart.php');

      } elseif (isset($_POST['order_click'])) {

        if (empty($_POST['qty'])) {
          $error = "Your cart is empty";
        } elseif (empty($_POST['name']) && !empty($_POST['qty'])) {
          $error = "You did not input name";

        } elseif (empty($_POST['phone']) && !empty($_POST['qty'])) {
          $error = "You did not input phone number";

        } elseif (empty($_POST['address']) && !empty($_POST['qty'])) {
          $error = "You did not input address";

        } elseif ($error == false && !empty($_POST['qty'])) {

          if (!isset($_COOKIE["name"])) {
            // Redirect to login if customer ID is not set
            echo "<script>alert('Please login first.');</script>";
            // Redirect to login page after the alert
            echo "<script>window.location = 'login.php';</script>";
            header("Location: login.php");
            exit;
          } else {
            $customerName = $_COOKIE["name"];
            $sql = "SELECT id FROM Customers WHERE name = '$customerName'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              // Fetch the row and retrieve the customer ID
              $row = mysqli_fetch_assoc($result);
              $customerId = $row['id'];

              // Calculate total
              $total = 0;
              $name = $_POST['name'];
              $phone = $_POST['phone'];
              $address = $_POST['address'];
              $note = $_POST['note'];

              $join = implode(",", array_keys($_POST['qty']));
              $products = mysqli_query($conn, "SELECT * FROM `Products` WHERE `id` IN ($join)");

              while ($row = mysqli_fetch_array($products)) {
                $total += $row['price'] * $_POST['qty'][$row['id']];
                $proId = $row['id'];
                $proQty = $_POST['qty'][$row['id']];
                $proPrice = $row['price'];
              }

              // Insert order into Orders table
              $insertOrder = mysqli_query($conn, "INSERT INTO `Orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`, `customer_id`, `status`) VALUES (NULL, '$name', '$phone', '$address', '$note', '$total', NOW(), NOW() , '$customerId', 'Pending')");
              $orderId = $conn->insert_id;

              // Insert order details into Order_Details table
              $insertOrderDetails = mysqli_query($conn, "INSERT INTO `Order_Details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES (NULL, '$orderId', '$proId', '$proQty', '$proPrice', NOW(), NOW())");

              // Redirect to thank you page if order details inserted successfully
              if ($insertOrderDetails) {
                unset($_SESSION['cart']);
                header("Location: thankyou.php");
                
                exit;
              } else {
                // Handle the case where order details insertion failed
                echo "Failed to insert order details.";
              }
            } else {
              // Handle the case where customer ID couldn't be retrieved
              echo "Customer ID not found for the provided name.";
            }

          }
        }
      }
  }
}

if (!empty($_SESSION['cart'])) {
  $join = implode(",", array_keys($_SESSION['cart']));
  $products = mysqli_query($conn, "SELECT * FROM `Products` WHERE `id` IN ($join)");

}
?>
