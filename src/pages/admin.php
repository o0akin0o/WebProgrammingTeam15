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
                    
                        <!-- A.Fetch order list from the database -->

                    <?php
                    include 'db_connection.php';
                        // Fetch order list from the database and fill in the table
                        $sql ="SELECT * FROM Orders";
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
                        
                        
                    // Loop through the result set and display data in rows, update as column in database

                            while ($row = $result->fetch_assoc()) { 
                                echo "<tr>
                                        <td><a href='update_delete.php?id=$row[id]'>$row[id]</a></td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['created_time']}</td>
                                        <td>{$row['status']}</td>
                        
                                    </tr>";
                            }
               
                        echo "</tbody></table>";
                    } else {
                            // Display a message if no results are found
                            echo "No results";
                        }
                        // close the connection when done
                        $conn->close();
                    ?>
                        

                    </tbody>
                    </table>
                    
            </div>
        </div>
 
        
    
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Update Status</h4>
                    <br>
                    <p> Admin can update Order status by clicking to ID number of each Customer Name</p>
                    
                </div>
            </div>
        </div>

    </div>
</div>

<?php include ('footer.php'); 

