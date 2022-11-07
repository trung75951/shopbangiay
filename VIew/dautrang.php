<div class="container-fluid" style="background-color: #FFFFFF;">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 col-sm-12 col-xs-12 nav_text">
                <div class="text">
                    <span>Hotline:</span>

                    <a href="tel:0898515689">0898 515 689</a>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 evo-header-mobile">
                <div class="logo evo-flexitem evo-flexitem-fill">
                    <a href="/" class="logo-wrapper" title="Be Classy - Giày Da Nam, Giày Tây Nam Sang Trọng">
                        <img src="../Content/imagegiay/logo.jpg" alt="Be Classy - Giày Da Nam, Giày Tây Nam Sang Trọng" class="img-responsive" />
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 right-header hidden-sm hidden-xs">
                <ul class="justify-end">
                    <li class="site-nav-item site-nav-account">
                        <a href="/account" title="Tài khoản" rel="nofollow">Tài khoản</a>
                        <div class="blank"></div>
                        <ul>
                            <?php
                            if (!isset($_SESSION['makh'])) {
                                $mang = ['login', 'Đăng nhập', 'Registration', 'Đăng ký'];
                                $number = 1;
                                switch ($number) {
                                    case 1:
                                        echo '<li><a rel="nofollow" href="index.php?action=' . $mang[$number - 1] . '" title="Đăng nhập">Đăng nhập</a></li>';
                                        $number += 2;
                                    case 3:
                                        echo '<li><a rel="nofollow" href="index.php?action=' . $mang[$number - 1] . '" title="Đăng ký">Đăng ký</a></li>';
                                        break;
                                }
                            } else {
                                echo '<li><a rel="nofollow" href="index.php?action=login&act=logout" title="Đăng Xuất">Đăng xuất</a></li>';
                            }
                            ?>




                        </ul>
                    </li>
                    <li class="site-nav-item site-nav-cart mini-cart">
                        <a href="index.php?action=cart" title="Giỏ hàng" rel="nofollow">
                            Giỏ hàng <i class="fa fa-cart-arrow-down"></i>
                            <span class="count_item_pr">0</span>
                        </a>
                        <div class="top-cart-content">
                            <ul id="cart-sidebar" class="mini-products-list count_li">
                                <li class="list-item">
                                    <ul></ul>
                                </li>

                            </ul>
                        </div>
                    </li>





                </ul>
            </div>
        </div>
    </div>


    <div class="container" style="background-image: none;">
        <div class="navbar navbar-expand-sm navbar-dark">

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"> <a class="nav-link" href="index.php?action=home" style="color: BLACK;"><i class="fas fa-home"></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="/gioi-thieu" style="color: BLACK;"><i class="fa-solid fa-circle-info"></i> Giới thiệu</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="/ho-tro" style="color: BLACK;"><i class="fa-solid fa-address-card"></i> Hỗ trợ</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="index.php?action=posts" style="color: BLACK;"><i class="fa-solid fa-cube"></i> Blog</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item mt-2">
                        <form class="form-inline" action="index.php?action=home&act=timkiem" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <input class="input-group-text" style="height: 38px;" type="submit" id="btsearch" value="Tìm Kiếm" />
                                    <input type="text" name="txtsearch" class="form-control" placeholder="Tìm Kiếm" />

                                </div>

                        </form>
                    </li>
                   

                    <?php
                    if (isset($_SESSION['makh'])) :
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Dropdown -->
                                <?php
                                if (isset($_SESSION['hinhprofile'])) {
                                    $hinh = $_SESSION['hinhprofile'];
                                }
                                ?>
                                <img class="rounded-circle shadow-1-strong me-3" src="../Content/profile/<?php echo $hinh ?>" alt="avatar" width="45" height="40" />
                            </a>
                            <div class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    <?php
                                    if (isset($_SESSION['makh']) && isset($_SESSION['tenkh'])) :
                                        $name = $_SESSION['tenkh'];
                                    ?>
                                        <p style="color: red; margin-top: 20px; margin-left: 0px;"><?php echo "Xin chào " . $name; ?></p>
                                    <?php
                                    else :
                                        echo '<p style="color: red; margin-top: 20px; margin-left: 0px;">Xin chào</p>';
                                    ?>
                                    <?php
                                    endif;
                                    ?>
                                </a>
                                <a class="dropdown-item" href="index.php?action=home&act=profile&id=<?php $id = $_SESSION['makh'];
                                                                                                    echo $id; ?>">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"></a>
                            </div>
                        </li>

                    <?php
                    endif;
                    ?>
                </ul>
            </div>
        </div>
        <!-- end navbar-->
    </div>
</div>