<?php
function themsp($iddm, $tensp, $img, $gia, $mota)
{
    $conn = connectdb();
    $sql = "INSERT INTO tbl_sanpham (iddm, tensp, img, gia, mota) VALUES ('$iddm', '$tensp', '$img', '$gia', '$mota')";
    $conn->exec($sql);
}

function updatesp($id, $tensp, $img, $gia, $iddm, $mota)
{
    $conn = connectdb();
    if ($img == "") {
        $sql = "UPDATE tbl_sanpham SET tensp='$tensp', gia='$gia', iddm='$iddm', mota='$mota' WHERE id=$id";
    } else {
        $sql = "UPDATE tbl_sanpham SET tensp='$tensp', gia='$gia', iddm='$iddm', img='$img', mota='$mota' WHERE id=$id";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function getonesp($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE id=$id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function delsp($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM tbl_sanpham WHERE id=$id";
    $conn->exec($sql);
}

function getall_sp()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_sanpham");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
?>
