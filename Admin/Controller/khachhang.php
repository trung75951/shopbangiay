<?php
$action = 'khachhang';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'khachhang':
        if (!isset($_SESSION['useradmin'])) {
            echo '<script> alert("Bạn chưa đăng nhập");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login_admin"/>';
        }
        include 'View/khachhang.php';
        break;
    case 'insertKhachHang':
        include "View/editkhachhang.php";
        break;
    case 'insertkh_action':
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
            $makh = $_POST['makh'];
            $tenkh = $_POST['tenkh'];
            $username = $_POST['username'];
            $matkhau = $_POST['matkhau'];
            $crypt = md5($matkhau);
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $sodienthoai = $_POST['sodienthoai'];
            $vaitro = $_POST['vaitro'];


            $kh = new KhachHang();
            $checkemail = $kh->checkDuplicateMail($email);
            $checkphone = $kh->checkDuplicatePhone($sodienthoai);
            if ($checkphone['countPhone'] != 0) {
                echo '<script>alert("Số điện thoại này đã tồn tại")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=insertKhachHang"/>';
            } elseif ($checkemail['count'] != 0) {
                echo '<script>alert("Email này đã tồn tại")</script>';
                // include "view/editkhachhang.php";
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=insertKhachHang"/>';
            } else {
                $kh->insertKhachHang($tenkh, $username, $crypt, $email, $diachi, $sodienthoai, $vaitro);
                if (isset($kh)) {
                    echo '<script>alert("Thêm khách hàng mới thành công")</script>';
                }
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang"/>';
            }
        }
        break;

    case 'update':
        include 'View/editkhachhang.php';
        break;

    case 'update_action':
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
            $makh = $_POST['makh'];
            $tenkh = $_POST['tenkh'];
            $username = $_POST['username'];
            $matkhau = $_POST['matkhau'];
            $crypt = md5($matkhau);
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $sodienthoai = $_POST['sodienthoai'];
            // $vaitro = $_POST['vaitro'];

            $kh = new KhachHang();
            $info = $kh->getIdKhachHang($makh);

            // Đầu tiên kiểm tra xem email bên update có trùng với email nhập trong thẻ input hay không -> nếu không trùng nhảy xuống IF:(1) to ngoài còn nếu trùng thì chạy ELSE:(1)
            if ($info['email'] != $email) { /*(1)*/
                /* Trường hợp email không trùng với input nhập và sdt trong database không trùng với sdt trong input
                    chạy hàm checkduplicatePhone kiểm tra lúc nhập phone input
                */
                $checkemail = $kh->checkDuplicateMail($email);
                if ($info['sodienthoai'] != $sodienthoai) {
                    $checkphone = $kh->checkDuplicatePhone($sodienthoai);
                    if ($checkphone['countPhone'] != 0) { //Nhập sđt mới bị trùng
                        echo '<script>alert("Số điện thoại này đã tồn tại")</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=update&id=' . $makh . '"/>';
                    } else { //không trùng sđt mà email bị trùng thì chạy vào if , không trùng sdt và không trùng email thì chạy vào else
                        if ($checkemail['count'] != 0) { //nhưng lúc này bị trùng email lúc nhập input
                            echo '<script>alert("Email này đã tồn tại")</script>';
                            // include "view/editkhachhang.php";
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=update&id=' . $makh . '"/>';
                        } else { //else trường hợp này không bị trùng email nhập input
                            $kh->updateKhachHang($makh, $tenkh, $username, $crypt, $email, $diachi, $sodienthoai);
                            if (isset($kh)) {
                                echo '<script>alert("Update khách hàng thành công")</script>';
                            }
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang"/>';
                        }
                    }
                } else { // sđt trong database không bị trùng khi kiểm tra và kiểm tra email trùng khi sửa thì chạy vào if
                    if ($checkemail['count'] != 0) {
                        echo '<script>alert("Email này đã tồn tại")</script>';
                        // include "view/editkhachhang.php";
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=update&id=' . $makh . '"/>';
                    } else {
                        $kh->updateKhachHang($makh, $tenkh, $username, $crypt, $email, $diachi, $sodienthoai);
                        if (isset($kh)) {
                            echo '<script>alert("Update khách hàng thành công")</script>';
                        }
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang"/>';
                    }
                }
            } else { /*(1)*/  //trường hợp email trùng trong data
                $checkemail = $kh->checkDuplicateMail($email);
                if ($info['sodienthoai'] != $sodienthoai) { //không trùng sđt trong database nhưng khi nhập sđt mới bị trùng nhảy vào if ,không trùng sđt trong database trùng sđt mới không bị trùng nhảy vào else
                    $checkphone = $kh->checkDuplicatePhone($sodienthoai);
                    if ($checkphone['countPhone'] != 0) { //trùng sdt mới nhập
                        echo '<script>alert("Số điện thoại này đã tồn tại")</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang&act=update&id=' . $makh . '"/>';
                    } else { //không trùng sđt 
                        $kh->updateKhachHang($makh, $tenkh, $username, $crypt, $email, $diachi, $sodienthoai);
                        if (isset($kh)) {
                            echo '<script>alert("Update khách hàng thành công")</script>';
                        }
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang"/>';
                    }
                } else {
                    $kh->updateKhachHang($makh, $tenkh, $username, $crypt, $email, $diachi, $sodienthoai);
                    if (isset($kh)) {
                        echo '<script>alert("Update khách hàng thành công")</script>';
                    }
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=khachhang"/>';
                }
            }
        }
        break;


    case 'delete':
        if (isset($_GET['id'])) {
            $makh = $_GET['id'];
            $kh = new KhachHang();
            $kh->deleteKhachHang($makh);
            echo '<script>alert("Xóa thành công")</script>';
        }
        include 'View/khachhang.php';
        break;
    case "timkiem":

        include "View/khachhang.php";
        break;
}
