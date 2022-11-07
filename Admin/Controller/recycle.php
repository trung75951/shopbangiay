<?php
$action = 'recycle';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'recycle':
        if (!isset($_SESSION['useradmin'])) {
            echo '<script> alert("Bạn chưa đăng nhập");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login_admin"/>';
        }
        include "View/recycle.php";
        break;

    case "restore";
        if (isset($_GET['id'])) {
            $kh = new Recyle();
            $makh = $_GET['id'];
            $kh->updateTrangthaiDisplay($makh);
            echo '<script>alert("Thành công")</script>';
        }
        include "View/recycle.php";
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $hd = new Recyle();
            $makh = $_GET['id'];
            $hd->UpdateTrangthaiHide($makh);
            echo '<script>alert("Thành công")</script>';
        }
        include 'View/khachhang.php';
        break;
    case 'deleteVinhvien';
        if (isset($_GET['id'])) {
            $re=new Recyle();
            $makh=$_GET['id'];
            $re->deleteVinhvien($makh);
            echo '<script>alert("Thành công")</script>';
        }
        include "View/recycle.php";
        break;
}
