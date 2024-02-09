<?php
// Start the session
session_start();

// Include the database connection file
include 'db_connection.php';
$products = null;
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

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

      } else if (isset($_POST['order_click'])) {
        echo "order";
        exit;

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

    <!-- MY CART -->

    <div class="container mx-auto my-4">
      <a id="cart" class="link-success" href="cart.php"><i class="fa-solid fa-cart-shopping">My Cart (1)</i></a>
    </div>
    <div class="container">

      <!-- FORM -->
      <form action='cart.php?action=submit' method='post'>

        <div class="form-group row">
          <div class="jumbotron row mx-auto my-4">
            <h1 class="display-4">My Cart</h1>
            <hr class="my-4">
            <table class="table table-bordered table-responsive table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="" class="col-sm-1"></th>
                  <th scope="" class="col-sm-3">Name</th>
                  <th scope="" class="col-sm-2">Price</th>
                  <th scope="" class="col-sm-1">Quantity</th>
                  <th scope="" class="col-sm-3">Total</th>

                  <th scope="" class="col-sm-1">Delete</th>
                </tr>
              </thead>


              <tbody>
                <!-- WHILE LOOP -->
                <?php
                $num = 1;
                if ($products !== null && mysqli_num_rows($products) > 0) {
                  while ($row = mysqli_fetch_array($products)) { ?>

                    <tr>
                      <td>
                        <?= $num; ?>
                      </td>
                      <td>
                        <?= $row['name']; ?>
                      </td>
                      <td>
                        <?= $row['price']; ?>
                      </td>
                      <td>
                        <input type="text" value="<?= $_SESSION['cart'][$row['id']] ?>" class="form-control"
                          aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="qty[<?= $row['id']; ?>]">

                      </td>
                      <td>
                        <?= $row['price']; ?>
                      </td>

                      <td> <a class="btn btn-danger" href="cart.php?action=delete&id=<?= $row['id'] ?>">Delete</a></td>
                    </tr>

                    <?php
                    $num++;
                  }
                } else {

                  echo "Your cart is empty.";
                }


                ?>
                <!-- END WHILE LOOP -->


                <th scope="row"></th>
                <td><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td><strong>51.75€</strong></td>
                <td></td>
                </tr>
              </tbody>
            </table>
            <div class="submit-booking">

              <input type="submit" class="btn btn-primary submit" name="update_click" value="Update"></input>

              <a href="menu.php" class="btn btn-outline-success"><i class="fa-solid fa-cart-plus"></i>Continue
                Shopping</a>
            </div>

          </div>





          <!-- END FORM -->
          <!-- END CART -->
          <hr class="my-4">


          <div class="row">

            <div class="col-md-6">
              <div class="jumbotron">
                <h1 class="display-4">Order Review</h1>
                <p class="lead">Spinach, Tuna, and Egg Salad (1)</p>
                <p class="lead">Lemon Herb Chicken (1)</p>
                <p class="lead">Teriyaki Salmon (1)</p>
                <p class="lead">Shipping: 5€</p>
                <p class="lead">Tax: 5%</p>
                <hr class="my-4">
                <h3>Total: 51.75€</h3>


              </div>
            </div>

            <div class="col-md-6">

              <!-- CUSTOMER DETAIL FORM -->
              <form id="cart-form" action="cart.php?action=submit">
                <fieldset>
                  <div class="form-group">
                    <label for="" class="p-2">Name</label>
                    <input type="text" id="" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Phone</label>
                    <input type="text" id="" class="form-control" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Address</label>
                    <input type="text" id="" class="form-control" placeholder="123 Lesmurine">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Note</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="submit-booking">

                    <input type="submit" class="btn btn-primary" value="Complete Order" name="order_click"></input>
                  </div>
                </fieldset>
              </form>
            </div>
      </form>*
      <div class="col-md-1"></div>
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