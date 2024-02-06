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
    <?php
        include 'db_connection.php';
        $sql = "SELECT name, description, price, img_path FROM Products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count=1;
            while ($row = $result->fetch_assoc()) {
                if ($count%2== 1) {
                    echo '<div class="container mx-auto my-4">';
                    echo '<div class="container">';
                    echo '<div class="row my-4 mt-4">';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '<div class="col-sm-5 col-md-5">';
                    echo '<img class="imgmenu" src="' . $row["img_path"] . '" alt="Card image cap">';
                    echo '</div>';
                    echo '<div class="col-sm-5 col-md-5 bn-content">';
                    echo '<p class="">' . $row["name"] . '<br>' . $row["description"] . '</p>';
                    echo '<p class="">' . $row["price"] . '$</p>';
                    echo '<div class="card-body">';
                    echo '<a href="#" class="btn btn-primary">Order Now</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    //echo '<h5 class="card-title">Product ' . $count . '</h5>';
                    $count++;
                } else {
                    echo '<div class="container mx-auto my-4">';
                    echo '<div class="container">';
                    echo '<div class="row my-4 mt-4">';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '<div class="col-sm-5 col-md-5">';
                    echo '<p class="">' . $row["name"] . '<br>' . $row["description"] . '</p>';
                    echo '<p class="">' . $row["price"] . '$</p>';
                    echo '<div class="card-body">';
                    echo '<a href="#" class="btn btn-primary">Order Now</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-5 col-md-5 bn-content">';
                    echo '<img class="imgmenu" src="' . $row["img_path"] . '" alt="Card image cap">';
                    echo '</div>';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    //echo '<h5 class="card-title">Product ' . $count . '</h5>';
                    $count++;
                }
                
            }
        } else {
            echo "0 results";
        }
        
        // close connection
        $conn->close();
    ?>
        <div class="container mx-auto my-4">
            <?php include 'header.php'; ?>       
            <div class="container">
                
                <div class="row my-4 mt-4">
                    <h1 class="heading">Salads</h1>
                </div>
                
                <!-- ROW 1 -->
                <!-- Content Row -->
                <div class="row">
                    <div class="row my-4 mt-4">
                        <div class="col-sm-1 col-md-1"></div>              
                        <div class="col-sm-5 col-md-5">
                            <img class="imgmenu" src="./img/md-Chicken-Taco-Salad-6-1-of-1-scaled.jpg"
                            alt="Card image cap">
                        </div>
                        <div class="col-sm-5 col-md-5 bn-content">
                            <p class="">Vegan Caesar Salad 
                                <br>
                                This deconstructed Caesar-inspired salad showcases lightly grilled romaine lettuce heads, ripe tomatoes, creamy avocado slices, diced onions, and a generous handful of crunchy croutons, all topped with a sprinkle of "cheesy" vegan parmesan and a scattering of nuts.</p>
                            <p class="">15$</p>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <div class="col-sm-1 col-md-1"></div>
                    </div>
                  </div>
                <div class="line-4">
                    <hr>
                </div>
                </br>
                <!-- ROW 2 -->
                <!-- Content Row -->
                <div class="row">
                    <div class="row my-4 mt-4">
                        <div class="col-sm-1 col-md-1"></div>
                        <div class="col-sm-5 col-md-5 bn-content">
                        
                            <p class="">Spinach, Tuna, and Egg Salad
                                <br> 
                                This revitalizing salad is enhanced by the vibrant flavors of fresh spinach, tender tuna chunks, and perfectly boiled eggs. Elevate the experience with a dressing crafted from just 7 simple ingredients, taking this salad to new heights.</p>
                                <p class="">15$</p>
                            <div class="card-body">
                               
                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                          </div>
                        
                        
                        <div class="col-sm-5 col-md-5">
                            <img class="imgmenu" src="./img/salad2.jpg"
                            alt="Card image cap">
                        </div>
                        <div class="col-sm-1 col-md-1"></div>
                    </div>
    
                </div>
            <div class="row my-4 mt-4">
                <h1 class="heading">Main Dishes</h1>
            </div>
            <!-- ROW 3 -->
                <!-- Content Row -->
                <div class="row">
                    <div class="row my-4 mt-4">
                        <div class="col-sm-1 col-md-1"></div>
                      <div class="col-sm-5 col-md-5">
                        <img class="imgmenu" src="./img/main_dish.jpg"
                        alt="Card image cap">
                      </div>
                      <div class="col-sm-5 col-md-5 bn-content">
                        
                        <p class="">Curried Carrot & Potato Soup. 
                            <br>
                            Curried veggie soups are always so flavorful and versatile, with a bit of spice from chili-spiced vegetables.</p>
                            <p class="">15$</p>
                        <div class="card-body">
                           
                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                      </div>
                      <div class="col-sm-1 col-md-1"></div>
                    </div>
                  </div>
                <div class="line-4">
                    <hr>
                </div>
                </br>
                <!-- ROW 4 -->
                <!-- Content Row -->
                <div class="row">
                    <div class="row my-4 mt-4">
                        <div class="col-sm-1 col-md-1"></div>
                        <div class="col-sm-5 col-md-5 bn-content">
                        
                            <p class="">Pizza Margherita</p>
                            <p class="">It is a classic and timeless Italian dish that epitomizes simplicity and exquisite taste.
                            The foundation of the Pizza Margherita is a thin and crispy crust, expertly baked to golden perfection. 
                                The sauce is a vibrant and flavorful tomato sauce made from ripe, sun-kissed tomatoes, providing a burst of freshness.</p>
                                <p class="">15$</p>
                            <div class="card-body">
                               
                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                          </div>                   
                        <div class="col-sm-5 col-md-5">
                            <img class="imgmenu" src="./img/main_dish2.jpg"
                            alt="Card image cap">
                        </div>
                        <div class="col-sm-1 col-md-1"></div>
                    </div>
    
                </div>
                <div class="line-4">
                    <hr>
                </div>
                </br>
                <!-- ROW 5 -->
                <!-- Content Row -->
                <div class="row">
                    <div class="row my-4 mt-4">
                        <div class="col-sm-1 col-md-1"></div>
                      <div class="col-sm-5 col-md-5">
                        <img class="imgmenu" src="./img/main_dish3.jpg"
                        alt="Card image cap">
                      </div>
                      <div class="col-sm-5 col-md-5 bn-content">
                        
                        <p class="">Paras Kebab Kotona</p>
                         <p class="">Crafted from tender grilled meat, often chicken or beef, this kebab is marinated with exquisite spices that impart a distinctive taste.
                         With its sophisticated blend of grilled meat and spices</p>
                            <p class="">15$</p>
                        <div class="card-body">
                           
                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                      </div>
                      <div class="col-sm-1 col-md-1"></div>
                    </div>
                  </div>
                <div class="line-4">
                    <hr>
                </div>
                </br>
                <!-- ROW 6 -->
                <!-- Content Row -->
                <div class="row">
                    <div class="row my-4 mt-4">
                        <div class="col-sm-1 col-md-1"></div>
                        <div class="col-sm-5 col-md-5 bn-content">
                        
                            <p class="">Eggs Benedict with asparagus</p>
                            <p class="">The American brunch classic Eggs Benedict gets a boost from crispy asparagus. Replace the pancetta with cheese in the vegetarian version.</p>
                                <p class="">15$</p>
                            <div class="card-body">
                               
                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                          </div>
                        <div class="col-sm-5 col-md-5">
                            <img class="imgmenu" src="./img/main_dish4.jpg"
                            alt="Card image cap">
                        </div>
                        <div class="col-sm-1 col-md-1"></div>
                    </div>
    
                </div>
                <div class="row my-4 mt-4">
                    <h1 class="heading">Sweets</h1>
                </div>
                <!-- ROW 7 -->
                    <!-- Content Row -->
                    <div class="row">
                        <div class="row my-4 mt-4">
                            <div class="col-sm-1 col-md-1"></div>
                          <div class="col-sm-5 col-md-5">
                            <img class="imgmenu" src="./img/sweet_1.jpg"
                            alt="Card image cap">
                          </div>
                          <div class="col-sm-5 col-md-5 bn-content">
                            
                            <p class="">Gingerbread Donut Bear Claw</p>
                              <p class="">Delightful and unique pastry that combines the warm, 
                                  spiced flavors of gingerbread with the sweet and comforting goodness of a classic bear claw.
                              Each bite is a harmonious blend of the sweet and slightly spicy notes of gingerbread, complemented by the buttery, flaky layers of the bear claw.</p>
                                <p class="">15$</p>
                            <div class="card-body">
                               
                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                          </div>
                          <div class="col-sm-1 col-md-1"></div>
                        </div>
                      </div>
                <div class="line-4">
                    <hr>
                </div>
                </br>
                    <!-- ROW 8 -->
                    <!-- Content Row -->
                    <div class="row">
                        <div class="row my-4 mt-4">
                            <div class="col-sm-1 col-md-1"></div>
                            <div class="col-sm-5 col-md-5 bn-content">
                            
                                <p class="">Strawberry cup with cream and sponge cake.</p>
                                <p class="">This Cup of strawberries with cream and sponge cake will be the perfect complement to our dessert.</p>
                                    <p class="">15$</p>
                                <div class="card-body">
                                   
                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                              </div>
                            <div class="col-sm-5 col-md-5">
                                <img class="imgmenu" src="./img/sweet_3.jpg"
                                alt="Card image cap">
                            </div>
                           <div class="col-sm-1 col-md-1"></div> 
                        </div>
        
                    <!-- </div> END OF ROW 8 -->
                    
            </div> <!-- END OF CONTAINER -->
        </div><!-- END OF CONTAINER -->
        
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
        <?php include 'footer.php'; ?>
    
    </body>
</html>
