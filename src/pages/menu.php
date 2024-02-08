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
            <!-- SEARCH & SORT FOOD BY PRICE -->
            
                       </div>
            <div class="row mt-2">
            <div class="col-sm-3 col-md-3">
                <form action="" method="GET">
                  <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Your dishes" aria-label="Search" aria-describedby="button-addon2" name="name">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
  
                </div>
                </form>
            </div>
            <div class="col-sm-7 col-md-7"></div>
            <div id="filter-box" class="col-sm-2 col-md-2">
            <select 
                id="sort-box" 
                class="form-select" 
                aria-label="Default select example"
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
            >
              <option selected>Price Sorting</option>
              <option value="?field=price&sort=asc">Ascending</option>
              <option value="?field=price&sort=desc">Descending</option>
            </select>
            </div>
            </div>
            </div>
            <!-- END SEARCH & SORTING PRICE -->
            <div class="container">
            <form action="" method="post" class="">
                <div class="row my-4 mt-4">
                    <h1 class="heading">Salads</h1>
                </div>
                
                <?php
            
                    // SALADS
                    include 'db_connection.php';
                    $sql = "SELECT img_path, name, description, price FROM Products where category='Salads'";
                    $result = $conn->query($sql);
                    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                    $search = isset($_GET['name']) ? $_GET['name'] : "";
                   
                
                    
            
                    if(!empty($orderField) && !empty($orderSort)){
                        $orderCondition = "ORDER BY `Products`.`".$orderField."` ".$orderSort."";
                        $sqlSort = "SELECT id, img_path, name, description, price FROM Products where category='Salads' $orderCondition";
                        $result = $conn->query($sqlSort);
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
                                    // echo '<button type="submit" name="add-to-cart" class="btn btn-success"><i class="fa-solid fa-cart-plus p-1"></i>Order Now</button>';
                                
                                    echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                                    echo '<a class="btn btn-success" href="cart.php?pid=' . $row['id'] . '">Order Now</a>';
                                    echo '<a id="orderBtn" class="btn btn-success" href="cart.php?pid=' . $row['id'] . '" onclick="addToCart(' . $row['id'] . ')">Order Now</a>';



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
                } else if ($search){
                    $sqlSearch = "SELECT img_path, name, description, price FROM Products WHERE category LIKE 'Salads' AND `name` LIKE '%" . $search . "%'";

                    $result = $conn->query($sqlSearch);
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
                        // echo 'No menu items available.';
                    }
                
                
                } else {
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
                    // echo 'No menu items available.';
                }
                
                
                }
                    
                    // close connection
                    $conn->close();
                ?>
                <!-- END OF SALADS -->
                
                <!-- MAIN DISHES -->
            <div class="row my-4 mt-4">
                <h1 class="heading">Main Dishes</h1>
            </div>
            <?php
                    include 'db_connection.php';
                    $sql = "SELECT img_path, name, description, price FROM Products where category='Main Dishes'";
                    $result = $conn->query($sql);
                    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                    if(!empty($orderField) && !empty($orderSort)){
                        $orderCondition = "ORDER BY `Products`.`".$orderField."` ".$orderSort."";
                        $sqlSort = "SELECT img_path, name, description, price FROM Products where category='Main Dishes' $orderCondition";
                        $result = $conn->query($sqlSort);
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
                } else if ($search){
                    $sqlSearch = "SELECT img_path, name, description, price FROM Products WHERE category='Main Dishes' AND `name` LIKE '%" . $search . "%'";

                    $result = $conn->query($sqlSearch);
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
                        // echo 'No menu items available.';
                    }
                
                
                } else {
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
                
                
                }
                    
                    // close connection
                    $conn->close();
                ?>
                <div class="row my-4 mt-4">
                    <h1 class="heading">Sweets</h1>
                </div>
                <!-- END OF MAIN DISHES -->
                
                <!-- SWEETS -->
                <?php
                    include 'db_connection.php';
                    $sql = "SELECT img_path, name, description, price FROM Products where category='Sweets'";
                    $result = $conn->query($sql);
                    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                    if(!empty($orderField) && !empty($orderSort)){
                        $orderCondition = "ORDER BY `Products`.`".$orderField."` ".$orderSort."";
                        $sqlSort = "SELECT img_path, name, description, price FROM Products where category='Sweets' $orderCondition";
                        $result = $conn->query($sqlSort);
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
                } else if ($search){
                    $sqlSearch = "SELECT img_path, name, description, price FROM Products WHERE category='Sweets' AND `name` LIKE '%" . $search . "%'";

                    $result = $conn->query($sqlSearch);
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
                        // echo 'No menu items available.';
                    }
                
                
                } else {
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
                
                
                }
                    
                    // close connection
                    $conn->close();
                ?>
            </div> <!-- END OF CONTAINER -->
            </form>
        </div><!-- END OF CONTAINER -->
        
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
            
            <script>

<script>

function addToCart(productId) {
    orderedProductIds.push(productId);
    console.log("Product ID " + productId + " added to array.");
    console.log("Ordered Product IDs: " + orderedProductIds.join(', '));
}
</script>
            
        <?php include 'footer.php'; ?>
    

    </body>
</html>
