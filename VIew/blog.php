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
        <?php

use LDAP\Result;

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $posts = new Posts();
            $re = $posts->getPostId($id);
            $noidung = $re['content'];
        }
        ?>
        <?php echo $noidung; ?>

    </div>

    <div class=" col-lg-12 mt-5 border shadow pb-5 mb-5">
        <ul class="nav nav-tabs">
        <?php
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $posts = new Posts();
                $dem=$posts->countcomment($id);
            }
        ?>
            <li class="nav-item">
                <a class="nav-link text-dark active" data-bs-toggle="tab" href="#mota">Bình luận</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="tab" href="#danhgia">Số bình luận (<?php echo $dem;?>)</a>
            </li>
        </ul>

        <div class="row">
            <div class="container bootdey">
                <form action="index.php?action=posts&act=comment&id=<?php echo $id?>" method="post">
                    <div class="col-md-12 bootstrap snippets">
                        <div class="panel">
                            <div class="panel-body">
                                <input type="hidden" name="mabaiviet" value="<?php echo $id?>">
                                <textarea class="form-control" name="noidungbaiviet" id="noidungbaiviet" rows="2" cols="2" placeholder="Ghi bình luận gì?"></textarea>
                                <div class="mar-top clearfix">
                                    <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
                                    <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                                    <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                                    <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="tab-content mt-5 shadow pl-5 " style="color: #353535;">
                    <div class="row d-flex">
                        <div class="col-lg-12 ">
                            <?php
                                $resuit=$posts->getListAllBinhluan($id);
                                while ($set=$resuit->fetch()):
                                    // echo '<script>console.log()</script>';
                            ?>
                            <div class="d-flex flex-start mb-4">
                                <img class="rounded-circle shadow-1-strong me-3" src="../Content/profile/<?php echo $set['hinhprofile']?>" alt="avatar" width="65" height="65" style="margin: 0 10px 0 -20px;"/>
                                <div class="card w-100">
                                    <div class="card-body p-4">
                                        <div class="">
                                            <h5><?php echo $set['tenkh']?></h5>
                                            <p class="small"><?php echo $set['ngaybinhluan']?></p>
                                            <p>
                                                <?php echo $set['noidung']?>
                                            </p>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <a href="#!" class="link-muted me-2 "><i class="fas fa-thumbs-up me-1"></i>132</a>
                                                    <a href="#!" class="link-muted ml-4"><i class="fas fa-thumbs-down me-1"></i>15</a>
                                                </div>
                                                <a href="index.php?action=" class="link-muted"><i class="fas fa-reply me-1"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>