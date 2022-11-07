<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$action = 'cart';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}

switch ($action) {
    case 'cart':
        if (!isset($_SESSION['makh'])) {
            echo "<script>alert('Yêu cầu đăng nhập để được thêm sản phẩm vào giở hàng ')</script>";
            // include "VIew/login.php";
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
            // include "View/login.php";
        }
        include 'View/cart.php';
        break;
    case 'add_cart':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mahh = $_GET['mahh'];
            $soluong = $_POST['soluong'];
            $hh=new HangHoa();
            $result=$hh->getDetail($mahh);
            if ($result['soluongton']<=0) {
                echo '<script>alert("Sản phẩm hiện tại đẫ hết vui lòng chọn sản phẩm khác")</script>';
                include "View/home.php";

            }
            elseif (!$result['soluongton']<=0) {
                add_itemcart($mahh, $soluong);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
            }
        }

        // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
        break;
    case 'update_itemcart':

        $soluongmoi = $_POST['soluongmoi'];
        // $magiamgia = $_POST['magiamgia'];
        foreach ($soluongmoi as $key => $qty) {
            update_itemCart($key, $qty);
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
        break;

    case 'deleteCart':
        if (isset($_GET['id'])) {
            $key = $_GET['id'];
            unset($_SESSION['cart'][$key]);
            // session_destroy();
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
        }
        break;
}
