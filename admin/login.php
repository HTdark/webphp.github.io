<?php
session_start();
ob_start();
include "model/connectdb.php";
include "model/user.php";
if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $role = checkuser($user, $pass);
    $_SESSION['role'] = $role;
    if ($role == 1) header('location:indexAD.php');
    else{
        $txt_erro="không tồn tại tài khoản";
    } //header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="viewAD/styleAD.css">
</head>

<body>
    <div class="midAD">
        <h2>LOGIN-ADMIN</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="user" id="">
            <input type="text" name="pass" id="">
            <input type="submit" name="dangnhap" value="Đăng nhập">
            <?php
            if(isset($txt_erro)&&($txt_erro!=""))
            {
                echo  "<font color='red'>".$txt_erro."</font>";
            }
            ?>
        </form>
    </div>
</body>

</html>