<?php
// check user login by cookie
$loggedIn = isset($_COOKIE["name"]);

// Thiết lập biến link tùy thuộc vào trạng thái đăng nhập của người dùng
if ($loggedIn) {
    $link = 'menu.php'; // if login then load menu page again
} else {
    $link = 'login.php'; // if not login then redirect to login page
}

$prevPage = $_SERVER['REQUEST_URI'];
setcookie("prev_page", $prevPage, time() + 3600, "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('links.php'); ?>
    <title>Restaurant</title>
</head>
<body>
<div class="container mx-auto my-4">
    <?php include 'header.php'; ?>
    <?php include ('login_nav.php'); ?>

    <div class="container">

        <div class="row my-4 mt-4">
            <h1 class="heading">Dish</h1>
        </div>

        <?php
        // Include database connection
        include 'db_connection.php';

        // Check if 'id' parameter is set in the URL
        if(isset($_GET['id'])) {
            // Prepare SQL query to fetch product details based on 'id' parameter
            $id = $_GET['id'];
            $sql = "SELECT img_path, name, description, price FROM Products WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $product = mysqli_fetch_assoc($result);
            // Execute the query
            $result = $conn->query($sql);

            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Loop through each row and display product details
                while ($row = $result->fetch_assoc()) {
                    echo '<form id="add-to-cart-form" action="cart.php?action=add" method="POST">';
                    echo '<div class="row my-4 mt-4">';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '<div class="col-sm-5 col-md-5">';
                    echo '<img class="imgmenu" src="' . $row['img_path'] . '" alt="Card image cap">';
                    echo '</div>';
                    echo '<div class="col-sm-5 col-md-5 bn-content">';
                    echo '<p class="">' . $row['name'] . '</p>';
                    echo '<p class="">' . $row['description'] . '</p>';
                    echo '<p class="">' . $row['price'] . '$</p>';
                    echo '<input type="text" value="1" name="quantity[<?= $product['id'] ?>]" />';
                    echo '<div class="card-body">';
                    echo '<input type="submit" value="Order" />';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '</div>';
                    echo '<br>';
                    echo '</form>';
                }
            } else {
                // No products found with the specified 'id'
                echo 'No menu items available.';
            }
        } else {
            // 'id' parameter is not set in the URL
            echo 'No product ID specified.';
        }

        // Close database connection
        $conn->close();
        ?>
    </div> <!-- END OF CONTAINER -->
</div><!-- END OF CONTAINER -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
<?php include 'footer.php'; ?>

</body>
</html>
