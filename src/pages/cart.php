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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <?php include('links.php') ?>
  <title>Restaurant</title>
</head>

<body>
  <div class="container mx-auto my-4">
    <?php include 'header.php'; ?>
    <?php include 'login_nav.php'; ?>
    <!-- MY CART -->

    <div class="container mx-auto my-4">
      <a id="cart" class="link-success" href="cart.php"><i class="fa-solid fa-cart-shopping">My Cart</i></a>
    </div>
    <div class="container">

      <!-- FORM -->
      <form action='cart.php?action=submit' method='post'>

        <div class="form-group row">
          <div class="jumbotron row mx-auto my-4">
            <h1 class="display-4">My Cart</h1>
            <hr class="my-4">
            <table class="table table-bordered table-responsive table-striped">
             
                <!-- WHILE LOOP -->
                <?php
                $num = 1;
                $total = 0;
                if ($products !== null && mysqli_num_rows($products) > 0) { ?>
                  <thead class="thead-dark">
                  <tr>
                    <th scope="" class="col-sm-1"></th>
                    <th scope="" class="col-sm-3">Name</th>
                    <th scope="" class="col-sm-2">Price</th>
                    <th scope="" class="col-sm-1">Quantity</th>
                    <th scope="" class="col-sm-3">Total</th>
                    <th scope="" class="col-sm-1"></th>
                    <th scope="" class="col-sm-1"></th>
                  </tr>
                </thead>
                <tbody>
                
               <?php   while ($row = mysqli_fetch_array($products)) { ?>

                    <tr>
                      <td>
                        <?= $num; ?>
                      </td>
                      <td>
                        <?= $row['name']; ?>
                      </td>
                      <td>
                        <?= $row['price']; ?> €
                      </td>
                      <td>
                        <input type="number" value="<?= $_SESSION['cart'][$row['id']] ?>" class="form-control"
                          aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="qty[<?= $row['id']; ?>]">

                      </td>
                      <td>
                        <?= number_format(($row['price'] * $_SESSION['cart'][$row['id']]), 0, ",", "."); ?> €
                      </td>
                      <td><input type="submit" class="btn btn-outline-success submit" name="update_click"
                          value="Update"></input>
                      </td>
                      <td> <a class="btn btn-outline-danger" href="cart.php?action=delete&id=<?= $row['id'] ?>">Delete</a>
                      </td>
                    </tr>

                    <?php
                    $num++;
                    $total += ($row['price'] * $_SESSION['cart'][$row['id']]);
                  }
                  ?>
                  <th scope="row"></th>
                  <td><strong>Total</strong></td>
                  <td></td>
                  <td></td>
                  <td><strong>
                      <?= number_format($total, 0, ",", ".") ?> €
                    </strong></td>
                  <td></td>
                  </tr>
                </tbody>
              </table>

              <?php

                } else {

                  echo "Your cart is empty.";
                } ?>




            <!-- END WHILE LOOP -->


            <div class="submit-booking">

              <a href="menu.php" class="btn btn-success"><i class="fa-solid fa-cart-plus"></i>Continue
                Shopping</a>
            </div>

          </div>





          <!-- END FORM -->
          <!-- END CART -->



          <!-- CUSTOMER DETAIL FORM -->
          <?php if (!empty($error)) { ?>
            <div id="notify-msg">
              <?= $error ?>. <a href="menu.php">Continue Shopping</a>
            </div>
          <?php } else { ?>

          <?php } ?>
          <div class="booking">
            <div class="row">
              <div class="col-md-5"></div>
              <div class="col-md-2">
                <h3 class="booking-title">Contact Information</h3>

              </div>


              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form id="cart-form" action="cart.php?action=submit">
                    <fieldset>
                      <div class="form-group">
                        <label for="" class="p-2">Name</label>
                        <input type="text" id="" class="form-control" placeholder="Name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="" class="p-2">Phone</label>
                        <input type="text" id="" class="form-control" placeholder="Phone" name="phone">
                      </div>
                      <div class="form-group">
                        <label for="" class="p-2">Address</label>
                        <input type="text" id="" class="form-control" placeholder="123 Lesmurine" name="address">
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                      </div>
                      <div class="submit-booking">
                        <input type="submit" class="btn btn-primary" value="Complete Order" name="order_click"></input>
                      </div>
                    </fieldset>
                  </form>
                  <div class="col-md-3"></div>
                </div>

              </div>
            </div>

          </div>


          <!-- END OF CUSTOMER DETAIL FORM  -->






        </div>


        <?php include 'footer.php'; ?>
    </div><!-- END OF CONTAINER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>


</body>

</html>