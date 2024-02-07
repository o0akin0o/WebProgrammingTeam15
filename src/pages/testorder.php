<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('links.php'); ?>
    <title>Restaurant</title>
</head>
<body>

    <div class="container mx-auto my-4">

        <!-- NAV BAR -->
        <?php include('header.php'); ?>
        <!-- END OF NAV BAR -->
       
        <div class="container">

            <?php
            // Include your database connection code
            include('db_connection.php'); 

            // Fetch menu items from the database
            $sql = "SELECT * FROM Products";
            $result = $conn->query($sql);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
                echo '<div class="row">';
                // Left side: Menu List
                echo '<div class="col-md-6">';
                echo '<h2 class="mt-5">Order</h2>';
                echo '<ul class="list-group bg-transparent" id="menuList">';
                while ($row = $result->fetch_assoc()) {
                    // Display each menu item dynamically
                    echo '<li class="list-group-item bg-transparent d-flex justify-content-between align-items-center">';
                    echo '<div>';
                    echo '<h4>' . $row['name'] . '</h4>';
                    echo '<p>Price: ' . $row['price'] . '$</p>';
                    echo '<p>Quantity: <span id="quantity_' . $row['id'] . '">0</span></p>';
                    echo '</div>';
                    // Add "Add" and "Remove" buttons with margin-right
                    echo '<div class="ms-auto">';
                    echo '<button class="btn btn-outline-success me-2" onclick="addToOrder(' . $row['id'] . ', \'' . $row['name'] . '\', ' . $row['price'] . ')">Add</button>';
                    echo '<button class="btn btn-outline-danger" onclick="removeFromOrder(' . $row['id'] . ')">Remove</button>';
                    echo '</div>';
                    echo '</li>';
                }
                echo '</ul>';
                echo '</div>';



                // Right side: Order Details
                echo '<div class="col-md-6 text-center">';
                echo '<h2 class="p-5">Order Details</h2>';
                echo '<h4 id="orderDetails"></h4>';
                echo '<h5 class="p-2">Total Order: $<span id="totalOrder">0.00</span></h5>';
                echo '<h5 class="p-2">Shipping: $5.00</h5>';
                echo '<h5 class="p-2">Tax (5%): $<span id="tax">0.00</span></h5>';
                echo '<hr>';
                echo '<h5 class="p-2">Total Bill: $<span id="totalBill">0.00</span></h5>';
                echo '<button class="btn btn-success mt-3" onclick="completeOrder()">Complete Order</button>';
                echo '</div>';
                echo '</div>';
            } else {
                echo 'No menu items available.';
            }

            // Close the database connection
            $conn->close();
            ?>

        </div>

        <?php include('footer.php'); ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    
    <script src="order.js"></script>
</body>
</html>
