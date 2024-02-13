<?php include('links.php');?>
<div class="container mx-auto my-4">

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
                    <?php include('login_nav.php');?>
                </div>
            </div>
        </div>
    </div>
</div>
