<div class="col-md-4 col-md-offset-4">
    <h3><b>DANH SÁCH KHÁCH HÀNG</b></h3>
</div>
<div class="row col-12">
    <a href="index.php?action=khachhang&act=insertKhachHang">
        <h4>Tạo khách hàng mới</h4>
    </a>


    <form action="Model/export.php" method="post" class="mb-2">

        <button class="btnExport" href="index.php?action=importfile&act=export_fileKH" name="btnExport" type="submit">Export File</button>
    </form>
</div>

<form action="" method="post" class="mb-2">
    <select name="filter">
        <option value="all" selected="selected">Lọc khách hàng</option>
        <option value="more">Khách hàng mua nhiều</option>
        <option value="normal">Khách hàng thường</option>
        <option value="all">Tất cả</option>
    </select>
    <button name="submit" type="submit">Lọc</button>
</form>
<?php
$filter = "all";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['filter'])) {
        $filter = $_POST['filter'];
        echo '<script>alert("filter là :' . $filter . '")</script>';
    }
}
?>
<form class="d-none d-md-inline-block form-inline ms-auto " action="index.php?action=khachhang&act=timkiem" method="post">
    <div class="input-group">
        <input class="form-control" type="text" placeholder="Tìm kiếm" aria-describedby="btnNavbarSearch" name="txtsearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" id="btsearch" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>

<div class="row mt-2" style="overflow-x: auto; white-space:nowrap;">
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="table table-sm">
                <th>STT khách hàng</th>
                <th>Tên khách hàng</th>
                <th>username</th>
                <th style="display: none;">Mật khẩu</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th style="display: none;">Vai trò</th>
                <th>Cập nhật</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>


            <?php


            // $kh = new KhachHang();
            // $result = $kh->getListKhachHang();

            // while ($set = $result->fetch()) :





            $kh = new KhachHang();
            if ($filter == 'all') {
                $kh = new KhachHang();
                $result = $kh->getListTrangThai();
            } elseif(isset($filter)=='normal' && isset($filter)=='more') {

                $result = $kh->fillterKhachhang($filter);
            }

            if (isset($_GET['act']) == 'timkiem') {
                $ac = 'timkiem';
                if ($ac == 'timkiem') {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_POST['txtsearch'])) {
                            $namesearch = $_POST['txtsearch'];
                            $result = $kh->getSearchKh($namesearch);
                            // echo $result;
                        }
                    }
                }
            } else {
                # code...
            }
            // $re = new Recyle();
            $i = 0;
            // $result = $kh->getListTrangThai();
            while ($set = $result->fetch()) :
                $i++;
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $set['tenkh'] ?></td>
                    <td><?php echo $set['username'] ?></td>
                    <td style="display: none;"><?php echo $set['matkhau'] ?></td>
                    <td><?php echo $set['email'] ?></td>
                    <td><?php echo $set['diachi'] ?></td>
                    <td><?php echo $set['sodienthoai'] ?></td>
                    <td style="display: none;"><?php echo $set['vaitro'] ?></td>
                    <td><a class="btn btn-warning" href="index.php?action=khachhang&act=update&id=<?php echo $set['makh']; ?>">Edit</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa <?php echo   $set['tenkh'] ?> ?')" href="index.php?action=recycle&act=delete&id=<?php echo $set['makh']; ?>">Delete</a></td>
                </tr>
            <?php
            endwhile;
            ?>


        </tbody>
    </table>
</div>