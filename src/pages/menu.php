<?php include('./features/login_check.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('links.php'); ?>
    <title>Restaurant</title>
</head>

<body>
    <div class="container mx-auto my-4">
        <?php include 'header.php'; ?>
        <?php include('second_nav.php'); ?>
        <?php include('./features/search_sort.php'); ?>


        <div class="container">
            <form action="" class="quick-buy-form" method="post">
                <div class="row my-4 mt-4">
                    <h1 class="heading">Salads</h1>
                </div>

                <?php

                // SALADS
                include 'db_connection.php';
                $sql = "SELECT id, img_path, name, description, price FROM Products where category='Salads'";
                $result = $conn->query($sql);
                $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                $search = isset($_GET['name']) ? $_GET['name'] : "";

                if (!empty($orderField) && !empty($orderSort)) {
                    $orderCondition = "ORDER BY `Products`.`" . $orderField . "` " . $orderSort . "";
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
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';

                                 // ADD TO CART 
     
                                // FORM
                               
                                echo '<form class="quick-buy-form" action="./features/process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>'; 
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
                

                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
                                
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                } else if ($search) {
                    $sqlSearch = "SELECT id, img_path, name, description, price FROM Products WHERE category LIKE 'Salads' AND `name` LIKE '%" . $search . "%'";

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
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';
                                
                                echo '<div class="card-body">';
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                $sql = "SELECT id, img_path, name, description, price FROM Products where category='Main Dishes'";
                $result = $conn->query($sql);
                $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                if (!empty($orderField) && !empty($orderSort)) {
                    $orderCondition = "ORDER BY `Products`.`" . $orderField . "` " . $orderSort . "";
                    $sqlSort = "SELECT id, img_path, name, description, price FROM Products where category='Main Dishes' $orderCondition";
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
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                } else if ($search) {
                    $sqlSearch = "SELECT id, img_path, name, description, price FROM Products WHERE category='Main Dishes' AND `name` LIKE '%" . $search . "%'";

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
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                $sql = "SELECT id, img_path, name, description, price FROM Products where category='Sweets'";
                $result = $conn->query($sql);
                $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                if (!empty($orderField) && !empty($orderSort)) {
                    $orderCondition = "ORDER BY `Products`.`" . $orderField . "` " . $orderSort . "";
                    $sqlSort = "SELECT id, img_path, name, description, price FROM Products where category='Sweets' $orderCondition";
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
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                } else if ($search) {
                    $sqlSearch = "SELECT id, img_path, name, description, price FROM Products WHERE category='Sweets' AND `name` LIKE '%" . $search . "%'";

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
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '</div>';
                                echo '<br>';
                            } else {
                                echo '<div class="row my-4 mt-4">';
                                echo '<div class="col-sm-1 col-md-1"></div>';
                                echo '<div class="col-sm-5 col-md-5 bn-content">';
                                echo '<h3 class="mb-3">' . $row['name'] . '</h3>';
                                echo '<p class="">' . $row['description'] . '</p>';
                                echo '<h5 class="">' . $row['price'] . '$</h5>';

                                echo '<div class="card-body">';
                                  // ADD TO CART 
   
                
                                // FORM
                                echo '<form class="quick-buy-form" action="process_cart.php?action=add" method="post" >';
                                echo '<input type="hidden" qty="' . $row['id'] . '" value="1" name="qty[' . $row['id'] . ']"></input>';
                                echo '<input type="submit" class="quick-buy-form btn btn-outline-success" value="+"></input>';
                                echo '<span class="m-1"></span>';
                                echo '<a href="add-to-cart.php?id=' . $row['id'] . '" class="btn btn-primary">Details</a>';
                                echo '</form>';
                                // END FORM
                
                                // END ADD TO CART 
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
                <?php include 'footer.php'; ?>
        </div> <!-- END OF CONTAINER -->
        </form>
    </div><!-- END OF CONTAINER -->
    <?php include ('footer_script.php'); ?>

    <script>
        $(document).ready(function () {

            $('.quick-buy-form').submit(function (e) {

                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: './features/process_cart.php?action=add', // Corrected URL
                    data: formData,
                    success: function (response) {
                        
                        alert('Dish added successfully');
                       
                    }
                });
            });
        });
    </script>


</body>

</html>