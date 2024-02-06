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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;1,400;1,600&family=Montserrat:ital,wght@0,300;0,400;0,700;1,500&display=swap" rel="stylesheet">
        <title>Restaurant</title>
    </head>
    <body>
            <div class="container mx-auto my-4">
            <?php include 'header.php'; ?>       
            <div class="container">
                
                <div class="row my-4 mt-4">
                    <h1 class="heading">Salads</h1>
                </div>
                
                <?php
                    include 'db_connection.php';
                    $sql = "SELECT img_path, name, description, price FROM Products where category='Salads'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            // Display each menu item dynamically
                            if ($count % 2 == 1) {
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
                                echo '<a href="' . $link . '" class="btn btn-primary">Order Now</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<p class="">' . $row['name'] . '</p>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<p class="">' . $row['price'] . '$</p>';
                                echo '<div class="card-body">';
                                echo '<a href="' . $link . '" class="btn btn-primary">Order Now</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-5 col-md-5">';
                                echo '<img class="imgmenu" src="' . $row['img_path'] . '" alt="Card image cap">';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            }
                            $count++;
                        }
                    } else {
                        echo 'No menu items available.';
                    }
                    
                    // close connection
                    $conn->close();
                ?>
            <div class="row my-4 mt-4">
                <h1 class="heading">Main Dishes</h1>
            </div>
            <?php
                    include 'db_connection.php';
                    $sql = "SELECT img_path, name, description, price FROM Products where category='Main Dishes'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            // Display each menu item dynamically
                            if ($count % 2 == 1) {
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
                                echo '<a href="' . $link . '" class="btn btn-primary">Order Now</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<p class="">' . $row['name'] . '</p>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<p class="">' . $row['price'] . '$</p>';
                                echo '<div class="card-body">';
                                echo '<a href="' . $link . '" class="btn btn-primary">Order Now</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-5 col-md-5">';
                                echo '<img class="imgmenu" src="' . $row['img_path'] . '" alt="Card image cap">';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            }
                            $count++;
                        }
                    } else {
                        echo 'No menu items available.';
                    }
                    
                    // close connection
                    $conn->close();
                ?>
                <div class="row my-4 mt-4">
                    <h1 class="heading">Sweets</h1>
                </div>
                <?php
                    include 'db_connection.php';
                    $sql = "SELECT img_path, name, description, price FROM Products where category='Sweets'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            // Display each menu item dynamically
                            if ($count % 2 == 1) {
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
                                echo '<a href="' . $link . '" class="btn btn-primary">Order Now</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<p class="">' . $row['name'] . '</p>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<p class="">' . $row['price'] . '$</p>';
                                echo '<div class="card-body">';
                                echo '<a href="' . $link . '" class="btn btn-primary">Order Now</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-5 col-md-5">';
                                echo '<img class="imgmenu" src="' . $row['img_path'] . '" alt="Card image cap">';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            }
                            $count++;
                        }
                    } else {
                        echo 'No menu items available.';
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
