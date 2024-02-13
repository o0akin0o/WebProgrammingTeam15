<?php
            require_once('db_connection.php');

            //check if button is clicked
            if (isset($_POST['atcbtn'])) {
                $id = $_POST['pid'];
                $qty = $_POST['qty'];
                //add dish to cart
                $cart = [];
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                }

                $isFound = false;

                for ($i = 0; $i < count($cart); $i++) {
                    if ($cart[$id]['id'] == $id) {
                        $cart[$i]['qty'] += $qty;
                        $isFound = true;
                        break;
                    }
                }
                if (!$isFound) {
                    $sql_str = "SELECT * FROM Products WHERE id = $id";
                    $result = mysqli_query($conn, $sql_str);
                    $product = mysqli_fetch_assoc($result);
                    $product['qty'] = $qty;
                    $cart[] = $product;
                }
                $_SESSION['cart'] = $cart;

            }

            $idsp = $_GET['id'];
            $sql_str = "SELECT * FROM Products WHERE id=$idsp";
            $r = mysqli_query($conn, $sql_str);
            $row = mysqli_fetch_assoc($r);
            ?>
