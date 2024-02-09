<?php
// check user login by cookie
$loggedIn = isset($_COOKIE["name"]);

// Thiết lập biến link tùy thuộc vào trạng thái đăng nhập của người dùng
if($loggedIn) {
    $link = 'menu.php'; // if login then load menu page again
} else {
    $link = 'login.php'; // if not login then redirect to login page
}
?>
<?php $prevPage = $_SERVER['REQUEST_URI'];
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
             
                    // SALADS
                    include 'db_connection.php';
                    
                    $sql = "SELECT img_path, name, description, price FROM Products where id = .$_GET['id'])";
                    $result = $conn->query($sql);
                    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                  
                    if(!empty($orderField)){
                        $sql = "SELECT * FROM Products";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            
                            while ($row = $result->fetch_assoc()) {
                             // Display each menu item dynamically
                                
                                    echo '<div class="row my-4 mt-4">';
                                    echo '<div class="col-sm-1 col-md-1"></div>';
                                    echo '<div class="col-sm-5 col-md-5">';
                                    echo '<img class="imgmenu" src="' . $row['img_path'] . '" alt="Card image cap">';
                                    echo '</div>';
                                    echo '<div class="col-sm-5 col-md-5 bn-content">';
                                    echo '<p class="">' . $row['name'] . '</p>';
                                    echo '<p class="">' . $row['description'] . '</p>';
                                    echo '<p class="">' . $row['price'] . '$</p>';
                                    echo '<div class="card-body">';
                                    echo '<a href="cart.php" class="btn btn-primary">Order Now</a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-sm-1 col-md-1"></div>';
                                    echo '</div>';
                                    echo '<br>';
                                    } 
                    } else {
                        echo 'No menu items available.';
                    }
                    }
             
                    
                    // close connection
                    $conn->close();
                ?>
            </div> <!-- END OF CONTAINER -->
        </div><!-- END OF CONTAINER -->
        
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
        <?php include 'footer.php'; ?>
    
    </body>
</html>
