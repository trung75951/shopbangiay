<div class="container-fluid" style="padding: 0 0px 0 0;overflow: hidden;">
    <div class="row justify-content-center pt-4 pl-3 pr-3">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-4">
                    <h4 style="font-weight: 450;">
                        <font style="color: gray;">TRANG CHỦ </font>/ SẢN PHẨM HOT
                    </h4>
                </div>
                <div class="col-lg-5 text-right">Hiện thị một kết quả duy nhất</div>
                <div class="col-lg-3">
                    <select class="w-75" name="hienthi" id="hienthi">
                        <option value="macdinh">Thứ tự mặc định</option>
                        <option value="viewh">Có số lượt xem cao nhất</option>
                        <option value="increased">Giá từ thấp lên cao</option>
                        <option value="decreased">Giá từ cao xuống thấp</option>
                    </select>
                </div>

            </div>
            <div class="row mt-5">
                <div class="col-lg-3">
                    <h6>DANH MỤC SẢN PHẨM</h6>
                    <ul class="w-100 p-4 ul_menu" id="locsanpham" style="list-style: none;border: 1px solid #ddd; padding: 0;border-radius: 5px;">
                        <form id="daidi">
                            <?php
                            $hh = new HangHoa();
                            $results = $hh->getListMaLoaiSP();
                            while ($set = $results->fetch()) :
                            ?>
                                <li class="danhmuc pt-3 pl-3 pb-3">
                                    <?php
                                    if ($set['maloai'] != 5) :
                                    ?>
                                        <input type="checkbox" class="product_check" value="<?php echo $set['maloai']; ?>" id="maloai"><a style="color: black;" href="">
                                        <?php
                                    endif;
                                        ?>
                                        <?php
                                        if ($set['maloai'] != 5) {
                                            echo $set['tenloai'];
                                        }
                                        ?></a>
                                </li>
                                <hr style="margin: 0;">
                            <?php
                            endwhile
                            ?>
                            <input type="hidden" id="filter" name="filter">
                        </form>
                    </ul>

                    <h6 class="mt-4">LỌC THEO GIÁ</h6>
                    <form action="#">
                        Giá bắt đầu: <input class="w-100" id="strprice" type="number">
                        <hr>
                        Giá kết thúc: <input class="w-100" id="lastprice" type="number">
                        <hr>
                        <button type="button" id="submitLoc" class="pl-4 pr-4 pt-2 pb-2 w-50 float-right" style="background-color: #cbba9c; border: none; color: aliceblue;"><strong>LỌC</strong></button>
                    </form>
                </div>
                <div class="col-lg-9">
                    <div class="row" id="khungsp">
                        <!-- load sản phẩm -->


                        <?php
                        $hh = new HangHoa();
                        $result = $hh->getListHangHoa();
                        $count = $result->rowCount();
                        $limit = 7;
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $p = new Page();
                        $page = $p->findPage($count, $limit);
                        $start = $p->findStart($limit);
                        ?>
                        <?php
                        if (isset($_GET['act'])) {
                            if ($_GET['act'] == "sanpham") {
                                $ac = "sanpham";
                            } else if ($_GET['act'] == "khuyenmai") {
                                $ac = "khuyenmai";
                            } else if ($_GET['act'] == "timkiem") {
                                $ac = "timkiem";
                            } else {
                                $ac = "";
                            }
                        }
                        ?>
                        <section id="examples" class="text-center w-100">
                            <div class="row">
                                <div class="col-lg-8 text-right">
                                    <?php
                                    if ($ac == "sanpham") {
                                        echo '<h3 class="mb-5 font-weight-bold" id="text_change">SẢN PHẨM</h3>';
                                    } else if ($ac == "khuyenmai") {
                                        echo '<h3 class="mb-5 font-weight-bold" id="text_change">SẢN PHẨM KHUYẾN MÃI</h3>';
                                    } else if ($ac == "timkiem") {
                                        echo '<h3 id="text_change" class="mb-5 font-weight-bold">SẢN PHẨM TÌM KIẾM</h3>';
                                    } else {
                                        echo '<h3 id="text_change" class="mb-5 font-weight-bold">KHÔNG CÓ SẢN PHẨM NÀO</h3>';
                                    }
                                    ?>

                                </div>

                            </div>

                            <div class="text-center">
                                <img src="../Content/imagegiay/Infinity-1s-200px.gif" style="display: none;" id="loader" width="200" alt="" srcset="">
                            </div>
                            <div class="dat">
                                <div class="row" id="ketqua">
                                    <?php
                                    $hh = new HangHoa();
                                    if ($ac == "sanpham") {
                                        $results = $hh->getListHangHoaPage($start, $limit);
                                    } else if ($ac == "khuyenmai") {
                                        $results = $hh->getListHangHoaSaleAll();
                                    } else if ($ac == "timkiem") {
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            $namesearch = $_POST['txtsearch'];
                                            $results = $hh->getSearch($namesearch);
                                        }
                                    }
                                    while ($set = $results->fetch()) :
                                    ?>
                                        <div class="col-lg-3  mb-3 text-left">
                                            <div class="card" style="width: 85%;">
                                                <img class="card-img-top" src="<?php echo 'Content/imagegiay/' . $set['hinhthumbnail']; ?>" alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $set['tenhh']; ?></h5>
                                                    <?php
                                                    if ($ac == "sanpham") {
                                                        echo '<h6 class="font-weight-bold">
                                                                    <font color="red">' . number_format($set['dongia']) . '<sup><u>VNĐ</u></sup></font></h6>';
                                                    } else if ($ac == "khuyenmai") {
                                                        echo '<h6 class="font-weight-bold">
                                                                    <font color="red">' . number_format($set['dongia']) . '<sup><u>VNĐ</u></sup></font>
                                                                    <strike>' . number_format($set['giamgia']) . 'VNĐ</strike><sup><u>đ</u></sup>
                                                                </h6>';
                                                    }
                                                    ?>
                                                    <h5>Số lượt xem: <?php echo $set['soluotxem']; ?></h5>
                                                    <a href="index.php?action=home&act=detail&id=<?php echo $set['mahh']; ?>">
                                                        <button class="mt-2 btn btn-primary" style="width: 70px; border: none; border-radius: 15px;" type="button">Xem</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    endwhile;
                                    ?>
                                </div>
                            </div>
                        </section>
                        <div class="col-md-6 div col-md-offset-3 mx-auto" id="phantrang" <?php if (isset($_POST['txtsearch'])) echo 'style="display: none;"'; ?>> 
                            <ul class="pagination">
                                <?php
                                if ($current_page > 1 && $page > 1) {
                                    echo '<li><a class="btn button_page text-white" href="index.php?action=home&act=sanpham&page=' . ($current_page - 1) . '">
                        Prev</a></li>';
                                }
                                for ($i = 1; $i <= $page; $i++) {
                                ?>
                                    <li><a class="btn button_page" href="index.php?action=home&act=sanpham&page=<?php echo $i; ?>">
                                            <?php echo $i; ?></a></li>
                                <?php
                                }
                                if ($current_page < $page && $page > 1) {
                                    echo '<li><a class="btn button_page text-white" href="index.php?action=home&act=sanpham&page=' . ($current_page + 1) . '">
                        Next</a></li>';
                                }
                                ?>
                            </ul>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function filterArray() {
        var tmpArray = [];

        for (let i = 0; i < $(".product_check").length; i++) {
            if ($('.product_check')[i].checked) {
                tmpArray.push($('.product_check')[i].value)
            }
        }
        document.querySelector("#filter").value = tmpArray.toString();
    };
    $(document).ready(function() {

        form = $('#daidi')[0];
        $(".product_check").click(function() {
            filterArray();
            data = new FormData(form);

            console.log(this.value);
            console.log(form);
            $("#loader").show();
            $.ajax({
                url: 'View/sanphamTable.php',
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(response) {
                    $('#ketqua').html(response);
                    $('#phantrang').html("");
                    $('#loader').hide();
                    $('#text_change').text("Sản phẩm được lọc");
                }

            })
        })

        $("#hienthi").on('change',function(){
            var hienthi = $("#hienthi").val();
            console.log(hienthi);
            var data = new FormData()
            data.append('hienthi',hienthi);
            $.ajax({
                url: 'View/ajax/sanphamviewH.php',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(response) {
                    $('#ketqua').html(response);
                    $('#phantrang').html("");
                    $('#loader').hide();
                    $('#text_change').text("Sản phẩm được lọc");
                }

            })
        })

        $("#submitLoc").click(function(){
            var giabatdau = $("#strprice").val();
            var giaketthuc = $("#lastprice").val();
            var data = new FormData();
            data.append("giakhoidiem",giabatdau);
            data.append("giaketthuc",giaketthuc);
            $.ajax({
                url: 'View/ajax/sanphamloc.php',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(response) {
                    $('#ketqua').html(response);
                    $('#phantrang').html("");
                    $('#loader').hide();
                    $('#text_change').text("Sản phẩm được lọc");
                }

            })
            
        })

        function get_fillter_text(text_id) {
            var fillterData = [];
            $('#' + text_id + ':checked').each(function() {
                fillterData.push($(this).val());
            })
            console.log(fillterData);
            return fillterData
        }
    })
</script>


<!-- <script>
    function filterArray() {
        var tmpArray = [];

        for(let i = 0; i<$(".product_check").length;i++)
        {
            if($('.product_check')[i].checked)
            {
                tmpArray.push($('.product_check')[i].value)
            }
        }
        document.querySelector("#filter").value = tmpArray.toString();
    };


    $(document).ready(function(){
        
        form = $('#daidi')[0];
        $(".product_check").click(function(){
            filterArray();
            data = new FormData(form);
            
            console.log(this.value);
            console.log(form);
            $("#loader").show();
            action = 'data',
            maloai = get_fillter_text('maloai');
            $.ajax({
                url:'View/sanphamTable.php',
                method:'POST',
                data: {action:action,maloai:maloai},
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success:function(response){
                    $('#ketqua').html(response);
                    $('#loader').hide();
                    $('#text_change').text("Sẩn phẩm được lọc");
                }

            })
        })

        function get_fillter_text(text_id){
            var  fillterData = [];
            $('#'+text_id+':checked').each(function(){
                fillterData.push($(this).val());
            })
            console.log(fillterData);
            return fillterData
        }
    })
</script> -->