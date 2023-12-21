
<div class="midAD">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DangKy</title>
    <link rel="stylesheet" href="styleAD.css">
</head>
<body>
 
    <div>
        <h2>Danh mục</h2>
       
        <br>
        <table border="1" class="tbSP">
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Tên tài khoản</th>
                <th>Password</th>
                <th>Hành động</th>
            </tr>
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $user) {
                    echo ' <tr>
                        <td>' . $i . '</td>
                        <td>' . $user['name'] . '</td>
                        <td>' . $user['address'] . '</td>
                        <td>' . $user['email'] . '</td>
                        <td>' . $user['user'] . '</td>
                        <td>' . $user['pass'] . '</td>
                        <td><a href="../indexAD.php?act=deluser&id='. $user['id'] . '">Xóa</a></td>
                    </tr>';
                    $i++;
                }
            }
            ?>
        </table>
        </div>
    </div>
</body>
</html>
