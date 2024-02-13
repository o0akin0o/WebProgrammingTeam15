<?php include('./features/login_check.php');?>
<?php include('top_header.php'); ?>

<body>
    <div class="container mx-auto my-4">
        </span></a></p>
        <?php include 'header.php'; ?>
        <?php include('second_nav.php'); ?>
        <div class="container">
        <?php include('./features/add_to_cart_feature.php'); ?>
            <div class="container">
                <form action="cart.php?action=add" method="post">
                    <div class="row my-4 mt-4">
                        <h1 class="heading">
                            <?php echo $row['name']; ?>
                        </h1>
                    </div>
                    <?php
                    include('db_connection.php');
                    echo '<div class="row my-4 mt-4">';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '<div class="col-sm-5 col-md-5">';
                    echo '<img class="imgmenu" src="' . $row['img_path'] . '" alt="' . $row['name'] . '">';
                    echo '</div>';
                    echo '<div class="col-sm-5 col-md-5 bn-content">';
                    echo '<h3 class="">' . $row['name'] . '</h3>';
                    echo '<p class="">' . $row['description'] . '</p>';
                    echo '<h4 class="">' . $row['price'] . '$</h4>';
                    echo '<div class="card-body">';
                    echo '<input type="text" value="1" class="mb-2" size="3"';
                    echo '<input type="hidden" value="1" name="qty[' . $row['id'] . ']">';
                    echo '</div>';
                    echo '<input type="hidden" value="' . $idsp . '" name="pid">';

                    echo '<button href="cart.php" name="atcbtn" class="btn btn-primary">Check Out</button>';
                    echo '<span class="m-1"></span>';
                    echo '<a href="menu.php" class="btn btn-outline-success"><i class="fa-solid fa-cart-shopping"></i>Continue Shopping</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-1 col-md-1"></div>';
                    echo '</div>';
                    echo '<br>';
                    // close connection
                    $conn->close();
                    ?>
                </form>
                <?php include 'footer.php'; ?>
            </div> <!-- END OF CONTAINER -->
        </div><!-- END OF CONTAINER -->
        </div>
        <?php include('footer_script.php'); ?>
</body>
</html>