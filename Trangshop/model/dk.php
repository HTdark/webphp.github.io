<?php


function themuser($name, $address, $email, $user, $pass)
{
    $conn = connectdb();
    $sql = "INSERT INTO ttkh (name, address, email, user, pass) VALUES (:name, :address, :email, :user, :pass)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);

    try {
        $stmt->execute();
        echo '<script>
                    alert("Đăng ký thành công!");
                    window.location.href = "../view/login.php";
                  </script>';
    } catch (PDOException $e) {
        echo "<script>alert('Đăng ký thất bại: " . $e->getMessage() . "');</script>";
    }
}

function getall_user()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM ttkh");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['themmoi'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if (!empty($name) && !empty($address) && !empty($email) && !empty($user) && !empty($pass)) {
        themuser($name, $address, $email, $user, $pass);
    } else {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin.');</script>";
    }
}

$kq = getall_user();
