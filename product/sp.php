<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shopphp";

// Kết nối đến database
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

// Lấy danh sách danh mục từ bảng tbl_danhmuc
$sql = "SELECT * FROM tbl_danhmuc";
$result = $conn->query($sql);

// Lấy danh sách sản phẩm từ bảng tbl_sanpham
$sql_products = "SELECT * FROM tbl_sanpham";
$result_products = $conn->query($sql_products);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <!-- header -->
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
                <li><a href="../cart/viewcart.php">
                        <img src="../Trangshop/img/giohang.png" alt="GioHang" title="Giỏ Hàng">
                        <span class="GioHang">Giỏ Hàng</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- header -->

    <form method="get" action="">
        <label for="category">Chọn danh mục:</label>
        <select name="category" id="category">
            <option value="">Tất cả</option>
            <?php
            // Hiển thị danh sách danh mục
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=" . $row["id"] . ">" . $row["tendm"] . "</option>";
                }
            }
            ?>
        </select>

        <input type="submit" value="Lọc">
    </form>

    <div class="SPcontainer">
        <?php
        // Hiển thị danh sách sản phẩm dựa trên bộ lọc
        $filter_category = isset($_GET['category']) ? $_GET['category'] : '';

        if ($result_products->num_rows > 0) {
            while ($row = $result_products->fetch_assoc()) {
                // Kiểm tra nếu có bộ lọc hoặc không
                if (empty($filter_category) || $filter_category == $row['iddm']) {
                    echo "<div class='SPitem'>";
                    echo "<div class='SPhcn'>";
                    echo "<img class='SPhcnimg' src='" . $row["img"] . "' alt='Product Image'>";
                    echo "</div>";
                    echo "<div class='SPtxt'>" . $row["tensp"] . "</div>";
                    echo "<div class='SPgia'>" . $row["gia"] . " VND</div>";

                    // Liên kết đến trang xem thông tin sản phẩm
                    echo "<a class='SPbutton' href='ttsp.php?id=" . $row["id"] . "'>Xem thông tin sản phẩm</a>";

                    echo "</div>";
                }
            }
        }
        ?>
    </div>

    <?php
    $conn->close();
    ?>
    <?php include "../Trangshop/view/foot.php"; ?>
</body>

</html>
