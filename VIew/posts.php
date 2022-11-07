<?php
    $posts =new Posts();
    $result=$posts->getListallposts();
    $count= $result->rowCount();
    $limit=8;
    $current_page=isset($_GET['page'])?$_GET['page']:1;
    $p=new Page();
    $page=$p->findPage($count,$limit);
    $start=$p->findStart($limit);
?>
<div class="container-fluid" style="background-image: url('../Content/imagebaiviet/evo-blog-banner.jpg');background-repeat: no-repeat;background-size: cover;">
    <div class="container">
        <div class="row evo-blog-header">
            <div class="col-md-10 col-md-offset-1">
                <div class="evo-blog-header-content">
                    <h1 style="color: white;margin-left: 120px;">Tin tức</h1>
                    <div class="evo-blog-des">
                        <h2 style="text-align: center;">
                            <span style="color: black;font-family:Arial,Helvetica,sans-serif;">
                                <strong>Thương hiệu giày dành cho Ta</strong>
                            </span>
                        </h2>
                        <p style="text-align: center;">Toàn bộ sản phẩm của BE CLASSY đều được thiết kế và sản xuất từ các nghệ nhân đóng giày dày dạn kinh nghiệm nhất. Kiểu giày Tây nhưng được Be Classy thiết kế theo chuẩn phom chân của các quý ông Việt. Với châm ngôn “Giày Tây dành cho Ta” Be Classy mong muốn tạo nên những chiếc giày Tây mang nét Việt riêng, nâng tầm đẳng cấp cho giày Việt và thêm nét mạnh mẽ lịch lãm riêng biệt dành cho các quý ông.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <h3 style="font-family: cursive;"><i>CÁC BÀI VIẾT <span style="color: #FF9225;">TRÊN WEB</span></i></h3>
    </div>    
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
            $posts=new Posts();
            $result=$posts->getListallpostsPage($start, $limit);
            while ($set=$result->fetch()):
        ?>
        <div class="col mb-4">
            <div class="card h-100">
                <a href="index.php?action=posts&act=blog&id=<?php echo $set['idposts']?>">
                    <img src="../Content/imagebaiviet/<?php echo $set['thumbnail']?>" id="hoverhinh" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title" id="tenhanghoa"><?php echo $set['articletitle']?></h5>
                    <a href="index.php?action=posts&act=blog&id=<?php echo $set['idposts']?>" style="text-decoration: none;" class="card-text" id="hovermota"><?php echo $set['mota']?></a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <?php
            endwhile; 
        ?>
    </div>
    <div class="row">
    <div class="col-md-6 div col-md-offset-3 mx-auto" <?php if (isset($_POST['txtsearch'])) echo 'style="display: none;"'; ?>>
        <ul class="pagination">
            <?php
            if ($current_page > 1 && $page > 1) {
                echo '<li><a class="btn btn-primary text-white" href="index.php?action=posts&page=' . ($current_page - 1) . '">
                        Prev</a></li>';
            }
            for ($i = 1; $i <= $page; $i++) {
            ?>
                <li><a class="btn btn-primary" href="index.php?action=posts&page=<?php echo $i; ?>">
                        <?php echo $i; ?></a></li>
            <?php
            }
            if ($current_page < $page && $page > 1) {
                echo '<li><a class="btn btn-primary text-white" href="index.php?action=posts&page=' . ($current_page + 1) . '">
                        Next</a></li>';
            }
            ?>
        </ul>
    </div> 
    </div>
</div>