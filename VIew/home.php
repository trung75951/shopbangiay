<?php
include 'VIew/carolsel.php';
?>
<div class="container mt-4 bg-white">
  <div class="row">

  </div>
  <div class="row mt-2 box_center">

    <h4 class="mb-5 font-weight-bold title-blog">NEW PRODUCT</h4>
    <!-- <a href="index.php?action=home&act=sanpham">
        <span style="color: gray;">Xem chi tiết</span>
      </a> -->
  </div>
  <div class="row ">
    <?php
    $hh = new HangHoa();
    $results = $hh->getListHangHoaNew();
    while ($set = $results->fetch()) :
    ?>
      <div class="col-lg-3 mb-4">
        <div class="card h-100" style="width: 85%;">
          <img class="card-img-top" src="<?php echo 'Content/imagegiay/' . $set['hinhthumbnail']; ?>" alt="">
          <div class="card-body">
            <h5 class="card-title" id="tenhanghoa"><?php echo $set['tenhh']; ?></h5>
            <h6 class="font-weight-bold">
              <font color="red"><sup><u><?php echo number_format($set['dongia']); ?>VNĐ</u></sup></font>
            </h6>
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
  <div class="row box_center">
    <div class="btn" style="background-color: #1c1c1c;">

      <a href="index.php?action=home&act=sanpham" title="Xem tất cả  NEW ARRIVALS " style=" color: white;" class="btn btn-black">Xem tất cả . <strong>NEW PRODUCTS</strong></a>
    </div>

  </div>

  <div class="row mt-2 box_center">
    <h4 class="mb-5 mt-5 font-weight-bold title-blog">Promotion product</h4>
    <!-- <a href="index.php?action=home&act=khuyenmai">
        <span style="color: gray;">Xem chi tiết</span>
      </a> -->
  </div>
  <div class="row">
    <?php
    $results = $hh->getListSale();
    while ($set = $results->fetch()) :
    ?>
      <div class="col-lg-3">
        <div class="card h-100" style="width: 85%;">
          <img class="card-img-top" src="<?php echo 'Content/imagegiay/' . $set['hinhthumbnail']; ?>" alt="">
          <div class="card-body">
            <h5 class="card-title" id="tenhanghoa"><?php echo $set['tenhh']; ?></h5>
            <h6 class="font-weight-bold">
              <font color="red"><?php echo number_format($set['dongia']); ?><sup><u>VNĐ</u></sup></font>
              <strike><?php echo $set['giamgia']; ?>VNĐ</strike><sup><u>đ</u></sup>
            </h6>
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

  <div class="row mt-5 box_center">
    <div class="btn" style="background-color: #1c1c1c;">

      <a href="index.php?action=home&act=khuyenmai" title="Xem tất cả  NEW ARRIVALS " style=" color: white;" class="btn btn-black">Xem tất cả . <strong>PROMOTION PRODUCTS</strong></a>
    </div>

  </div>
</div>