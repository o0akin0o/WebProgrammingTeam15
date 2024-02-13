<?php include('./features/login_check.php'); ?>
<?php include('top_header.php'); ?>

<body>
    <div class="container mx-auto my-4">
        <!-- NAV BAR -->
        <?php include('header.php'); ?>
        <?php include('second_nav.php'); ?>
        <!-- END OF NAV BAR -->
        <div class="booking">
            <div class="row">
                <div class="col-md-5"></div>
                <h4 class="booking-title mt-3">Thank You For Your Order</h4>
                <div class="col-md-5"></div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 mb-5">
                        <img class="banner-img booking-img" src="./img/booking.jpg" alt="Card image cap">
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
                    <?php include('footer.php'); ?>
                </div><!-- END OF CONTAINER -->
                <?php include('footer_script.php'); ?>
</body>

</html>