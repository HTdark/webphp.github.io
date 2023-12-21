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

    
}

function deluser($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM ttkh WHERE id=" . $id;
    $conn->exec($sql);
}
function updateuser($id, $name, $address, $email, $user, $pass)
{
    $conn = connectdb();
    $sql = "UPDATE ttkh SET name=:name, address=:address, email=:email, user=:user, pass=:pass WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);

    try {
        $stmt->execute();
        echo "Cập nhật thành công!";
    } catch (PDOException $e) {
        echo "Cập nhật thất bại: " . $e->getMessage();
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

function checkuser($user,$pass)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM ttkh WHERE user='".$user."' AND pass='".$pass."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    if(count($kq)>0) return $kq[0]['role'];
    else return 0;
}

function getoneuser($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM ttkh Where id=" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
