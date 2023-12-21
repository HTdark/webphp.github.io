
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <!-- Header -->
    <div class="container">
        <div class="header_menu">
            <ul>
                <li><a href="../Trangshop/view/index.php">Trang Chủ</a></li>
                <li><a href="../Trangshop/view/bestseller.php">Best Sellers</a></li>
                <li><a href="sp.php">Sản Phẩm</a></li>
                <li><a href="../Trangshop/view/dvkh.php">Dịch Vụ khách hàng</a></li>
            </ul>
        </div>

        <div class="GioHang-User">
            <ul>
                <li>
                    <a href="../Trangshop/view/viewcart.php">
                        <img src="../Trangshop/img/giohang.png" alt="GioHang" title="Giỏ Hàng">
                        <span class="GioHang">Giỏ Hàng</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Header -->

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shopphp";

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Kết nối database thất bại: " . $conn->connect_error);
    }

    // Check if the product ID is provided in the URL
    if (isset($_GET['id'])) {
        // Get the product ID from the URL
        $id = $_GET['id'];

       
        if (!is_numeric($id) || $id <= 0) {
            echo "ID sản phẩm không hợp lệ.";
            exit;
        }

        // Use Prepared Statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" represents the data type integer
        $stmt->execute();

        // Get the result
        $result_product_detail = $stmt->get_result();

        // Check if the product exists
        if ($result_product_detail->num_rows > 0) {
            $product_detail = $result_product_detail->fetch_assoc();

            // Display product details
            echo "<div class='product-detail-item'>";
            echo "<div class='product-detail-image'>";
            echo "<img src='" . $product_detail["img"] . "' alt='Product Image'>";
            
            echo "</div>";
            echo "<div class='product-detail-info'>";
            echo "<h2>" . $product_detail["tensp"] . "</h2>";
            echo "<p><strong>Giá:</strong> " . $product_detail["gia"] . " VND</p>";
            echo "<p><strong>Mô tả:</strong> " . $product_detail["mota"] . "</p>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Không tìm thấy sản phẩm.";
        }

        // Close Prepared Statements
        $stmt->close();
    } else {
        echo "Thiếu thông tin sản phẩm.";
    }

    // Close the database connection
    $conn->close();
    ?>
    <!-- Buy Now Button -->
    <form method='post' action='../cart/addtocart.php'>
    <input type='hidden' name='id' value='<?php echo $product_detail["id"]; ?>'>
    <input type='hidden' name='img' value='<?php echo $product_detail["img"]; ?>'>
    <input type='hidden' name='name' value='<?php echo $product_detail["tensp"]; ?>'>
    <input type='hidden' name='gia' value='<?php echo $product_detail["gia"]; ?>'>
    <label for='quantity'>Số lượng:</label>
    <input type='number' name='quantity' value='1' min='1'>
    <input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="SPbutton">
</form>


    <!-- End Buy Now Button -->
    <!-- Footer -->
    <div class='footercontainer'>
        <div class='contact-content'>
            <h1>Liên Hệ Chúng Tôi</h1>
            <p>Page FB:..........</p>
            <p>Địa chỉ: Quận 8</p>
            <p>Điện thoại: 0123 456 789</p>
            <p>Email: example@example.com</p>
        </div>
    </div>
    <!-- End Footer -->
</body>

</html>