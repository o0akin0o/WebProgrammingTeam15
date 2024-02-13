<?php include('top_header.php'); ?>
    <body>

        <div class="container mx-auto my-4">

            <!-- NAV BAR -->
            <?php include ('header.php'); ?>
            <?php include ('second_nav.php'); ?>
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
            
            <?php include ('footer.php'); ?>

        </div><!-- END OF CONTAINER -->
        <?php include ('footer_script.php'); ?>
    </body>
</html>
