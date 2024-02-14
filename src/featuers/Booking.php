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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>        <title>Restaurant</title>
    </head>
    <body>

        <div class="container mx-auto my-4">

            <!-- NAV BAR -->
            <nav class="navbar row">
                <h2 class="col-md-4 logo">Eastern Kitchen</h2>
                <div class="col-md-8">

                    <ul>
                        <li>
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li>
                            <a class="nav-link" href="menu.php">Menu</a>
                        </li>
                        <li>
                            <a class="nav-link" href="booking.php">Booking</a>
                        </li>
                        <li>
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                    </ul>
                </div>
            </nav>
                        <link rel="stylesheet" href="styles.css">
            <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;1,400;1,600&family=Montserrat:ital,wght@0,300;0,400;0,700;1,500&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script><div class="container mx-auto my-4">

    <div class="booking">
        <div class="row">
            <!-- Cart button on the left -->
            <div class="col-md-6">
                <div>
                    <a id="cart" class="link-success" href="cart.php">
                        <i class="fa-solid fa-cart-shopping">My Cart </i>
                    </a>
                </div>
            </div>

            <!-- Login buttons on the right -->
            <div class="col-md-6 d-flex justify-content-end">
                <div>
                    
            <a id="login" class="p-1 link-success" href="login.php"><i class="fa-solid fa-right-to-bracket">Login</i></a>/<a id="login" class="p-1 link-success text-muted" href="create_account.php"><i class="fa-solid fa-user-plus">Create Account</i></a>                </div>
            </div>
        </div>
    </div>

</div>
            <!-- END OF NAV BAR -->
<div class="booking">
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <h3 class="booking-title">Booking</h3>
            
        </div>
       
        <div class="col-md-5"></div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <img class="banner-img booking-img" src="./img/booking.jpg"
            alt="Card image cap">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <form>
                <fieldset>
                  <div class="form-group">
                    <label for="" class="p-2">Name</label>
                    <input type="text" id="" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Phone</label>
                    <input type="text" id="" class="form-control" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Numbers of people</label>
                    <input type="text" id="" class="form-control" placeholder="1">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Date</label>
                    <input type="date" id="" class="form-control" placeholder="22/1/2023">
                  </div>
                  <div class="form-group">
                    <label for="" class="p-2">Time</label>
                    <input type="time" id="" class="form-control" placeholder="10:00">
                  </div>
                 
                <div class="submit-booking">
                
                  <button type="submit" class="btn btn-primary submit">Submit</button></div>
                </fieldset>
              </form>
            </div>
            
            <div class="col-md-1"></div>
            </div>
            </div>
            
            </main>
    <footer>
    
    <style>
        .socialicon
        {
            width: 30px;
            height: auto;
        }
        social-icons {
            list-style: none;
            padding: 0;
            margin: 15px;
            float: left;
        }
        footer {
            padding-left: 70px;
            padding-top: 10px;
            background-color: #4E7047;
            color: white;
            }
        .social-icons li {
            display: inline-block;
            margin-right: 20px; 
        }
    </style>
    <div class="row my-4 mt-4">
                <div class="col-md-4">
                    <ul class="social-icons">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank" title="Visit our Facebook page">
                                <img class="socialicon" src="./image/facebook.png" alt="Facebook Icon">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/" target="_blank" title="Visit our youtube chanel">
                                <img class="socialicon" src="./image/youtube.png" alt="Youtube Icon">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank" title="Visit our instagram page">
                                <img class="socialicon" src="./image/Instagram.png" alt="Instagram Icon">
                            </a>
                        </li>
                        <!-- Add more social icons as needed -->
                    </ul>
                </div>
                <div class="col-md-4">
                    <p>Opening Hours</p>
                    <span>Sunday-Friday</span>
                    <p>9AM - 9PM</p>

                </div>
                <div class="col-md-4">
                    <p>Address:</p>
                    <span>123 Lesmurine, 13100</span>
                    <p>Phone: 514-123-4567</p>
                </div>
            </div>
    </footer>
</body>
</html>
        </div><!-- END OF CONTAINER -->

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    </body>
</html>
