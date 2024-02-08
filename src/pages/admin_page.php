<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('links.php'); ?>
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
                    
                        <!-- A.Fetch order list from the database -->

                    <?php
                    include 'db.php';
                        // Fetch order list from the database and fill in the table
                        $sql = "SELECT * FROM Orders";
                        // Execute the SQL query and store the result

                            $result = $conn->query($sql);
                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            echo "<table class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                        
                        
                    // Loop through the result set and display data in rows, update

                        while ($row = $result->fetch_assoc()) { 
                            echo "<tr>
                                    <td><a href='update_delete.php?ID=$row[ID]'>$row[ID]</a></td>
                                    <td>{$row['CustomerName']}</td>
                                    <td>{$row['OrderDate']}</td>
                                    <td>{$row['OrderStatus']}</td>
                    
                                  </tr>";
                        }
                    
                        echo "</tbody></table>";
                    }else {
                            // Display a message if no results are found
                            echo "No results";
                        }
                        // close the connection when done
                        $conn->close();
                    ?>
                        
                    </tbody>
                    </table>
                    <div class="mb-5">
                    <!-- Buttons for order and booking actions -->
                    <button class="btn btn-primary me-5" name="delete_order"><a href="update_delete.php" style="color: white;">Delete Order</a></button> 
                    <button class="btn btn-primary me-5" name="update_order"><a href="update_delete.php" style="color: white;">Update Order</a></button>
                    <button class="btn btn-primary me-5" name="delete_booking"><a href="update_delete.php" style="color: white;">Delete Booking</a></button>
                    <button class="btn btn-primary me-5" name="update_booking"><a href="update_delete.php" style="color: white;">Update Booking</a></button>

                    </div>
                </div>
            </div>
        </div>


        <?php
        
        // Database connection and data retrieval
         /*
        require_once 'db.php'; // Include database connection file
       
        // Fetch data from the database
        $query = "SELECT * FROM Orders"; // depend on the table, can calculate in a report table or calculate manually 
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

<?php include ('footer.php'); 

