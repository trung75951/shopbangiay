<?php
$action = 'home';

if (isset($_GET['act'])) {
    # code...
    $action = $_GET['act'];
}
switch ($action) {
    case 'home':
        # code...
        include 'View/home.php';
        break;

    case 'sanpham':
        include 'View/sanpham.php';
        break;
    case 'detail':
        include 'View/sanphamchitiet.php';
        break;
    case 'khuyenmai':
        include 'View/sanpham.php';
        break;
    case 'timkiem':
        include 'VIew/sanpham.php';
        break;
    case 'tmp':
        include 'VIew/sanphamTable.php';
        break;
    case 'profile':
        include 'View/profile.php';
        break;
    case 'update_action':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $tenkh = $_POST['tenkh'];
            $_SESSION['tenkh'] = $tenkh;
            $username = $_POST['username'];
            $sodt = $_POST['sodienthoai'];
            $diachi = $_POST['diachi'];
            $email = $_POST['email'];
            $matkhau = $_POST['matkhau'];

            if ($_FILES['image']['name'] != "") {
                $hinh = $_FILES['image']['name'];
                // uploadImageprofile();
            } else {
                $hinh = $_POST['hinhprofilexit'];
            }
            $_SESSION['hinhprofile'] = $hinh;

            $kh = new User();
            $resuilt = $kh->updateKhachHang($id, $tenkh, $hinh, $username, $matkhau, $email, $diachi, $sodt);

            echo "<script>alert('Cập nhật thông tin thành công')</script>";
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home&act=profile&id=' . $id . '"/>';
        // include 'View/profile.php';


        break;


        case "sendmail":
            include "mail/sendmail.php";
            break;
}
