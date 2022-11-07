<div class="col-md-4 col-md-offset-4">
    <h3><b>DANH SÁCH KHÁCH HÀNG TRONG THÙNG RÁC</b></h3>
</div>

<form class="d-none d-md-inline-block form-inline ms-auto " action="index.php?action=khachhang&act=timkiem" method="post">
    <div class="input-group">
        <input class="form-control" type="text" placeholder="Tìm kiếm" aria-describedby="btnNavbarSearch" name="txtsearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" id="btsearch" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>

<div class="row mt-2">
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="table table-sm">
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>username</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th>Khôi phục</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>


            <?php
  
            if (isset($_GET['act']) == 'timkiem') {
                $ac = 'timkiem';
                if ($ac == 'timkiem') {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_POST['txtsearch'])) {
                            $namesearch = $_POST['txtsearch'];
                            $result = $kh->getSearchKh($namesearch);
                        }
                    }
                }
            }
                $rec=new Recyle();
                $result=$rec->getListTrangThaiHide();
                while ($set = $result->fetch()):
                    ?>
                    <tr>
                        <td><?php echo $set['makh'] ?></td>
                        <td><?php echo $set['tenkh'] ?></td>
                        <td><?php echo $set['username'] ?></td>
                        <td><?php echo $set['matkhau'] ?></td>
                        <td><?php echo $set['email'] ?></td>
                        <td><?php echo $set['diachi'] ?></td>
                        <td><?php echo $set['sodienthoai'] ?></td>
                        <td><?php echo $set['vaitro'] ?></td>
                        <td><a class="btn btn-warning" href="index.php?action=recycle&act=restore&id=<?php echo $set['makh']; ?>">Restore</a></td>
                        <td><a class="btn btn-danger" href="index.php?action=recycle&act=deleteVinhvien&id=<?php echo $set['makh']; ?>">Delete</a></td>
                    </tr>
                    <?php
                        endwhile;
                    ?>

           
        </tbody>
    </table>
</div>