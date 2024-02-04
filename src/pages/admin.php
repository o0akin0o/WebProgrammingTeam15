<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Page</title>
</head>
<body>

<div class="container mx-auto my-4">
    <!-- NAV BAR -->
    <?php include ('header.php'); ?>
    <!-- END OF NAV BAR -->

    <div class="container">
        <h1 class="my-4">Admin Page</h1>

        <!-- Display order list table and buttons -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Order List</h4>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product ID</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Fetch order list from the database -->

                        <?php
                        /*
                        // Fetch order list from the database and fill in the table
                        $query = "SELECT * FROM orders";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['order_id'] . "</td>";
                            echo "<td>" . $row['product_id'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        */
                        ?>
                        
                        </tbody>
                    </table>
                    <div class="mb-5">
                    <!-- Buttons for order and booking actions -->
                    <button class="btn btn-primary me-5">Cancel Order</button> 
                    <button class="btn btn-primary me-5">Complete Order</button>
                    <button class="btn btn-primary me-5">Cancel Booking</button>
                    <button class="btn btn-primary me-5">Complete Booking</button>
                    </div>
                </div>
            </div>
        </div>




        <?php
        /*
        // Database connection and data retrieval
        require_once 'db_connection.php'; // Include database connection file

        // Fetch data from the database
        $query = "SELECT * FROM reports"; // depend on the table, can calculate in a report table or calculate manually 
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $totalRevenueFromDatabase = $row['total_revenue']; // $totalRevenue = $totalBooking + $totalOrders
        $totalBookingsFromDatabase = $row['total_bookings'];
        $totalOrdersFromDatabase = $row['total_orders'];
        $totalCustomersFromDatabase = $row['total_customers']; */
        
        ?>
    


        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Report</h4>
                    <br>
                    <p>Total Revenue: <?php echo $totalRevenueFromDatabase; ?></p>
                    <p>Total Bookings: <?php echo $totalBookingsFromDatabase; ?></p>
                    <p>Total Orders: <?php echo $totalOrdersFromDatabase; ?></p>
                    <p>Total Customers: <?php echo $totalCustomersFromDatabase; ?></p>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include ('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
