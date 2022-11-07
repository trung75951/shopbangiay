<?php
$action = 'order';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'order':

        include 'View/order.php';
        break;

    case 'order_detail':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hd = new Order();
            if (!isset($_SESSION['makh'])) {
                echo '<script>alert("Bạn chưa đăng nhập ")</script>';
                include "View/login.php";
                break;
            }

            if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
                if (!empty($_POST['magiamgia'])) {
                    $voucher_name = $_POST['magiamgia'];
                    $vou = new Voucher();
                    $result = $vou->getVoucher($voucher_name);
                    // $soluong = $vou->getVoucherSL($voucher_name);




                    if (isset($result)) {
                        if ($result == 'err') {
                            echo "<script>alert('mã voucher không tồn tại')</script>";
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
                        }
                        // $voucher_code = $result['voucher_spilit'];
                        // $voucher_soluong = $soluong['voucher_soluong'];
                        // echo "<script>alert(".$result.")</script>";
                        // exit();
                        else{
                            $soluong = $vou->getVoucherSL($voucher_name);
                            if ($soluong <= 0) {
                                echo "<script>alert('Mã voucher này đã hết vui lòng nhập mã mới')</script>";
                                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
    
                                $_SESSION['tong'] = subtotal_cart(0);
                            } else {
                                $_SESSION['tong'] = subtotal_cart($result);
                                $vou->updatevoucherSL($voucher_name);
                                $soidhd = $hd->insertOrder($_SESSION['makh']);
                                $_SESSION['soidhd'] = $soidhd;
                                $tongtien = 0;
                                foreach ($_SESSION['cart'] as $key => $item) {
                                    $hd->insertOrderDetail($soidhd, $item['mahh'], $item['soluong'], $item['tong']);
                                    $tongtien += $item['tong'];
                                }
                                $tongtien = subtotal_cart($result);
                                $hd->updateOrderTongTien($soidhd, $tongtien);
                                $insoluongton = $hd->decreaSoluongTon($item['soluong'], $item['mahh']);
                                echo '<script>alert("Thanh toán thành công ")</script>';
                                unset($_SESSION['cart']);
                                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order"/>';
                            }

                        }


                    }
                } else {
                    $result = 0;
                    echo '<script>alert("Bạn không có nhập mã giảm giá")</script>';
                    $soidhd = $hd->insertOrder($_SESSION['makh']);
                    $_SESSION['soidhd'] = $soidhd;
                    $tongtien = 0;
                    foreach ($_SESSION['cart'] as $key => $item) {
                        $hd->insertOrderDetail($soidhd, $item['mahh'], $item['soluong'], $item['tong']);
                        $tongtien += $item['tong'];
                    }
                    $tongtien = subtotal_cart($result);
                    $hd->updateOrderTongTien($soidhd, $tongtien);
                    $insoluongton = $hd->decreaSoluongTon($item['soluong'], $item['mahh']);
                    echo '<script>alert("Thanh toán thành công ")</script>';
                    unset($_SESSION['cart']);

                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order"/>';
                }
            }


            // exit();
            // echo $insoluongton;
            // exit();

        }

        break;
    case 'momo':
        include "VIew/xulythanhtoanmomo.php";
        break;
    case 'momoATM':
        include "VIew/xulythanhtoanatm.php";
        break;
}
