<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="lbl-shopping-cart lbl-shopping-cart-gio-hang">
                GIỎ HÀNG
                <span>
                    <span class="count_item_pr">(sản phẩm)</span>
                </span>
            </h1>
        </div>
    </div>
    <div class="row">
        <?php
        if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) :
            // echo '<script>alert("Giỏ hàng của bạn chưa có sản phẩm lựa chọn")</script>';.
            // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            echo '<div class="col-md-6 col-md-offset-3" style="margin:120px 0 0 500px">
            <img src="//bizweb.dktcdn.net/100/292/624/themes/758446/assets/empty-cart.png?1665982506366" style="max-width:200px" class="img-responsive center-block" alt="Giỏ hàng trống">
            <div class="btn-cart-empty">
                <a class="btn btn-default" href="index.php?action=home" title="Tiếp tục mua sắm">Tiếp tục mua sắm</a>
            </div>
        </div>';
        ?>
        <?php
        else :
        ?>



            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="index.php?action=cart&act=update_itemcart" method="post">
                            <table class="table" id="banggiohang">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>SẢN PHẨM</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $i = 0;

                                    foreach ($_SESSION['cart'] as $key => $item) :
                                        # code...
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="buttons">
                                                    <a href="index.php?action=cart&act=deleteCart&id=<?php echo $item['mahh']; ?>"><i class="fas fa-times-circle"></i></a>
                                                </div>
                                            </td>

                                            <td><img src="Content/imagegiay/<?php echo $item['hinhthumbnail'] ?>" alt="" style="width: 95px;"></td>
                                            <td><?php echo $item['tenhh'] ?></td>
                                            <td><?php echo number_format($item['dongia']); ?> VNĐ</td>

                                            <td><input type="number" style="text-align: center; width: 60px;" min="1" max="<?php echo $item['soluongton'] ?>" name="soluongmoi[<?php echo $item['mahh']; ?>]" value="<?php echo $item['soluong'] ?>"></td>
                                            <td><?php echo number_format($item['tong']); ?> VNĐ</td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <button class="btn btn-outline-danger" type="submit">Cập nhật Giỏ hàng</button>
                        </form>

                    </div>
                    <div class="col-lg-4">
                        <div class="row w-100">
                            <form action="index.php?action=order&act=order_detail" method="post">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>TỔNG SỐ LƯỢNG</th>
                                            <th></th>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>Giao hàng</td>
                                            <td>
                                                <p style="font-size: 13px;">
                                                    Giao hàng miễn phí <br>
                                                    Ước tính cho <strong>Việt Nam</strong> <br>
                                                    Đổi địa chỉ
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mã giảm giá: </td>
                                            <td>
                                                <input id="mgg" class="w-100" type="text" name="magiamgia">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tổng: <?php echo number_format(subtotal_cart()); ?> </td>
                                            <td><strong id="tongtien"></strong> <strong>VNĐ</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" onclick="return confirm('Bạn có muốn mua sản phẩm không ')" class="btn btn-danger w-100">TIẾN HÀNH THANH TOÁN</button>
                            </form>
                        </div>
                        <div class="row w-100">
                            <form class="w-100" action="index.php?action=order&act=momo" enctype="application/x-www-form-urlencoded" method="post">

                                <input type="submit" class="btn btn-danger w-100  mt-3" name="momo" value="Thanh toán MOMO QRCODE" class="btn btn-danger">
                                <!-- <a href="index.php?action=order&act=momo">bấm coi qua không</a> -->
                                <!-- <button type="text" type="submit" name="momo">Thanh toán momo qrcode</button> -->
                            </form>

                            <form class="w-100" action="index.php?action=order&act=momoATM" enctype="application/x-www-form-urlencoded" method="post">
                                <input class="btn btn-danger w-100   mt-3" type="submit" name="momo" value="Thanh toán MOMO ATM" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>
    </div>
</div>

<!-- <div class="container mt-5">
    <form action="index.php?action=giohang&act=update_cart" method="post">
        <table class="table activitites">
            <thead>
                <tr>
                    <td colspan="5">
                        <h2 style="color: red;">DANH SÁCH GIỎ HÀNG</h2>
                    </td>
                </tr>
                <tr>
                    <th>Số TT</th>
                    <th>Thông Tin Sản Phẩm</th>
                    <th colspan="2">Giá</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    </td>
                    <td><img width="50px" height="50px" src="">
                    </td>
                    <td>Đơn Giá:
                        - Số Lượng: <input type="text" name="" value="" /><br />
                        <p style="float: right;"> Thành Tiền:
                            <sup><u>đ</u></sup>
                        </p>
                    </td>
                    <td><a href="index.php?action=giohang&act=emty_cart&id="><button type="button" class="btn btn-danger">Xóa</button></a>

                        <button type="submit" class="btn btn-secondary">Cập nhật</button>

                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                    </td>
                    <td style="float: right;">
                        <b>Tổng Tiền: </b>
                        <b>
                            <sup><u>đ</u></sup>
                        </b>
                    </td>
                    <td><a href="index.php?action=order&act=order_detail">Thanh toán</a></td>
                </tr>
            </tbody>
        </table>
    </form>
</div> -->