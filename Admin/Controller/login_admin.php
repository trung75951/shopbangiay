<?php
$action = 'login_admin';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'login_admin':
        if (isset($_SESSION['useradmin'])) {
            echo '<script> alert("Đăng nhập không đăng nhập lại chi nữa");</script>';
            include 'View/hanghoa.php';
            
        }
        include "View/loginadmin.php";
        break;
    case 'loginadmin_action':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['txtusername'];
            $password = $_POST['txtpassword'];
            $ctypt = md5($password);
        }
        $user = new User();
        $login = $user->login_admin($username, $password,$username);
        if ($login == true) {
            $_SESSION['id_user'] = $login['id_user'];
            $_SESSION['useradmin'] = $login['username'];
            $_SESSION['sodienthoai'] = $login['sodienthoai'];
            $_SESSION['fisrtName']=$login['fisrt_name'];
            $_SESSION['iduser']=$login['id_user'];
            $_SESSION['vaitro']=$login['vaitro'];
            $_SESSION['pwadmin'] = $login['matkhau'];
            echo '<script> alert("Đăng nhập thành công .'.$_SESSION['id_user'].'");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham"/>';
        } else {
            echo '<script> alert("Đăng nhập không thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login_admin"/>';
        }
        break;

    case 'logout_admin':
        if (isset($_SESSION['useradmin']) && isset($_SESSION['pwadmin'])) {
            unset($_SESSION['useradmin']);
            unset($_SESSION['pwadmin']);
            unset($_SESSION['sodienthoai']);
            unset($_SESSION['fisrtName']);
            unset($_SESSION['iduser']);
            unset($_SESSION['vaitro']);
            session_destroy();
        }
        echo "<script>alert('Logout thành công')</script>";
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login_admin"/>';
        break;
}
