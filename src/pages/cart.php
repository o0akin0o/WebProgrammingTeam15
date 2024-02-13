<?php include("./features/cart_feature.php"); ?>
<?php include('top_header.php'); ?>

<body>
  <div class="container mx-auto my-4">
    <?php include 'header.php'; ?>
    <?php include 'second_nav.php'; ?>
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
              if ($products !== null && mysqli_num_rows($products) > 0) {
                ?>
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
                  <?php
                  while ($row = mysqli_fetch_array($products)) { ?>
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
    <?php include('footer_script.php'); ?>
</body>

</html>