<?php include('top_header.php'); ?><body>

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
                        include 'db_connection.php';

                        // Check if the DeleteOrder button was clicked and if an order ID was provided
                        if (isset($_POST['DeleteOrder']) && isset($_POST['order_id'])) {
                            $order_id = $_POST['order_id'];

                            // Construct the deletion query
                            $query = "DELETE FROM Orders WHERE id='$order_id'";

                            // Execute the deletion query
                            if (mysqli_query($conn, $query)) {
                                echo "Record Deleted with ID: $order_id <br>";
                            } else {
                                echo "Error deleting record: " . mysqli_error($conn);
                            }
                        }

                        // Fetch order list from the database and fill in the table
                        $sql = "SELECT * FROM Orders";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td><a href='update.php?id={$row['id']}'>{$row['id']}</a></td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['created_time']}</td>
                                        <td>{$row['status']}</td>
                                        <td>
                                            <form action='' method='POST'>
                                                <input type='hidden' name='order_id' value='{$row['id']}'>
                                                <button type='submit' name='DeleteOrder' class='btn btn-danger'>Delete</button>
                                            </form>
                                        </td>
                                       
                                            
                                        
                            
                                    </tr>";
                            }

                            echo "</tbody></table>";
                        } else {
                            echo "No results";
                        }

                        $conn->close();
                        ?>
                        

                    </tbody>
                    </table>
                    
            </div>
        </div>
 
        
    
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Report Page</h4>
                    <br>
                        <p>  <p><a href="report.php">To the report page</a></p></p>
            
                </div>
            </div>
        </div>

    </div>
</div>

<?php include ('footer.php'); ?>
<?php include ('footer_script.php'); ?>


