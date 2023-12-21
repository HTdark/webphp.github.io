<?php
// addtocart.php

session_start();

$idsp = $_POST['id'];
$tensp = $_POST['name'];
$soluong = $_POST['quantity'];
$gia = $_POST['gia'];
$total = $soluong * $gia;
$img = $_POST['img'];

// Create or retrieve the shopping cart array in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if the product is already in the cart
if (array_key_exists($idsp, $_SESSION['cart'])) {
    // Update quantity if the product is already in the cart
    $_SESSION['cart'][$idsp]['soluong'] += $soluong;
    $_SESSION['cart'][$idsp]['total'] += $total;
} else {
    // Add the product to the cart if it's not already there
    $_SESSION['cart'][$idsp] = array(
        'tensp' => $tensp,
        'soluong' => $soluong,
        'gia' => $gia,
        'total' => $total,
        'img' => $img
    );
}

// Redirect back to the product detail page with the product image
header("Location: viewcart.php?id=$idsp&img=$img");
exit();
?>
