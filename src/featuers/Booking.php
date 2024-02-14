<?php include 'header.php'; ?>
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
            
            

    </body>
    
    <?php include 'footer.php'; ?>