<div class="col-md-4 col-md-offset-4">
  <h3><b>DANH SÁCH HÀNG HÓA</b></h3>
</div>
<div class="row col-12">
  <a class="col-lg-2 mt-2 mb-4" style="width: 14%;" href="index.php?action=sanpham&act=insertsp">
    <button class="btn btn-success">Thêm sản phẩm</button>
  </a>

  <form action="Model/exportSP.php" method="post" class="mb-2 col-lg-3 " style="padding-top: 10px;">
    <button class="btnExport" href="index.php?action=importfile&act=export_fileSP" name="btnExport" type="submit">Export File</button>
  </form>

  <form action="" method="post" class="col-lg-3 mb-2" style="padding-top: 10px;">
    <select name="filter">
      <option value="1" selected="selected">Lọc mã sản phẩm</option>
      <?php
      $hh = new HangHoa();
      $result = $hh->getListMaLoaiSP();
      while ($set = $result->fetch()) :
      ?>
        <option value="<?php echo $set['maloai'] ?>"><?php echo $set['tenloai'] ?></option>
      <?php
      endwhile;
      ?>
    </select>
    <button name="submit" type="submit">Lọc</button>
  </form>
  <?php
  $filter = 'all';
  ?>

</div>
<div class="row" style="overflow-x: auto; white-space:nowrap;">
  <table class="table table-bordered table-sm">
    <thead>
      <tr class="table table-sm">
        <th>STT hàng</th>
        <th>Tên hàng</th>
        <th>Đơn giá</th>
        <th>Giảm giá</th>
        <th>Hình</th>
        <th style="display: none;">Nhóm</th>
        <th style="display:none;" >Mã loại</th>
        <th style="display:none;">Đặc biệt</th>
        <th style="display:none;">Số lượt xem</th>
        <th style="display:none;">Ngày lập</th>
        <th style="display: none;">Mô tả</th>
        <th>Số lượng tồn</th>
        <th>Màu sắc</th>
        <th>Size</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $hh = new HangHoa();
      if ($filter == 'all') {
        $result = $hh->getListHangHoa();
      }
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['filter'])) {
          $filter = $_POST['filter'];
          $_SESSION['maloai'] = $filter;
          // unset($_SESSION['maloai']);
          // echo '<script>alert("filter là :' . $_SESSION['maloai'] . '")</script>';
          if ($filter == 5) {
            $result = $hh->getListHangHoa();
            // $_SESSION['maloai'] = $filter;
          } else {
            $result = $hh->filtersanphamMaLoai($filter);
            // $_SESSION['maloai'] = $filter;

          }
        }
      }



      $i = 0;
      while ($set = $result->fetch()) :
        $i++;
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $set['tenhh']; ?></td>
          <td><?php echo number_format($set['dongia']);?></td>
          <td><?php echo number_format($set['giamgia']); ?></td>
          <td style="width: 310px;">
            <?php
              $hinh=$set['hinhthumbnail'];
              $arrConvertImg = explode(";",$set['hinhthumbnail']);
              foreach ($arrConvertImg as $key => $value):
            ?>
            <img width="50px" style="margin-left: 15px;" height="50px" src="../Content/imagegiay/<?php echo $value; ?>" />
            <?php
              endforeach;
            ?>
          </td>
          <td style="display:none;"><?php echo $set['Nhom']; ?></td>
          <td style="display:none;"><?php echo $set['maloai']; ?></td>
          <td style="display:none;"><?php echo $set['dacbiet']; ?></td>
          <td style="display:none;"><?php echo $set['soluotxem']; ?></td>
          <td style="display:none;"><?php echo $set['created_at']; ?></td>
          <td style="display: none;"><?php echo $set['mota']; ?></td>
          <td><?php echo $set['soluongton']; ?></td>
          <td><?php echo $set['mausac']; ?></td>
          <td ><?php
          $sizes = explode(',',$set['size']);
          foreach($sizes as $item)
          {
            echo '<span class="badge bg-success mx-1">'.$item.'</span>';
          }
          ?></td>
          <td><a class="btn btn-warning" href="index.php?action=sanpham&act=update&id=<?php echo $set['mahh']; ?>">Edit</a></td>
          <td><a class="btn btn-danger" 
          onclick="return confirm('Bạn có muốn xóa <?php echo   $set['tenhh'] ?> ?')"
           href="index.php?action=sanpham&act=delete&id=<?php echo $set['mahh'] ?>">Delete</a></td>
        </tr>
      <?php
      endwhile;
      ?>
    </tbody>
  </table>
</div>