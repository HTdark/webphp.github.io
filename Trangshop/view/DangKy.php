<?php
include "../model/dk.php";
function connectdb()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shopphp";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=shopphp", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Kết nối tới cơ sở dữ liệu thất bại: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DangKy</title>
    <link rel="stylesheet" href="style.css">
    <!-- header -->
    <div class="container">
        <div class="header_menu">
        <ul>
      
                    <li><a href="../../index.php">Trang Chủ</a></li>
                    <li><a href="../../index.php">Best Sellers</a></li>
                    <li><a href="../../index.php">Sản Phẩm</a></li>
                    <li><a href="../../index.php">Dịch Vụ khách hàng</a></li>
                </ul>
            </div>
            <?php
           
            ?>
     <div class="GioHang-User">
        <ul>
           <li><a href="viewcart.php">
            <img src="../img/giohang.png" alt="GioHang" title="Giỏ Hàng">
              <span class="GioHang">Giỏ Hàng</span></a>
           </li>
          
        </ul>
     </div>
   </div>
    <!-- header -->
    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var email = document.getElementById('email').value;
            var user = document.getElementById('user').value;
            var pass = document.getElementById('pass').value;

            if (name === '' || address === '' || email === '' || user === '' || pass === '') {
                alert('Vui lòng điền đầy đủ thông tin.');
                return false;
            }

            

            return true;
        }
    </script>
</head>

<body>
<div class="Center">
    <div class="Logincontainer" style="height: max-content;">
        <label class="header_text_LOGIN">Đăng ký tài khoản</label>
        <div>
            <form action="DangKy.php" method="post" onsubmit="return validateForm()">
                <div class="Logintext">Họ và Tên: <input type="text" name="name" id="name"></div>
                <div class="Logintext">Địa chỉ: <input type="text" name="address" id="address"></div>
                <div class="Logintext">Email: <input type="email" name="email" id="email"></div>
                <div class="Logintext">Tên Tài Khoản: <input type="text" name="user" id="user"></div>
                <div class="Logintext">Password: <input type="password" name="pass" id="pass"></div>
                <div class=""><input type="submit" name="themmoi" value="Đăng ký"></div>
            </form>
        </div>
        </div>
        <br>
    </div>
</body>

</html>
