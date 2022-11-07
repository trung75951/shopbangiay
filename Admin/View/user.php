<div class="col-md-4 col-md-offset-4">
  <h3><b>DANH SÁCH USER</b></h3>
</div>
<div class="row col-12">
  <?php
  if ($_SESSION['vaitro'] == 'admin') {

    echo '<a class="col-lg-2" style="width: 13%;" href="index.php?action=user&act=insertsp">
    <button class="btn btn-success">Thêm user mới</button>
  </a>';
  } else {
    echo '<a class="col-lg-2" style="width: 13%;" href="index.php?action=user&act=insertsp">
    <button class="btn btn-dark">Thêm user mới</button>
  </a>';
  }

  ?>
  <!-- <a class="col-lg-2" style="width: 13%;" href="index.php?action=user&act=insertsp">
    <button class="btn btn-success">Thêm user mới</button>
  </a> -->
  <form action="" method="post" class="mb-2 col-lg-3">
    <button class="btnExport" href="" name="btnExport" type="submit">Export File</button>
  </form>
</div>
<div class="row mt-4" style="overflow-x: auto; white-space:nowrap;">
  <table class="table table-bordered table-sm">
    <thead>
      <tr class="table table-sm">
        <th>STT</th>
        <th>FisrtName</th>
        <th>LastName</th>
        <th>Hình</th>
        <th>Email</th>
        <th>Username</th>
        <th style="display: none;">Mật khẩu</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th style="display: none;">Vai trò</th>
        <th>Số điện thoại</th>
        <th>Ngày tạo</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $Us = new User();
      $result = $Us->getListUser();
      $i = 0;
      while ($set = $result->fetch()) :
        $i++;
      ?>
        <tr class="
          <?php

          if (($_SESSION['iduser']) == $set['id_user']) {
            echo 'table-success';
          } else {
            echo 'table';
          }
          ?>">
          <td><?php echo $i; ?></td>
          <td><?php echo $set['fisrt_name']; ?></td>
          <td><?php echo $set['last_name']; ?></td>
          <td><img width="50px" height="50px" src="../Content/profile/<?php echo $set['hinh']; ?>" /></td>
          <td><?php echo $set['email']; ?></td>
          <td><?php echo $set['username']; ?></td>
          <td style="display: none;"><?php echo $set['matkhau']; ?></td>
          <td><?php echo $set['ngaysinh']; ?></td>
          <td><?php echo $set['street']; ?></td>
          <td style="display: none;"><?php echo $set['vaitro']; ?></td>
          <td><?php echo $set['sodienthoai']; ?></td>
          <td><?php echo $set['created_at']; ?></td>

          <?php
          if ($_SESSION['vaitro'] == 'user') :
          ?>
            <td><a class="btn btn-warning" href="index.php?action=user&act=checkVaitro&id=<?php echo $set['id_user'] ?>">Edit</a></td>
          <?php
          else :
            echo '<td><a class="btn btn-warning" href="index.php?action=user&act=update&id=' . $set["id_user"] . '">Edit</a></td>';
          ?>
          <?php
          endif;
          ?>

          <?php
          if ($_SESSION['vaitro'] == 'admin') :

          ?>

            <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa <?php echo $set['id_user'] . '-' . $set['fisrt_name'] ?> ?')" href="index.php?action=user&act=delete&id=<?php echo $set["id_user"]; ?>">Delete</a></td>

          <?php
          else :
            echo '<td><a class="btn btn-dark disabled" href="" >Delete</a></td>';
          ?>
          <?php
          endif;
          ?>
        </tr>
      <?php
      endwhile;
      ?>
    </tbody>
  </table>
</div>