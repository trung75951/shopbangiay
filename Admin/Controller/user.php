<?php
$action = 'user';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'user':
        if (!isset($_SESSION['useradmin'])) {
            echo '<script> alert("Bạn chưa đăng nhập");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login_admin"/>';
        }
        include 'View/user.php';
        break;
    case 'insertsp':
        if ($_SESSION['vaitro'] == 'admin') {
            include 'View/edituser.php';
        } else {
            echo "<script>alert('Không có quyền admin')</script>";
            include 'View/user.php';
        }
        break;
    case 'checkVaitro':
        if ($_SESSION['vaitro'] == 'user' && $_GET['id'] == $_SESSION['iduser']) {

            include 'View/edituser.php';
            break;
        }
        if ($_SESSION['vaitro'] == 'user' && $_GET['id'] != $_SESSION['iduser']) {
            echo '<script>alert("Không có quyền admin ")</script>';
            include "View/user.php";
        }

        break;
    case 'insert_action':
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
            $fisrtName = $_POST['fisrtname'];
            $lastName = $_POST['lastname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $hinh = $_FILES['image']['name'];
            $street = $_POST['street'];
            $ngaysinh = $_POST['ngaysinh'];
            $matkhau = $_POST['matkhau'];
            $crypt = md5($matkhau);
            $vaitro = $_POST['vaitro'];
            $sodienthoai = $_POST['sodienthoai'];

            $us = new User();
            $checkemail = $us->checkDuplicateMailUs($email);
            $checkphone = $us->checkDuplicatePhoneUs($sodienthoai);

            if ($checkphone['countPhone'] != 0) {
                echo '<script>alert("Số điện thoại này đã tồn tại")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=insertsp"/>';
            } elseif ($checkemail['count'] != 0) {
                echo '<script>alert("Email này đã tồn tại")</script>';
                // include "view/editkhachhang.php";
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=insertsp"/>';
            }else{
                $us->insertUser($fisrtName, $lastName, $email, $username, $street, $ngaysinh, $matkhau, $vaitro, $hinh, $sodienthoai);
                // echo "<script>alert('Thêm sản phảm thành công')</script>";
                if (isset($us)) {
                    uploadImageprofile();
                    // echo 'hello world';
                    echo "<script>alert('Thêm sản phảm thành công')</script>";
    
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                }
            }
        }
        // include "View/user.php";
        break;
    case 'update';
        include 'View/edituser.php';
        break;

    case "update_action":
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST' || isset($_SESSION['id_user'])) {
            $iduser = $_POST['id_user'];
            $fisrtName = $_POST['fisrtname'];
            $lastName = $_POST['lastname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $hinh = $_FILES['image']['name'];
            $street = $_POST['street'];
            $ngaysinh = $_POST['ngaysinh'];
            $matkhau = $_POST['matkhau'];
            $crypt = md5($matkhau);
            $vaitro = $_POST['vaitro'];
            $sodienthoai = $_POST['sodienthoai'];

            $userUP = new User();
            $checkemail = $userUP->checkDuplicateMailUs($email);
            $checkphone = $userUP->checkDuplicatePhoneUs($sodienthoai);
            $info = $userUP->getUserID($iduser);
            if ($info['email'] != $email) { 
                if ($info['sodienthoai'] != $sodienthoai) {
                    $checkphone = $userUP->checkDuplicatePhoneUs($sodienthoai);
                    if ($checkphone['countPhone'] != 0) { 
                        echo '<script>alert("Số điện thoại này đã tồn tại")</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=update&id=' . $iduser . '"/>';
                    } else {
                        if ($checkemail['count'] != 0) {
                            echo '<script>alert("Email này đã tồn tại")</script>';
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=update&id=' . $iduser . '"/>';
                        } else {
                            $userUP->updateUser($iduser, $fisrtName, $lastName, $email, $username, $street, $ngaysinh, $matkhau, $vaitro, $hinh, $sodienthoai);
                            if ($userUP) {
                                if ($hinh) {
                                    uploadImageprofile();
                                    echo '<script>alert("Cập nhật người dùng mới thành công ")</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                                } else {
                                    echo '<script>alert("Không có hình thì lấy gì mà update lại má ơi")</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=update&id=' . $iduser . '"/>';
                                }
                            }
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                        }
                    }
                } else { 
                    if ($checkemail['count'] != 0) {
                        echo '<script>alert("Email này đã tồn tại")</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=update&id=' . $iduser . '"/>';
                    } else {
                        $userUP->updateUser($iduser, $fisrtName, $lastName, $email, $username, $street, $ngaysinh, $matkhau, $vaitro, $hinh, $sodienthoai);
                        if ($userUP) {
                            if ($hinh) {
                                uploadImageprofile();
                                echo '<script>alert("Cập nhật người dùng mới thành công ")</script>';
                                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                            } else {
                                echo '<script>alert("Không có hình thì lấy gì mà update lại má ơi")</script>';
                                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=update&id=' . $iduser . '"/>';
                            }
                        }
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                    }
                }
            } else {
                $checkemail = $userUP->checkDuplicateMailUs($email);
                if ($info['sodienthoai'] != $sodienthoai) { 
                    $checkphone = $userUP->checkDuplicatePhoneUs($sodienthoai);
                    if ($checkphone['countPhone'] != 0) { 
                        echo '<script>alert("Số điện thoại này đã tồn tại")</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=update&id=' . $iduser . '"/>';
                    } else { //không trùng sđt 
                        $userUP->updateUser($iduser, $fisrtName, $lastName, $email, $username, $street, $ngaysinh, $matkhau, $vaitro, $hinh, $sodienthoai);
                        if ($userUP) {
                            if ($hinh) {
                                uploadImageprofile();
                                echo '<script>alert("Cập nhật người dùng mới thành công ")</script>';
                                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                            } else {
                                echo '<script>alert("Không có hình thì lấy gì mà update lại má ơi")</script>';
                                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=update&id=' . $iduser . '"/>';
                            }
                        }
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                    }
                } else {
                    $userUP->updateUser($iduser, $fisrtName, $lastName, $email, $username, $street, $ngaysinh, $matkhau, $vaitro, $hinh, $sodienthoai);
                    if ($userUP) {
                        if ($hinh) {
                            uploadImageprofile();
                            echo '<script>alert("Cập nhật người dùng mới thành công ")</script>';
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                        } else {
                            echo '<script>alert("Không có hình thì lấy gì mà update lại má ơi")</script>';
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=update&id=' . $iduser . '"/>';
                        }
                    }
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                }
            }



            // $userUP->updateUser($iduser, $fisrtName, $lastName, $email, $username, $street, $ngaysinh, $matkhau, $vaitro, $hinh, $sodienthoai);
            // if ($userUP) {
            //     if ($hinh) {
            //         uploadImageprofile();
            //         echo '<script>alert("Cập nhật người dùng mới thành công ")</script>';
            //         echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
            //     } else {
            //         echo '<script>alert("Không có hình thì lấy gì mà update lại má ơi")</script>';
            //         echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user&act=update&id=' . $iduser . '"/>';
            //     }
            // }
        }


        break;

    case "delete":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $us = new User();
            $us->deleteUser($id);
            echo '<script>alert("Xóa thành công")</script>';
        }
        include "View/user.php";
        break;
}
