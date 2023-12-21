<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $itemId = isset($_POST["item_id"]) ? $_POST["item_id"] : null;

    if ($itemId !== null) {
       
        removeFromCart($itemId);

        header("Location: viewcart.php");
        exit();
    }
}

function removeFromCart($itemId) {
    
    if (isset($_SESSION['cart'][$itemId])) {
        unset($_SESSION['cart'][$itemId]);
    }

    
    $conn = new mysqli("localhost", "root", "", "shopphp");

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "DELETE FROM giohang WHERE idsp = $itemId";
    $conn->query($sql);

    $conn->close();
}
?>
