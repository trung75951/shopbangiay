<style>
    #more {
        display: none;
    }
</style>
<div class="container">
    <div class="row justify-content-center pl-3 border shadow  mt-5 mb-5">
        <div class="col-lg-10">
            <form action="index.php?action=cart&act=add_cart&mahh=<?php echo $_GET['id'] ?>" method="post">
                <?php
                if (isset($_GET['id'])) {
                    $mahh = $_GET['id'];
                    $hh = new HangHoa();
                    $result = $hh->getDetail($mahh);
                    $tenhh = $result['tenhh'];
                    $dontia = $result['dongia'];
                    $giamgia = $result['giamgia'];
                    $hinh = $result['hinhthumbnail'];
                    $hinhdetail  = $result['hinhdetail'];
                    $mota = $result['mota'];
                    $mausac = $result['mausac'];
                    $size = $result['size'];
                    $soluotxem = $result['soluotxem'];
                    $hh->updateView($mahh);
                }
                ?>
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12"><img src="<?php echo 'Content/imagegiay/' . $hinh; ?>" class="w-100 mx-auto " alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h6>TRANG CHỦ / SẢN PHẨM HOT</h6>
                        <h3 style="font-family:Arial, Helvetica, sans-serif; color: #334862; font-weight: 500;" id="product_title"><?php echo $tenhh; ?></h3>
                        <h4><strong style="font-weight: 500;color: red;" id="product_gia"><?php echo number_format($dontia - $giamgia); ?> đ</strong></h4>
                        <hr>
                        <ul style="font-size: 16px;list-style: none;padding: 0;">
                            <li><i class="fas fa-chevron-right" style="font-size: 10px;"></i> Sản phẩm nhập khẩu chính
                                hãng.</li>
                            <li><i class="fas fa-chevron-right" style="font-size: 10px;"></i> Màu sắc: <?php echo $mausac; ?></li>
                            <li><i class="fas fa-chevron-right" style="font-size: 10px;"></i> Size: <?php echo $size; ?></li>
                            <li><i class="fas fa-chevron-right" style="font-size: 10px;"></i>Số lượt xem: <?php echo $soluotxem; ?></li>
                            <li><i class="fas fa-chevron-right" style="font-size: 10px;"></i> Bảo hành 5 năm tại công
                                ty.</li>
                            <li><i class="fas fa-chevron-right" style="font-size: 10px;"></i> Gọi ngay
                                <strong>0369082061</strong> để được tư vấn thêm.
                            </li>
                        </ul>
                        <hr>
                        <p>Mã: <?php echo $mahh; ?></p>
                        <button type="submit" class="pl-4 pr-4 pt-2 pb-2" style="background-color: #cbba9c; border: none; color: aliceblue;" "><strong>THÊM VÀO GIỎ HÀNG</strong></button>
                </div>
            </div>
            <input type=" hidden" style="display:none ;" name="soluong" value="1">
            </form>
        </div>
        <div class="col-lg-12" style="margin: 10px 0 0 85px;">
            <?php
            $arrimgdetail = explode(';', $hinhdetail);
            foreach ($arrimgdetail as $key => $value) :
            ?>
                <img src="../Content/imagegiay/<?php echo $value?>" style="width:10%; margin-left: 15px;" alt="">
            <?php
            endforeach;
            ?>
            <!-- <img src="../Content/imagegiay/1.jpg" style="width:10%; margin-left: 15px;" alt="">
            <img src="../Content/imagegiay/1.jpg" style="width:10%; margin-left: 15px;" alt="">
            <img src="../Content/imagegiay/1.jpg" style="width:10%; margin-left: 15px;" alt=""> -->
        </div>
        <div class=" col-lg-10 mt-5 border shadow pb-5 mb-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link text-dark active" data-bs-toggle="tab" href="#mota">Mô tả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-bs-toggle="tab" href="#danhgia">Đánh giá (0)</a>
                </li>
            </ul>

            <div class="tab-content" style="color: #353535;">
                <div class="tab-pane container active m-4" id="mota" style="max-width: 1200px;">
                    Floating like a balloon and as blue as the cabochon safely nestled in its side, the Ballon Bleu watch by Cartier adds a dash of elegance to male and female wrists alike. Roman numerals are guided on their path by a deep blue winding mechanism. With the convex curves of the case, guilloché dial, sword-shaped hands, and polished or satin-finish links of the bracelet…the Ballon Bleu watch by Cartier floats through the world of Cartier watchmaking.<span id="dots">...</span>
                    <ul class="mt-4">


                        <span id="more">
                            <li style="list-style-type: none;"></i><?php echo $mota; ?></li>
                        </span>

                        <a href="#" onclick="myFunction()" id="myBtn">Xem thêm</a>
                    </ul>
                </div>
                <div class="tab-pane container fade m-4" id="danhgia" style="max-width: 1200px;">
                    <div class="row p-4" style="border: 1px solid #cbba9c;">
                        <div class="col-lg-12">
                            <h5 style="font-weight: 700;">Hãy là người đầu tiên nhận xét</h5>
                            <div class="danhgia p-2" style="border: 1px solid #cbba9c;border-radius: 4px;">
                                <strong>Khách hàng: ....</strong>
                                <h6 style="font-weight: 500;">Email: ...</h6>
                                <p>Nhận xét: Floating like a balloon and as blue as the cabochon safely nestled in its side, the Ballon Bleu watch by Cartier adds a dash of elegance to male and female wrists alike. Roman numerals are guided on their path by a deep blue winding mechanism</p>
                            </div>
                            <h6 class="mt-3" style="font-weight: 500;">Đánh giá của bạn</h6>
                            <hr>
                            <form action="#">
                                <div class="form-group">
                                    <label for="comment"><strong>Nhận xét của bạn:</strong></label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                                <table class="w-100">
                                    <tr>
                                        <td class="pr-3">
                                            <label for="email" class="mr-sm-2"><strong>Tên *</strong></label>
                                            <input type="email" class="form-control mb-2 mr-sm-2">
                                        </td>
                                        <td>
                                            <label for="email" class="mr-sm-2"><strong>Email *</strong></label>
                                            <input type="email" class="form-control mb-2 mr-sm-2">
                                        </td>
                                    </tr>
                                </table>
                                <button class="btn text-light mt-3" style="background-color: #CBBA9C; min-width: 200px;"> Gửi đi</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Ẩn đi";
            moreText.style.display = "inline";
        }
    }
</script>