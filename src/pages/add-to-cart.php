<?php
// check user login by cookie
$loggedIn = isset($_COOKIE["name"]);

// Thiết lập biến link tùy thuộc vào trạng thái đăng nhập của người dùng
if ($loggedIn) {
    $link = 'menu.php'; // if login then load menu page again
} else {
    $link = 'login.php'; // if not login then redirect to login page
}
?>
<?php $prevPage = $_SERVER['REQUEST_URI'];
setcookie("prev_page", $prevPage, time() + 3600, "/");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('links.php'); ?>
    <title>Restaurant</title>
</head>

<body>
    <div class="container mx-auto my-4">
    <p><a href=""><i class="fa-solid fa-bag-shopping">My cart</i><span>
        <?php
            $cart =[];
            if(isset($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
            }
            $count = 0;
            foreach ($cart as $item){
                $count += $item['count'];
            
            }
        
        ?>;
    
    </span></a></p>
        <?php include 'header.php'; ?>
        <?php include('login_nav.php'); ?>
            
        <?php
        require_once('db_connection.php');
        
        //check if button is clicked
        if (isset($_POST['atcbtn'])){
        $id = $_POST['pid'];
        $qty = $_POST['qty'];
            //add dish to cart
            $cart =[];
            if(isset($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
            }
        
        $isFound = false;
        
        for ($i=0; $i<count($cart); $i++){
            if ($cart[$id]['id'] == $id){
                $cart[$i]['qty']+= $quantity;
                $isFound = true;
                break;
            }
        } 
        if(!$isFound){
            $sql_str = "SELECT * FROM Products WHERE id = $id";
            $result = mysqli_query($conn, $sql_str);
            $product = mysqli_fetch_assoc($result);
            $product['qty']=$qty;
            $cart[]=$product;
        }
        $_SESSION['cart'] = $cart;
        
        
        }
        
        $idsp = $_GET['id'];
        $sql_str = "SELECT * FROM Products WHERE id=$idsp";
        $r = mysqli_query($conn, $sql_str);
        $row = mysqli_fetch_assoc($r);
        ?>


        <!-- END SEARCH & SORTING PRICE -->
        <div class="container">
            <form action="cart.php" method="post">
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
                echo '<p class="">' . $row['name'] . '</p>';
                echo '<p class="">' . $row['description'] . '</p>';
                echo '<p class="">' . $row['price'] . '$</p>';
                // FORM
                echo '<form method="post" >';
                echo '<div class="card-body">';
                echo '<input type="text" value="1"' ;
                echo '<input type="hidden" value="1" name="qty">';
                echo '</div>';
                echo '<input type="hidden" value="' . $idsp . '" name="pid">';
               
                echo '<button href="cart.php" name="atcbtn" class="btn btn-primary">Add To Cart</button>';
                
                echo '</form>';           
                // END FORM
                echo '</div>';
                echo '</div>';
                echo '<div class="col-sm-1 col-md-1"></div>';
                echo '</div>';
                echo '<br>';

                // close connection
                $conn->close();
                ?>
        </div> <!-- END OF CONTAINER -->
        </form>
    </div><!-- END OF CONTAINER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <?php include 'footer.php'; ?>

</body>

</html>