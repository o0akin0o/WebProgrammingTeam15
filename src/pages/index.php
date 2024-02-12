<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;1,400;1,600&family=Montserrat:ital,wght@0,300;0,400;0,700;1,500&display=swap" rel="stylesheet">
            <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet" />
        <title>Restaurant</title>
    </head>
    <body>
        
        <div class="container mx-auto my-4">

            <!-- NAV BAR -->
            <?php include ('header.php'); ?>
            <?php include ('login_nav.php'); ?>
            <!-- END OF NAV BAR -->
            
            <div class="container mx-auto my-4">
      <a id="cart" class="link-success" href="cart.php"><i class="fa-solid fa-cart-shopping">My Cart (1)</i></a>
    </div>
            <div class="container">
                
                <div class="row my-4 mt-4">
                    <h1 class="heading">A genuine fine-dining experience awaits</h1>
                </div>
                
                <!-- CARD ROW 1 -->
                <div class="row my-4 mt-4">
                    <div class="row card-container">
                        <div
                            class="card cardindex text-center shadow p-3 mb-5 bg-white rounded"
                            style="width: 14rem; height: auto; cursor:pointer;">
                            <img class="card-img-top index-food" src="./img/barbeque.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Grilled Steak Kabobs</h5>
                                <p class="card-text">Main Dishes </p>
                                <a href="#" class="btn btn-primary">Order</a>
                                
                            </div>
                        </div>
                        
                        <div
                            class="card text-center shadow p-3 mb-5 bg-white rounded"
                            style="width: 14rem; height: auto;">
                            <img class="card-img-top" src="./img/food7.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Honey Sesame Tofu</h5>
                                <p class="card-text">Main Dishes</p>
                                <a href="#" class="btn btn-primary">Order</a>
                            </div>
                        </div>
                        
                        <div
                            class="card text-center shadow p-3 mb-5 bg-white rounded"
                            style="width: 14rem; height: auto;">
                            <img class="card-img-top" src="./img/food6.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Coconut & Citrus Green</h5>
                                <p class="card-text">Drinks</p>
                                <a href="#" class="btn btn-primary">Order</a>
                            </div>
                        </div>
                        
                        <div
                            class="card text-center shadow p-3 mb-5 bg-white rounded"
                            style="width: 14rem; height: auto;">
                            <img class="card-img-top" src="./img/food5.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Blackberry Apple</h5>
                                <p class="card-text">Drinks</p>
                                <a href="#" class="btn btn-primary">Order</a>
                            </div>
                        </div>
                        
                    </div> <!-- END OF CARD-CONTAINER -->
                </div> <!-- END OF CARD ROW 1 -->
                
                <!-- CARD ROW 2 -->
                <div class="row my-4 mt-4">
                    <div class="row card-container">
                        <div
                            class="card text-center shadow p-3 mb-5 bg-white rounded"
                            style="width: 14rem; height: auto;">
                            <img class="card-img-top" src="./img/sweet_1.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Gingerbread Donut Bear</h5>
                                <p class="card-text">Desert</p>
                                <a href="#" class="btn btn-primary">Order</a>
                            </div>
                        </div>
                        
                        <div
                            class="card text-center shadow p-3 mb-5 bg-white rounded"
                            style="width: 14rem; height: auto;">
                            <img class="card-img-top" src="./img/sweet_2.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Blueberry Cheesecake</h5>
                                <p class="card-text">Desert</p>
                                <a href="#" class="btn btn-primary">Order</a>
                            </div>
                        </div>
                        
                        <div
                            class="card text-center shadow p-3 mb-5 bg-white rounded"
                            style="width: 14rem; height: auto;">
                            <img class="card-img-top" src="./img/main_dish3.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Paras Kebab Kotona</h5>
                                <p class="card-text">Main Dishes</p>
                                <a href="#" class="btn btn-primary">Order</a>
                            </div>
                        </div>
                        
                        <div
                            class="card text-center shadow p-3 mb-5 bg-white rounded"
                            style="width: 14rem; height: auto;">
                            <img class="card-img-top" src="./img/chopped-power-salad-with-chicken.jpg"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Chopped Power Salad</h5>
                                <p class="card-text">Salads</p>
                                <a href="#" class="btn btn-primary">Order</a>
                            </div>
                        </div>
                        
                    </div> <!-- END OF CARD-CONTAINER -->
                </div> <!-- END OF CARD ROW 2 -->
                        
            <!-- BANNER 1-->
            <div class="banner">
                <div class="row my-4 mt-4">
                    <div class="col-sm-1 col-md-1"></div>
                  <div class="col-sm-6 col-md-6">
                    <img class="banner-img" src="./img/hompage_Menu.jpg"
                    alt="Card image cap">
                  </div>
                  <div class="col-sm-3 col-md-3 bn-content">
                    
                    <p class="">Savor a fusion of local and Eastern spices in every dish at Eastern Kitchen. Our unique menu, crafted with Eastern cooking methods, promises a distinct taste and experience. Order now and treat your palate to something extraordinary.</p>
                    <div class="card-body">
                       
                        <a href="menu.html" class="btn btn-primary">Menu</a>
                    </div>
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                </div>
              </div><!-- END OF BANNER 1-->
              
               <!-- BANNER 2-->
            <div class="banner">
                <div class="row my-4 mt-4">
                    <div class="col-sm-1 col-md-1"></div>
        
                  <div class="col-sm-3 col-md-3 bn-content">
                    
                    <p class="">Order online for a culinary journey delivered to your doorstep or reserve a table for a specialized and finest dining experience tailored to your preferences. Your extraordinary dining adventure begins with us.</p>
                    <div class="card-body">
                       
                        <a href="booking.html" class="btn btn-primary">Booking</a>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <img class="banner-img" src="./img/booking.jpg"
                    alt="Card image cap">
                  </div>
                  <div class="col-sm-1 col-md-1"></div>
                </div>
              </div><!-- END OF BANNER 2-->
            </div> <!-- END OF CONTAINER -->
            <?php include ('footer.php'); ?>
        </div><!-- END OF CONTAINER -->

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    </body>
</html>
