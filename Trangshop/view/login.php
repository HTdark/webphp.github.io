<?php
session_start();
ob_start();
include "../../admin/model/connectdb.php";
include "../model/user.php";
$txt_erro = "";
$loginSuccess = false;

if (isset($_POST['dangnhap'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if (!empty($user) && !empty($pass)) {
        $role = checkuser($user, $pass);

        if ($role == 1) {
            echo '<script>
                    alert("Đăng nhập thành công!");
                    window.location.href = "../../admin/indexAD.php";
                  </script>';
            exit;
        } elseif ($role == 0) {
            // Check if the user exists in the database
            if (userExistsInDatabase($user, $pass)) {
                $_SESSION['role'] = $role;
                $loginSuccess = true;
                echo '<script>
                        alert("Đăng nhập thành công!");
                        window.location.href ="index.php";
                      </script>';
                exit;
            } else {
                $txt_erro = "Không tồn tại tài khoản hoặc mật khẩu không chính xác";
            }
        } else {
            $txt_erro = "Không tồn tại tài khoản hoặc mật khẩu không chính xác";
        }
    } else {
        $txt_erro = "Vui lòng nhập tên tài khoản và mật khẩu";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
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

    <!-- mid -->
    <div class="Logincontainer" style="margin-left:40%;margin-top:10%;">

        <h2 class="header_text_LOGIN">LOGIN</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="grp">
                <label class="Logintext">
                    Tên Tài Khoản:
                    <input type="text" name="user" id="user">
                </label>
            </div>

            <div class="grp">
                <label class="Logintext">
                    Mật Khẩu:
                    <input type="password" name="pass" id="pass" style="margin-left: 36px;">
                </label>
            </div>
            <input type="submit" name="dangnhap" value="Đăng nhập" style="width: 100px;">
            <br>
            <label class="Logintext">Bạn chưa có tài khoản?</label>
            <button class="loginbutton"><a href="DangKy.php" style="text-decoration: none;">Đăng ký ngay</a></button>
            <?php if (!empty($txt_erro)) : ?>
                <div class="error-message">
                    <?php echo '<p style="color: red;">' . $txt_erro . '</p>'; ?>
                </div>
            <?php endif; ?>
        </form>

    </div>
</body>

</html>