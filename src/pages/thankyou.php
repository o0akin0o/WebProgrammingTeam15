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

            <!-- NAV BAR -->
            <?php include ('header.php'); ?>
            <?php include('login_nav.php'); ?>
            <!-- END OF NAV BAR -->
<div class="booking">
    <div class="row">
        <div class="col-md-5"></div>
      
       <h4 class="booking-title mt-3">Thank You For Your Order</h4>
        <div class="col-md-5"></div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5 mb-5">
            <img class="banner-img booking-img" src="./img/booking.jpg"
            alt="Card image cap">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
        <div class="jumbotron">
  <h3 class="mt-5">Your Order is getting ready!</h3>
  <p class="lead">We will contact you soon once your order is close by.</p>
  <hr class="my-4">
 
  <p>If you have question concerning your order, you can contact us at 123-456-7899</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="About.php" role="button">Contact Us</a>
  </p>

</div>
            </div>
            
            <?php include ('footer.php'); ?>

        </div><!-- END OF CONTAINER -->
<script>



</script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    </body>
</html>
