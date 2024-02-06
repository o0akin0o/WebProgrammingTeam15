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
        // END OF MENU
    }
    ?>
    
    
    <?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Check if all required form fields are set
    if (isset($_POST['total_order'], $_POST['customer_name'], $_POST['order_items'])) {
        // Retrieve the submitted form data
        $orderItems = json_decode($_POST['order_items'], true);
        $totalOrder = $_POST['total_order'];
        $customerName = $_POST['customer_name'];
        $shipping = 5.00;
        $tax = $totalOrder * 0.05;
        $totalBill = $totalOrder + $shipping + $tax;

        // Prepare and execute the query to insert order details into the Order table
        $insertOrderQuery = "INSERT INTO `Order` (CustomerName, OrderDate, OrderStatus, TotalOrder, Shipping, Tax, TotalBill) 
            VALUES (?, NOW(), 'Pending', ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertOrderQuery);
        $stmt->bind_param("sdsss", $customerName, $totalOrder, $shipping, $tax, $totalBill);
        if ($stmt->execute()) {
            // Retrieve the ID of the inserted order
            $orderId = $conn->insert_id;

            // Insert the order items into the order_item table
            foreach ($orderItems as $item) {
                $itemId = $item['id'];
                $itemName = $item['name'];
                $itemPrice = $item['price'];
                $itemQuantity = $item['quantity'];

                // Prepare and execute the query to insert order item details into the order_item table
                $insertOrderItemQuery = "INSERT INTO order_item (order_id, item_id, item_name, item_price, item_quantity) 
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insertOrderItemQuery);
                $stmt->bind_param("iissi", $orderId, $itemId, $itemName, $itemPrice, $itemQuantity);
                if (!$stmt->execute()) {
                    // Handle insertion error for order item
                    // You may choose to log the error, display an error message, or rollback the transaction
                }
            }
            // Output success message or redirect the user to a success page
            echo "Order submitted successfully";
        } else {
            // Handle insertion error for order
            // You may choose to log the error, display an error message, or rollback the transaction
            echo "Error inserting order: " . $conn->error;
        }
    } else {
        // Handle missing form data
        // You may choose to display an error message or redirect the user to a form page
    }
    // Close the prepared statement
    $stmt->close();
}
// Close the database connection
$conn->close();
?>
