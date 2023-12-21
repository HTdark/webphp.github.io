<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    include "model/connectdb.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "viewAD/headerAD.php";
    include "model/user.php";
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
                //danh muc
            case 'danhmuc':
                $kq = getall_dm();
                include "viewAD/danhmuc.php";
                break;
            case 'adddm':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tendm = $_POST['tendm'];
                    themdm($tendm);
                }
                $kq = getall_dm();
                include "viewAD/danhmuc.php";
                break;
            case 'deldm':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deldm($id);
                }
                $kq = getall_dm();
                include "viewAD/danhmuc.php";
                break;
            case 'updateformdm':
                //lấy 1 record đúng id truyền vào
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $kqone = getonedm($id);
                    //cần danh sách danh mục
                    $kq = getall_dm();
                    include "viewAD/updateformdm.php";
                }
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $tendm = $_POST['tendm'];
                    updatedm($id, $tendm);
                    //cần danh sách danh mục
                    $kq = getall_dm();
                    include "viewAD/danhmuc.php";
                }

                break;


            case 'sanpham':
                //load dsdm
                $dsdm = getall_dm();
                //load dssp
                $kq = getall_sp();
                include "viewAD/sanpham.php";
                break;
            case 'addsp':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $gia = $_POST['gia'];
                    // Kiểm tra xem key 'mota' có tồn tại trong mảng $_POST không
                    $mota = isset($_POST['mota']) ? $_POST['mota'] : '';

                    // Check if a file was selected
                    if (!empty($_FILES['hinh']['name'])) {
                        $target_dir = "../uploaded/";
                        $target_file = $target_dir . basename($_FILES['hinh']['name']);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        // Check if the file is a JPEG image
                        if ($imageFileType == "jpg") {
                            $uploadOk = 1;

                            // Move the uploaded file to the specified directory
                            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                $img = $target_file;

                                // Insert the data into the database
                                themsp($iddm, $tensp, $img, $gia, $mota);
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        } else {
                            echo "Only JPG files are allowed.";
                        }
                    } else {
                        echo "Please select a file.";
                    }
                }

                // Load dsdm and dssp
                $dsdm = getall_dm();
                $kq = getall_sp();
                include "viewAD/sanpham.php";
                break;
            case 'delsp':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delsp($id);
                }
                $kq = getall_sp();
                include "viewAD/sanpham.php";
                break;

            case 'updateformsp':
                //load dsdm
                $dsdm = getall_dm();
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $kqone = getonesp($_GET['id']);
                }
                $kq = getall_sp();
                include "viewAD/updateformsp.php";
            case 'updateformsp':
                //load dsdm
                $dsdm = getall_dm();

                //cập nhật san pham
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $gia = $_POST['gia'];
                    $id = $_POST['id'];
                    $mota = $_POST['mota'];
                    if ($_FILES['hinh']['name'] != "") {
                        $target_dir = "../uploaded/";
                        $target_file = $target_dir . basename($_FILES['hinh']['name']);
                        $img = $target_file;
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        // Allow certain file formats

                        if (
                            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif"
                        ) {

                            $uploadOk = 0;
                        }
                        if ($uploadOk == 1) {
                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                            //themsp($iddm, $tensp, $img, $gia);
                        }
                    } else {
                        $img = "";
                    }
                    updatesp($id, $tensp, $img, $gia, $iddm, $mota);

                    //load san pham
                    $kq = getall_sp();
                    include "viewAD/sanpham.php";
                }
                break;

                //taikhoan
            case 'taikhoan':
                if (isset($_POST['themmoi'])) {
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];

                    themuser($name, $address, $email, $user, $pass);
                    include "viewAD/taikhoan.php";
                    break;
                }
                //deluser
            case 'deluser':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deluser($id);
                }
                $kq = getall_user();

                include "viewAD/taikhoan.php";
                break;
                //update user
            case 'updateformuser':
                //lấy 1 record đúng id truyền vào
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $kqone = getoneuser($id);
                    //cần danh sách danh mục
                    $kq = getall_user();
                    include "viewAD/updateformuser.php";
                }
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    updateuser($id, $name, $address, $email, $user, $pass);
                    //cần danh sách danh mục
                    $kq = getall_user();
                    include "viewAD/taikhoan.php";
                }

                break;

                //donhang
            case 'donhang':
                include "viewAD/donhang.php";
                break;
            case 'thoat':
                if (isset($_SESSION['role'])) unset($_SESSION['role']);
                header('location:login.php');

            default:
                include "viewAD/homeAD.php";
                break;
        }
    } else {
        include "viewAD/homeAD.php";
    }
    include "viewAD/footerAD.php";
} else {
    header('location:login.php');
}
