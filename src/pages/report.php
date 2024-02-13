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
                    <h4>Report</h4>
                    <br>
                    
                        <!-- Fetch order list from the database -->

                    <?php
                    include 'db_connection.php';
                        // Fetch order list from the database and fill in the table
                        $sql ="SELECT * FROM Order_Details";
                        // Execute the SQL query and store the result
                            $result = $conn->query($sql);

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            echo "<table class='table table-striped'>
                                    <thead>
                                        <tr>
                                            <th>OrderID</th>
                                            <th>ProductID</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                        
                        
                    // Loop through the result set and display data in rows, update as column in database
                            $totalRevenue = 0;
                            while ($row = $result->fetch_assoc()) { 
                                $revenue = $row['quantity'] * $row['price']; 
                                $totalRevenue += $revenue; 
                                echo "<tr>
                                        <td>{$row['order_id']}</td>
                                        <td>{$row['product_id']}</td>
                                        <td>{$row['price']}</td>
                                        <td>{$row['quantity']}</td>
                                        <td>$revenue</td>
                                    </tr>";
                            }
                    
                        echo "</tbody></table>";
                        
                        echo "<p>Total Revenue: $totalRevenue Euros</p>";
                    } else {
                            // Display a message if no results are found
                            echo "No results";
                        }
                        // Close the connection when done
                        $conn->close();
                    ?>

                
                    <?php
                    // Find total customer: base on customer ID
                    include 'db_connection.php';
                        // Fetch order list from the database and fill in the table
                        $sql ="SELECT Count(id) FROM Customers";
                        // Execute the SQL query and store the result
                            $result = $conn->query($sql);

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { 
                            echo "<p>Total number of customers: {$row['Count(id)']}</p>";
                            }
                    } else {
                            // Display a message if no results are found
                            echo "No results";
                        }
                        // Close the connection when done
                        $conn->close();

                    ?>

                        
                    <?php
                    // Find total bookings: base on booking ID
                    include 'db_connection.php';
                        // Fetch order list from the database and fill in the table
                        $sql ="SELECT Count(id) FROM Booking";
                        // Execute the SQL query and store the result
                            $result = $conn->query($sql);

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { 
                            echo "<p>Total number of bookings: {$row['Count(id)']}</p>";
                            }
                    } else {
                            // Display a message if no results are found
                            echo "No results";
                        }
                        // Close the connection when done
                        $conn->close();

                    ?>
			
			<?php
                    // Find total orders online: base on order ID
                    include 'db_connection.php';
                        // Fetch order list from the database and fill in the table
                        $sql ="SELECT Count(id) FROM Orders";
                        // Execute the SQL query and store the result
                            $result = $conn->query($sql);

                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { 
                            echo "<p>Total number of online orders: {$row['Count(id)']}</p>";
                            }
                    } else {
                            // Display a message if no results are found
                            echo "No results";
                        }
                        // Close the connection when done
                        $conn->close();

                    ?>

                    </tbody>
                    </table>
                    
            </div>
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
<?php include ('footer_script.php'); ?>
</body>
</html>
