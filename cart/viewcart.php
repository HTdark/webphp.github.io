<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>

<body>

    <!-- header -->
    <div class="container">
        <div class="header_menu">
            <ul>
                <li><a href="../Trangshop/view/index.php">Trang Chủ</a></li>
                <li><a href="../Trangshop/view/bestseller.php">Best Sellers</a></li>
                <li><a href="../product/sp.php">Sản Phẩm</a></li>
                <li><a href="../Trangshop/view/dvkh.php">Dịch Vụ khách hàng</a></li>
            </ul>
        </div>

        <div class="GioHang-User">
            <ul>
                <li><a href="viewcart.php">
                        <img src="../Trangshop/img/giohang.png" alt="GioHang" title="Giỏ Hàng">
                        <span class="GioHang">Giỏ Hàng</span></a>
                </li>

            </ul>
        </div>
    </div>
    <!-- header -->
    <a href='../Trangshop/view/index.php' class='home-link'>Quay về trang chủ</a>
     <!-- Thêm vào phần hiển thị nút thanh toán -->
     <form method='post' action='../thanhtoan/TT.php'>
        <button type='submit' class='TTbutton'>Thanh toán</button>
    </form>
    <?php
    // viewcart.php

    session_start();

    // Your existing code to display the cart contents...
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<table class='cart-table'>";
        foreach ($_SESSION['cart'] as $idsp => $product) {
            echo "<tr class='cart-item'>";

            // Display product details if available
            if (isset($product['img'])) {
                echo "<td class='product-image'><img src='{$product['img']}' alt='Product Image'></td>";
            }

            echo "<td class='product-name'>{$product['tensp']}</td>";

            // Hiển thị số lượng sản phẩm
            echo "<td class='product-quantity'>Số lượng: {$product['soluong']}</td>";

            // Hiển thị tổng tiền
            $formattedTotal = number_format($product['total'], 0, ',', '.');
            echo "<td class='product-total'>Tổng tiền: {$formattedTotal} VND</td>";

            // Hiển thị nút "Xóa" trong cột Hành Động
            echo "<td class='action-column'>";
            echo "<form method='post' action='deleteitem.php'>";
            echo "<input type='hidden' name='action' value='delete'>";
            echo "<input type='hidden' name='item_id' value='$idsp'>";
            echo "<button type='submit' class='delete-button' >Xóa</button>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";
        }
        echo "</table>";





        // Hiển thị tổng giá trị đơn hàng
        $totalValue = 0;
        foreach ($_SESSION['cart'] as $product) {
            $totalValue += $product['total'];
        }

        // Định dạng số với dấu phẩy ngăn cách hàng nghìn
        $totalFormatted = number_format($totalValue, 0, ',', '.');

        echo "<p class='total-value'>Tổng giá trị đơn hàng: {$totalFormatted} VND</p>";
    } else {
        echo "<p class='empty-cart'>Giỏ hàng trống.</p>";
    }
    ?>

   


</body>

</html>