<?php
if (isset($_GET['act'])) {
  if ($_GET['act']  == 'insertsp') {
    $ac = 1;
  } elseif ($_GET['act'] == 'update') {
    $ac = 2;
  } elseif ($_GET['act'] == 'checkVaitro') {
    $ac = 3;
  } else {
    $ac = 0;
  }
}


?>
<div class="row" id="message"></div>
<div class="row">
  <?php
  if ($ac == 1) {
    echo '<h3 class="mb-5 font-weight-bold" style="margin-left: 10%; color: red;">Thêm user mới</h3>';
  } elseif ($ac == 2 || $ac == 3) {
    echo '<h3 class="mb-5 font-weight-bold" style="margin-left: 10%; color: red;">Cập nhật người dùng </h3>';
  } else {
    echo '<h3 class="mb-5 font-weight-bold" style="margin-left: 10%; color: red;">Không có User nào</h3>';
  }
  ?>
</div>

<?php
if ($ac == 1) {
  echo '<form  enctype="multipart/form-data"  method="post" class="border shadow p-5" style="width: 68%; margin-left: auto;margin-right: auto;" id="myform">';
}
if ($ac == 2 || $ac == 3) {
  echo '<form  enctype="multipart/form-data"  method="post" class="border shadow p-5" style="width: 68%; margin-left: auto;margin-right: auto;" id="myform">';
}
?>
<?php
if (isset($_GET['id'])) {
  $iduser = $_GET['id'];
  $us = new User();
  $result = $us->getUserID($iduser);
  $fisrtname = $result['fisrt_name'];
  $lastname = $result['last_name'];
  $email = $result['email'];
  $username = $result['username'];
  $hinh = $result['hinh'];
  $street = $result['street'];
  $ngaysinh = $result['ngaysinh'];
  $matkhau = $result['matkhau'];
  $vaitro = $result['vaitro'];
  $sodienthoai = $result['sodienthoai'];
}

?>

<div class="row ">
  <div class="col">
    <!-- Name input -->
    <div class="form-outline ">
      <input type="text" id="fisrtname" class="form-control" name="fisrtname" placeholder="Nhập First name" value="<?php if (isset($fisrtname)) echo $fisrtname; ?>" />
      <label class="form-label" for="form8Example1" id="fisrtname_err" style="color: red;"></label>
    </div>
  </div>
  <div class="col">
    <!-- Email input -->
    <div class="form-outline">
      <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Nhập last Name" value="<?php if (isset($lastname)) echo $lastname; ?>" />
      <label class="form-label" id="lastname_err" style="color: red;" for="form8Example2"></label>
    </div>
  </div>
</div>

<hr />

<div class="row">
  <div class="col">
    <!-- Name input -->
    <div class="form-outline">
      <input type="email" name="email" id="email" class="form-control" placeholder="Nhập Email" value="<?php if (isset($email)) echo $email; ?>" />
      <label class="form-label" id="email_err" style="color: red;" for="form8Example3"></label>
    </div>
  </div>
  <div class="col">
    <!-- Name input -->
    <div class="form-outline">
      <input type="text" id="username" class="form-control" placeholder="Nhập username" name="username" value="<?php if (isset($username)) echo $username; ?>" />
      <label class="form-label" id="username_err" style="color: red;" for="form8Example4"></label>
    </div>
  </div>
  <div class="col">
    <!-- Email input -->
    <div class="form-outline">
      <input type="text" name="street" id="diachi" class="form-control" placeholder="Nhập địa chỉ" value="<?php if (isset($street)) echo $street; ?>" />
      <label class="form-label" id="diachi_err" style="color: red;" for="form8Example5"></label>
    </div>
  </div>
</div>
<hr />

<div class="row">
  <div class="col">
    <!-- Name input -->
    <div class="form-outline">
      <input type="date" id="form8Example3" name="ngaysinh" class="form-control" placeholder="Chọn ngày sinh" value="<?php if (isset($ngaysinh)) echo $ngaysinh; ?>" />
      <label class="form-label" for="form8Example3">Ngày sinh</label>
    </div>
  </div>
  <div class="col">
    <!-- Name input -->
    <div class="form-outline">
      <input type="password" id="form8Example4" class="form-control" placeholder="Nhập mật khẩu" name="matkhau" value="<?php if (isset($matkhau)) echo $matkhau; ?>" />
      <label class="form-label" id="" style="color: red;" for="form8Example4"></label>
    </div>
  </div>
  <div class="col">
    <!-- Email input -->
    <div class="form-outline">
      <input type="text" id="form8Example5" class="form-control" placeholder="Nhập vai trò" name="vaitro" value="<?php if (isset($vaitro)) echo $vaitro; ?>" />
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <!-- Name input -->
    <div class="form-outline">


      <label><img width="50px" height="50px" id="blah" src="../Content/profile/<?php if (isset($_GET['id'])) echo $hinh; ?>"></label>
      Chọn file để upload:
      <input type="file" name="image" id="fileupload" class="form-control" onchange="readURL(this);">
    </div>
  </div>
  <div class="col">
    <!-- Email input -->
    <div class="form-outline">
      <input type="text" id="sodienthoai" name="sodienthoai" class="form-control" placeholder="Nhập số điện thoại" value="<?php if (isset($sodienthoai)) echo $sodienthoai; ?>" />
      <label class="form-label" id="sodienthoai_err" style="color: red;" for="form8Example2"></label>
    </div>
  </div>
  <?php
  if (isset($_GET['id'])) :
  ?>
    <div class="col">
      <div class="form-line">
        <input type="text" id="form8Example1" class="form-control" name="id_user" placeholder="id"  value="<?php if (isset($iduser)) echo $iduser; ?>" />
        <label class="form-label" id="" style="color: red;" for="form8Example1">id user</label>
      </div>
    </div>

  <?php
  endif
  ?>


</div>

<hr />

<div class="form-group mt-4 mb-2">
  <button name="submit" <?php
                        if ($ac == 1) {
                          echo 'id="submitInsertUser"';
                        } elseif ($ac == 2 ||$ac==3) {
                          echo 'id="submitUpdateUser"';
                        }
                        ?> type="button" class="btn btn-danger">Submit</button>
</div>
</form>