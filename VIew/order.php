<div class="container">
  <div class="table-responsive">
    <?php
    if (!isset($_SESSION['makh'])) :
      echo '<script> alert("Bạn chưa đăng nhập");</script>';
      echo '<meta http-equiv="refresh" content="0;url=../index.php?action=login"/>';
    ?>
    <?php
    else :
    ?>
      <form action="" method="post">
        <table class="table table-bordered" border="0">
          <?php
          $hd = new Order();
          if (isset($_SESSION['soidhd'])) {
            $result = $hd->getOrder($_SESSION['soidhd']);
            $date = new DateTime($result['ngaydat']);
            $ngay = $date->format("d/m/Y");
          }
          ?>

          <tr>
            <td colspan="4">
              <h2 style="color: red;">HÓA ĐƠN</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2">Số Hóa đơn: <?php echo $result['idhoadon']; ?> </td>
            <td colspan="2"> Ngày lập: <?php echo $ngay; ?></td>
          </tr>
          <tr>
            <td colspan="2">Họ và tên:</td>
            <td colspan="2"><?php echo $result['tenkh']; ?></td>
          </tr>
          <tr>
            <td colspan="2">Địa chỉ: </td>
            <td colspan="2"><?php echo $result['diachi']; ?></td>
          </tr>
          <tr>
            <td colspan="2">Số điện thoại: </td>
            <td colspan="2"><?php echo $result['sodienthoai']; ?></td>
          </tr>

        </table>
        <table class="table table-bordered">
          <thead>

            <tr class="table-success">
              <th>Số TT</th>
              <th>Thông Tin Sản Phẩm</th>
              <th>Giá</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            $tongtien=0;
            $resultct = $hd->getOrderDetail($_SESSION['soidhd']);
            while ($set = $resultct->fetch()) :
              $tongtien+=$set['thanhtien'];
              $i++;
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $set['tenhh']; ?></td>
                <td>Đơn Giá: <?php echo number_format($set['dongia']); ?> - Số Lượng: <?php echo $set['soluong']; ?> <br />
                </td>
              </tr>
            <?php
            endwhile;
            $_SESSION['tong'] = $tongtien;
            ?>
            <tr>
              <td></td>
              <td></td>
              <td style="float: right;border-style:none">
                <b>Tổng Tiền</b>
                <b><?php echo number_format($_SESSION['tong'])?> <sup><u>đ</u></sup></b>
              </td>

            </tr>
          </tbody>
        </table>
      </form>
    <?php
    endif;
    ?>
  </div>
 
</div>