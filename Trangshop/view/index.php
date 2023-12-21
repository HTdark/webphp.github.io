<?php
session_start();
ob_start();

include "../../admin/model/connectdb.php";
include "../model/user.php";
include "../model/dk.php";
include "../../admin/model/danhmuc.php";
$dsdm = getall_dm();

include "../../admin/model/sanpham.php";
include "header.php";

include "infor.php";
include "mid.php";

if (isset($_GET['act'])) {
    switch ($_GET['act']) {

            //danh muc
        case 'user':
            $user = getall_user();
            include "DangKy.php";
            break;
        case 'adduser':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name = $_POST['name'];
                $address=$_POST['address'];
                $email=$_POST['email'];
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                themuser($name,$address,$email,$user,$pass);
            }
            $kq = getall_user();
            include "DangKy.php";
            break;


            
        default:
        
            break;
    }
    
}
include "foot.php";