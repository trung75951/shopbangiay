<?php
$action = 'login';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'login':
        if (isset($_SESSION['makh'])) {
            echo '<script>alert("Đăng nhập rồi không được đăng nhập nữa")</script>';
            include 'View/home.php';
        }
        include 'View/login.php';
        break;
    case "login_action":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['pswd'];
            $ctypt = md5($password);
        }
        $ur = new User();
        $log = $ur->login($email, $ctypt, $email);
        if ($log == true) {
            $_SESSION['makh'] = $log['makh'];
            $_SESSION['tenkh'] = $log['tenkh'];
            $_SESSION['username'] = $log['username'];
            $_SESSION['hinhprofile'] = $log['hinhprofile'];
            $_SESSION['matkhau'] = $log['matkhau'];
            $_SESSION['email'] = $log['email'];
            // $_SESSION['diahchi'] = $log['diahchi'];
            $_SESSION['sodienthoai'] = $log['sodienthoai'];
            echo '<script> alert("Đăng nhập thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            // include "View/home.php";

        } else {
            echo '<script> alert("Đăng nhập không thành công");</script>';
            include "View/login.php";
        }
        break;
    case 'logout';
        if (isset($_SESSION['makh']) && isset($_SESSION['tenkh'])) {
            unset($_SESSION['makh']);
            unset($_SESSION['tenkh']);
            unset($_SESSION['username']);
            unset($_SESSION['hinhprofile']);
            unset($_SESSION['matkhau']);
            unset($_SESSION['email']);
            unset($_SESSION['diachi']);
            unset($_SESSION['sodienthoai']);
            session_destroy();
            echo '<script>alert("Đăng xuất thành công")</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
        } else {
            echo '<script>alert("Logout rồi thì vui lòng đăng nhập lại rồi hãy logout")</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
        }
        break;

    case 'resetpass':
        include 'View/remember.php';
        break;

    case "Verification":
        include "View/Verification.php";
        break;


    // case "nhapmaxacnhan":
    //     if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    //         $error = array();
    //         if ($_POST['code'] != $_SESSION['maxacthuc']) {
    //             $error['fail'] = "Mã xác thực không tồn tại";
    //         } else {
    //             include "VIew/changepassword.php";
    //         }
    //     }
    //     break;

    case "changepassword":
        include "VIew/changepassword.php";
        break;

    // case 'changepass_action':
    //     if (isset($_SERVER['REQUEST_METHOD'])=='POST') {
    //         $error = array();
    //         $password = $_POST['password'];
    //         $passwordre = $_POST['passwordre'];
    //         if ($password != $passwordre) {
    //             $error['fail'] ="Nhập mật khẩu không giống nhau";
    //             $_SESSION['error'] = $error['fail']; 
    //         }
    //         else{
    //             echo "<script>alert('Đổi mật khẩu thành công')</script>";
    //             // include "VIew/home.php";
    //     include "VIew/changepassword.php";

    //         }
    //     }
    //     break;

        // case 'resset_action':
        //     if ($_SERVER['REQUEST_METHOD']=='POST') {
        //         $email = $_POST['email'];
        //         $kh = new User();
        //         $result = $kh->checkDuplicateMail($email);
        //         if ($result[0] == 0) {
        //             echo '<script>alert("Tài khoản của bạn không tồn tại")</script>';
        //         }
        //         else{
        //             $maxacthuc = substr(md5(rand(0,999999)),0,6);
        //             $kh->resetpassKhachHang($passwordnew);

        //         }
        //     }
        //         echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=resetpass"/>';

        //     break;
}
