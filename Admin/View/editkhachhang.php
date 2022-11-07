<?php
if (isset($_GET['act'])) {
    if ($_GET['act'] == "insertKhachHang") {
        $ac = 1;
    } elseif ($_GET['act'] == 'update') {
        $ac = 2;
    } else {
        $ac = 0;
    }
}

?>
<div class="col" id="message"></div>
<div class="row col-md-4 col-md-offset-4 mx-auto">
    <?php
    if ($ac == 1) {
        echo '<h3 class="mb-5 font-weight-bold">Thêm khách hàng</h3>';
    } elseif ($ac == 2) {
        echo '<h3 class="mb-5 font-weight-bold">Update khách hàng</h3>';
    } else {
        echo '<h3 class="mb-5 font-weight-bold">Không có khách hàng khách hàng</h3>';
    }

    ?>

    <?php
    if (isset($_GET['id'])) {
        $makh = $_GET['id'];
        $kh = new KhachHang();
        $result = $kh->getIdKhachHang($makh);
        $tenkh = $result['tenkh'];
        $username = $result['username'];
        $matkhau = $result['matkhau'];
        $email = $result['email'];
        $diachi = $result['diachi'];
        $sodienthoai = $result['sodienthoai'];
        $vaitro = $result['vaitro'];
    }

    ?>

    <?php
    if ($ac == 1) {
        echo '<form class="form border boxshadow"  method="post" enctype="multipart/form-data" id="myform">';
    } elseif ($ac == 2) {
        echo '<form class="form border boxshadow" action="" method="post" enctype="multipart/form-data" id="myform">';
    }
    ?>


    <div class="form-group" style="display: none;">
        <label>Mã khách hàng</label>
        <input type="text" class="form-control" name="makh" value="<?php if (isset($makh)) echo $makh; ?>" readonly>
        <?php
        if (!empty($error['tenkh']['required'])) {
            echo '<span style="color:red;">' . $error['tenkh']['required'] . '</span>';
        }

        ?>
    </div>
    <div class="form-group mt-2">
        <label>Tên khách hàng</label>
        <input type="text" class="form-control" id="tenkh" name="tenkh" value="<?php if (isset($tenkh)) echo $tenkh; ?>" maxlength="100px">
        <span class="error" style="color: red;" for="form8Example1" id="tenkh_err"></span>

    </div>
    <div class="form-group mt-2">
        <label>Username</label>
        <input type="text" class="form-control" name="username" id="username" value="<?php if (isset($username)) echo $username; ?>" maxlength="100px">
        <span class="error" style="color: red;" for="form8Example1" id="username_err"></span>
    </div>
    <div class="form-group mt-2">
        <label>Mật khẩu</label>
        <input id="matkhau" type="password" class="form-control" name="matkhau" value="<?php if (isset($matkhau)) echo $matkhau; ?>" maxlength="100px">
    </div>
    <div class="form-group mt-2">
        <label>Email</label>
        <input type="email" id="email" class="form-control" name="email" value="<?php if (isset($email)) echo $email; ?>" maxlength="100px" required>
        <span class="error" style="color: red;" for="form8Example1" id="email_err"></span>
    </div>
    <div class="form-group mt-2">
        <label>Địa chỉ</label>
        <input type="text" id="diachi" class="form-control" name="diachi" value="<?php if (isset($diachi)) echo $diachi; ?>" maxlength="100px">
        <span class="error" style="color: red;" for="form8Example1" id="diachi_err"></span>
    </div>
    <div class="form-group mt-2">
        <label>Số điện thoại</label>
        <input type="text" id="sodienthoai" class="form-control" name="sodienthoai" required value="<?php if (isset($sodienthoai)) echo $sodienthoai; ?>" maxlength="100px">
        <span class="error" style="color: red;" for="form8Example1" id="sodienthoai_err"></span>
    </div>
    <div class="form-group mt-4 mb-2">
        <div class="form-group mt-4 mb-2">
            <button name="submit" <?php
                                    if ($ac == 1) {
                                        echo 'id="submitInsertkh"';
                                    } elseif ($ac == 2) {
                                        echo 'id="submitUpdateKh"';
                                    }
                                    ?> type="button" class="btn btn-danger">Submit</button>
        </div>
    </div>
    </form>
</div>