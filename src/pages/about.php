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

            <!-- END OF NAV BAR -->

            
            <div class="container">
                
                <div class="row my-4 mt-4">
                    <h1 class="heading">About Us </h1>
                </div>
        
            <!-- BANNER 1-->
            <div class="banner">
                <div class="row my-4 mt-4">

                    <div class="col-sm-1 col-md-1"></div> 

                    <div class="col-sm-4 col-md-4">
                    <img class="banner-img" src="./img/about_us.jpg"
                    alt="Card image cap">
                    </div>
                  
                    <div class="col-sm-7 col-md-7 bn-content1">
                    <h3 class="about-title">The Eastern Kitchen</h2>
                        <br>
                
                    <p class="about-text">Infused with a passionate dedication to Eastern ingredients, we aspire to narrate the genuine tale of dining and culture within our Eastern kitchen.
                        <br>
                        <br>
                        Here, the fusion of spice and freshness orchestrates a captivating symphony of tastes, promising an experience that will linger in your cravings for more.</p>                
                    </div>
                    <div class="col-sm-1 col-md-1"></div>
                 
                </div>
              </div><!-- END OF BANNER 1-->
              
               <!-- BANNER 2-->
               <div class="banner">
                <div class="row my-4 mt-4">

                <div class="col-sm-1 col-md-1"></div>

                <div class="col-sm-4 col-md-4">
                    <img class="banner-img" src="./img/about_us_3.jpg"
                    alt="Card image cap">
                </div>
                  
                <div class="col-sm-7 col-md-7 bn-content1">
                    <h3 class="about-title"> Our Team</h3>
                    <br>
            
                    <p class="about-text">Hailing from Vietnam, Thailand, Japan, and Korea, our chefs bring forth a wealth of culinary expertise with years of experience.
                        <br>
                        <br>
                         We proudly deliver the authentic taste stemming from their excellent combination of skills and flavors.</p>                   
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
