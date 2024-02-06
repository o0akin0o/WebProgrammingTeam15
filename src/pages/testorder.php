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
// ORDER DETAILS
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve the submitted form data
    $orderItems = json_decode($_POST['order_items'], true);
    $totalOrder = $_POST['total_order'];
    $customerName = $_POST['customer_name'];
    $shipping = 5.00;
    $tax = $totalOrder * 0.05;
    $totalBill = $totalOrder + $shipping + $tax;

    // Insert the total bill, tax, and shipping into the Order table
    $insertOrderQuery = "INSERT INTO `Order` (CustomerName, TotalOrder, Shipping, Tax, TotalBill) 
            VALUES ('$customerName', '$totalOrder', '$shipping', '$tax', '$totalBill')";

    if ($conn->query($insertOrderQuery) === TRUE) {
        // Retrieve the ID of the inserted order
        $orderId = $conn->insert_id;

        // Insert the order items into the order_item table
        foreach ($orderItems as $item) {
            $itemId = $item['id'];
            $itemName = $item['name'];
            $itemPrice = $item['price'];
            $itemQuantity = $item['quantity'];

            $insertOrderItemQuery = "INSERT INTO order_item (order_id, item_id, item_name, item_price, item_quantity) 
                    VALUES ('$orderId', '$itemId', '$itemName', '$itemPrice', '$itemQuantity')";

            if ($conn->query($insertOrderItemQuery) !== TRUE) {
                echo "Error inserting order items: " . $conn->error;
                // You might want to handle the error appropriately (e.g., rollback transaction)
            }
        }

        echo "Order submitted successfully";
    } else {
        echo "Error inserting order: " . $conn->error;
        // You might want to handle the error appropriately (e.g., rollback transaction)
    }
}

// Close the database connection
$conn->close();
?>
<!-- END OF MENU -->

<?php
// Right side: Order Details
echo '<div class="col-md-6 text-center">';
echo '<h2 class="p-5">Order Details</h2>';
echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
echo '<input type="hidden" name="order_items" id="order_items_input">';
echo '<h4 id="orderDetails"></h4>';
echo '<h5 class="p-2">Total Order: $<span id="totalOrder">0.00</span></h5>';
echo '<h5 class="p-2">Shipping: $5.00</h5>';
echo '<h5 class="p-2">Tax (5%): $<span id="tax">0.00</span></h5>';
echo '<hr>';
echo '<h5 class="p-2">Total Bill: $<span id="totalBill">0.00</span></h5>';
echo '<button type="submit" name="submit" onclick="prepareOrderData()" class="btn btn-success mt-3">Complete Order</button>';
echo '</form>';
echo '</div>';
echo '</div>';
?>

    <script src="order.js"></script>

