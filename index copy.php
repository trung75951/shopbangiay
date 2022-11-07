<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./Content/CSS/style.css">
  <link rel="stylesheet" href="./Content/fontawesome-free-5.15.3-web/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

</html>
<body>
  <div id="maintest-nav-oragne">
    <div class="container-fluid" style="background-color: #28a745;">
      <div class="container" style="background-image: none;">
        <!-- Vung navbar-->
        <div class="navbar navbar-expand-sm navbar-dark" style="z-index: 1000;">
          
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
              <!--them mr-auto để cho phần link còn lại qua phải-->
              <li class="nav-item"> <a class="nav-link" href="#" style="color: white;"><i class="fas fa-home    "></i> Trang chủ
                </a> </li>
              <li class="nav-item"> <a class="nav-link " style="color: white;" href="http://127.0.0.1:5500/gioithieu.html"> <i class="fas fa-user    "></i>
                  Đăng nhập</a> </li>
              <li class="nav-item"> <a class="nav-link" href="http://127.0.0.1:5500/lienhe.html" style="color: white;"><i class="fas fa-arrow-circle-right"></i>
                  Đăng ký</a>
              </li>
              <li class="nav-item"> <a class="nav-link" href="#" style="color: white;"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                  Đăng xuất
                </a> </li>
            </ul>

            <!-- phan này sẽ nằm bên phải của navbar-->
            <ul class="navbar-nav">
              <!-- Dropdown -->
              <li class="nav-item mt-2">
                <form class="form-inline" action="index.php?action=home&act=timkiem" method="post">
                  <div class="input-group">
                      <div class="input-group-prepend">
                      <!-- <a href="Trangchu.php?trang=tk"> -->
                          <input class="input-group-text" style="height: 38px;" type="submit" id="btsearch" value="Tìm Kiếm"/>
                      <!-- </a> -->
                          <!-- <span class="input-group-text">@</span> -->
                          <input type="text" name="txtsearch" class="form-control" placeholder="Tìm Kiếm"/>
                          
                      </div>

                </form>
              </li>
              <li class="nav-item">
                <a href="index.php?action=giohang" class="nav-link"><img src="assets/css/img/cartx2.png" width="30px" height="30px" alt=""></a>

            </li>
            <li class="nav-item">
                <p style="color: red; margin-top: 20px; margin-left: 0px;">(0)</p>

            </li>
            <li class="nav-item">
              <p style="color: red; margin-top: 20px; margin-left: 0px;">Xin chào</p>

          </li>
            </ul>
          </div>
        </div>
        <!-- end navbar-->
      </div>

    </div>
    <!--Banner - carousel-->
    <div class="container" >
      <div class="row mt-4 text-center">
        <div class="col-lg-12">
          <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li style="background-color: white;" data-target="#demo" data-slide-to="0" class="active"></li>
              <li style="background-color: white;" data-target="#demo" data-slide-to="1"></li>
              <li style="background-color: white;" data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./Content/imagetourdien/banner.png"  alt="Los Angeles" style="width: 100%;">
              </div>
              <div class="carousel-item">
                <img src="./Content/imagetourdien/banner.png"  alt="Chicago"style="width: 100%;">
              </div>
              <div class="carousel-item">
                <img src="./Content/imagetourdien/banner.png" alt="New York" style="width: 100%;">
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev" style="margin-left: 20%;">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next" style="margin-right: 20%;">
              <span class="carousel-control-next-icon"></span>
            </a>

          </div>
        </div>
      </div>
    </div>

    <!-- end Banner -->

    <!-- Thư viện Pokemons -->
    <div class="container mt-4 bg-white">
      <div class="row">
        <a class="btn btn-primary" href="" style="margin: auto; width: 250px;">CÂY THỦY SINH<i class="fas fa-spinner-third    "></i></a>
      </div>
      <div class="text-justify text-center text-light"
        style="background-color: #28a745; border-radius: 25px; padding: 8px 0px;">
        <h3
          >
          UY TÍN VÀ CHẤT LƯỢNG</h3>
      </div>
      <div class="row mt-2">
        <div class="col-lg-8 text-right">
            <h4 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM MỚI NHẤT</h4>
        </div>
        <div class="col-lg-4 text-right mt-4">
            <a href="index.php?action=home&act=sanpham">
                <span style="color: gray;">Xem chi tiết</span></div>
        </a>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="card" style="width: 85%;">
            <img class="card-img-top" src="./Content/imagetourdien/12.jpg" alt="">
            <div class="card-body">
              <h5 class="card-title">Trầu ngũ sắc Hadi</h5>
              <h6 class="font-weight-bold">
                <font color="red">454000d<sup><u>đ</u></sup></font>
                <strike>100000vmd</strike><sup><u>đ</u></sup>
              </h6> 
              <h5>Số lượt xem:1</h5>
              <button class="mt-2 btn btn-primary" style="width: 70px; border: none; border-radius: 15px;"
                type="button">Xem</button>
            </div>
          </div>
        </div> 
      </div>
      <div class="row mt-2">
        <div class="col-lg-8 text-right">
            <h4 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM MỚI NHẤT</h4>
        </div>
        <div class="col-lg-4 text-right mt-4">
            <a href="index.php?action=home&act=sanpham">
                <span style="color: gray;">Xem chi tiết</span></div>
        </a>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="card" style="width: 85%;">
            <img class="card-img-top" src="./Content/imagetourdien/2.jpg" alt="">
            <div class="card-body">
              <h5 class="card-title">Trầu ngũ sắc Hadi</h5>
              <h6 class="font-weight-bold">
                <font color="red">454000d<sup><u>đ</u></sup></font>
                <strike>100000vmd</strike><sup><u>đ</u></sup>
              </h6> 
              <h5>Số lượt xem:1</h5>
              <button class="mt-2 btn btn-primary" style="width: 70px; border: none; border-radius: 15px;"
                type="button">Xem</button>
            </div>
          </div>
        </div> 
      </div>
      <div class="text-justify text-center text-light"
        style="background-color: #28a745; border-radius: 25px; padding: 8px 0px;">
        <h3 class="btn btn-light mt-3"
          style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
          Tải thêm thư viện Pokemons</h3>
      </div>
    </div>
    <!-- End Phần thư viện Pokemons -->

    <!-- Footer  -->
    <div class="footer bg-dark" style="margin-top: 20px;">
      <div class="jumbotron w-100 bg-dark">
          <div class="row">
              <div class="col-lg-3">
                  <h5 class="text-white">LIÊN KẾT</h5>
                  <a href="" class="text-secondary">WEB DESIGN</a><br>
                  <a href="" class="text-secondary">BRAND & IDENTILY</a><br>
                  <a href="" class="text-secondary">MOBLIE DISIGN</a><br>
                  <a href="" class="text-secondary">PRINT</a><br>
                  <a href="" class="text-secondary">USER INTERFACE</a><br>
              </div>
              <div class="col-lg-3">
                  <h5 class="text-white">VỀ CHÚNG TÔI</h5>
                  <a href="" class="text-secondary">THE COMPANY</a><br>
                  <a href="" class="text-secondary">HISTORY</a><br>
                  <a href="" class="text-secondary">VISION</a><br>
              </div>
              <div class="col-lg-3">
                  <h5 class="text-white">HINH ANH</h5>
                  <a href="" class="text-secondary">LICKR</a><br>
                  <a href="" class="text-secondary">PICASA</a><br>
                  <a href="" class="text-secondary">ISTOCKPHOTO</a><br>
                  <a href="" class="text-secondary">PHOTODUNE</a><br>
              </div>
              <div class="col-lg-3">
                  <h5 class="text-white">LIEN HE</h5>
                  <a href="" class="text-secondary">BASIC INFO</a><br>
                  <a href="" class="text-secondary">MAP</a><br>
                  <a href="" class="text-secondary">CONCTACT FROM</a><br>
              </div>
          </div>
          <hr class="bg-white">
          <div class="row">
              <div class="col-lg-6">Copyright &copy; 2021 by ITC</div>
              <div class="col-lg-6 text-right">
                  <i class="fab fa-facebook-square fa-2x"></i>
                  <i class="fab fa-youtube fa-2x"></i>
                  <i class="fab fa-twitter-square fa-2x"></i>>
              </div>
          </div>
      </div>
  </div>
    <!--End Footer  -->
    </div>
</body>

</html>