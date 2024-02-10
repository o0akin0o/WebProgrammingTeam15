<?php 
session_start();

function addToCart($id, $quantity){
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
    $product = [];
    $product['qty']=$quantity;
    $cart[]=$product;
}
$_SESSION['cart'] = $cart;

}

function deleteItem($id){




}








?>;
