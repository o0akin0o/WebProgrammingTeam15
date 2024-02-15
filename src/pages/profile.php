<?php $prevPage = $_SERVER['REQUEST_URI'];
setcookie("prev_page", $prevPage, time() + 3600, "/");
?>
<?php
    // check login or not
    if (!isset($_COOKIE['customersid'])) {
        // if not redirect to index.php
        header("Location: index.php");
        exit; 
    }

    // if cookie has, continous 
    $customersid = $_COOKIE['customersid'];
    include 'db_connection.php';
    $sql = "SELECT * FROM Customers where id='$customersid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name= $row["name"];
    $email= $row["email"];
    $phone= $row["phone"];
    $address= $row["address"];
    $sql1= "SELECT * FROM `Booking` where customer_id='$customersid' and status='Pending'";
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $people= $row["number_of_guest"];
        $date= $row["booking_date"];
        $time= $row["booking_time"];
        $isbooking=true;
    } else{
        $isbooking=false;
    }
?>

<?php
    // Check if the Cancel Order button is clicked
    if(isset($_POST['cancelorder'])) {
        // Get the id of the order to cancel
        $orderIdToCancel = $_POST['orderIdToCancel'];
        
        // Update the status of the order to 'Cancel'
        $sqlCancelOrder = "UPDATE Orders SET status = 'Cancel' WHERE id = '$orderIdToCancel'";
        if ($conn->query($sqlCancelOrder) === TRUE) {
            echo "<p class='alert alert-success'>Order is cancelled.</p>";
        } else {
            echo "<p class='alert alert-danger'>Error while cancelling order: " . $conn->error . "</p>";
        }
    }
?>
<?php
    if(isset($_POST['cancelbooking'])) {
        // update status booking
        $sqlCancel = "UPDATE `Booking` SET status = 'cancel' WHERE customer_id = '$customersid'";
        if ($conn->query($sqlCancel) === TRUE) {
            echo "<p class='alert alert-success'>Booking is Cancel.</p>";
        } else {
            echo "<p class='alert alert-danger'>Error while Cancel Booking " . $conn->error . "</p>";
        }
    }
?>

<?php include('top_header.php'); ?>
    <body>
        <div class="container mx-auto my-4">
            <!-- NAV BAR -->
            <?php include ('header.php'); ?>
            <?php include ('second_nav.php'); ?>
            <!-- END OF NAV BAR -->
            <div class="row my-4 mt-4">
                    <div class="row card-container">
                        <div
                            class="card text-center shadow p-3 mb-5 bg-white rounded"
                            style="width: 20rem; height: auto;">
                            <div class="card-body">
                                <h5 class="card-title">Profile</h5>
                                <p class="card-text" style="text-align: left;">Name: <?php echo $name; ?></p>
                                <p class="card-text" style="text-align: left;">Phone: <?php echo $phone; ?> </p>
                                <p class="card-text" style="text-align: left;">Email: <?php echo $email; ?></p>
                                <p class="card-text" style="text-align: left;">Address: <?php echo $address; ?></p>
                                <a href="edit_profile.php" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                        
                        <?php
                            // Select orders for the current customer with status 'Pending'
                            $sql2 = "SELECT id FROM Orders WHERE customer_id='$customersid' AND status='Pending'";
                            $result = $conn->query($sql2);

                            // Check if there are any pending orders
                            if ($result->num_rows > 0) {
                                // Loop through each pending order
                                while ($row = $result->fetch_assoc()) {
                                    $idorder = $row["id"];
                                    $sql3 = "SELECT p.name, o.quantity, o.price FROM Products p INNER JOIN Order_Details o ON p.id=o.product_id WHERE o.order_id='$idorder'";
                                    $result3 = $conn->query($sql3);

                                    // Check if there are any products in the order
                                    if ($result3->num_rows > 0) {
                            ?>
                                        <!-- Card for each order -->
                                        <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width: 30rem; height: auto;">
                                            <div class="card-body">
                                                <h5 class="card-title">Current Order</h5>
                                                <table class="table">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col" class="col-sm-6 col-md-5 col-sm-5">Name</th>
                                                            <th scope="col" class="col-sm-3 col-md-3">Quantity</th>
                                                            <th scope="col" class="col-sm-3 col-md-3 col-sm-3">Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            // Loop through each product in the order
                                                            while ($row3 = $result3->fetch_assoc()) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $row3['name']; ?></td>
                                                                    <td><?php echo $row3['quantity']; ?></td>
                                                                    <td><?php echo $row3['price']; ?></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <!-- Form to cancel order -->
                                                <form method="post">
                                                    <!-- Hidden field to store the id of the order to cancel -->
                                                    <input type="hidden" name="orderIdToCancel" value="<?php echo $idorder; ?>">
                                                    <button type="submit" class="btn btn-primary" name="cancelorder">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>

                    <?php
                        if ($isbooking) {
                    ?>
                            <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width: 20rem; height: auto;">
                                <div class="card-body">
                                    <h5 class="card-title">Current Booking</h5>
                                    <p class="card-text" style="text-align: left;">People: <?php echo $people; ?></p>
                                    <p class="card-text" style="text-align: left;">Date: <?php echo $date; ?> </p>
                                    <p class="card-text" style="text-align: left;">Time: <?php echo $time; ?></p>
                                    <form method="post">
                                        <button type="submit" class="btn btn-primary" name="cancelbooking">Cancel</button>
                                    </form>
                                </div>
                            </div>
                    <?php
                        } else {
                    ?>
                            <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width: 20rem; height: auto;">
                                <div class="card-body">
                                    <h5 class="card-title">Current Booking</h5>
                                    <p class="card-text">No booking</p>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
            </div>
         <!-- END FORM -->
            <?php include 'footer.php'; ?>
        </div>       
    </body>
