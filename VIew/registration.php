<?php
$name = $email = $phone = $pass = $diachi = $user = $passlai = "";
$nameErr = $emailErr = $phoneErr = $passErr = $diachiErr = $userErr = $passlaiErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["txttenkh"])) {
    $nameErr = "*Tên Khách Hàng không được rỗng";
  }
  $name = test_input($_POST["txttenkh"]);
  // kiểm tra user
  if (empty($_POST["txtusername"])) {
    $userErr = "*Tên đăng nhập không được rỗng";
  }
  $user = test_input($_POST["txtusername"]);
  // kiểm tra email
  if (empty($_POST["txtemail"])) {
    $emailErr = "*Email không được rỗng";
  } else {
    $email = test_input($_POST["txtemail"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "*Email phải đúng định dạng";
    }
  }
  $email = test_input($_POST["txtemail"]);
  // kiểm tra địa chỉ
  if (empty($_POST["txtdiachi"])) {
    $diachiErr = "*Địa Chỉ không được rỗng";
  } else {
    $diachi = test_input($_POST["txtdiachi"]);
  }
  // số điện thoại không được rỗng và phải là 0 ở đầu,10,11 ký tự
  if (empty($_POST["txtsodt"])) {
    $phoneErr = "*Phone không được rỗng";
  } else {
    $phone = test_input($_POST["txtsodt"]);
    if (!preg_match('/^[0]{1}[0-9]{9,10}$/', $phone)) {
      $phoneErr = "*Phone số 0 ở đầu và độ dài 10,11 ký tự";
    }
  }
  // kiểm tra pass phải là ký tự in hoa ở đầu, có ký tự đặt biệt, có số, có chữ
  if (empty($_POST["txtpass"])) {
    $passErr = "*Mật Khẩu không được rỗng";
  } else {
    $pass = test_input($_POST["txtpass"]);
  }
  // kiểm tra pass
  if (empty($_POST["retypepassword"])) {
    $passlaiErr = "*không được rỗng";
  } else {
    $passlai = test_input($_POST["retypepassword"]);
    $passtruoc = $_POST["txtpass"];
    $passtruocsau = $_POST["retypepassword"];
    if ($passtruoc != $passtruocsau) {
      $passlaiErr = "*Mật Khẩu không Trùng Nhau!!!!";
    }
  }
}
function test_input($data)
{
  $data = trim($data); // cắt khoảng trắng vô nghĩa
  $data = stripslashes($data); // thay các ký tự \ thành ''
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!--  -->
<div class="container border shadow mt-4 mb-4">

  <div class="row pt-3 pb-3">
    <div class="col-xs-12 col-sm-12 col-md-5 well well-sm col-md-offset-4" style="margin-left: 325px;">
      <legend><a href=""><i class="glyphicon glyphicon-globe"></i></a> NHẬP ĐẦY ĐỦ THÔNG TIN !
      </legend>
      <form action="
   <?php
    if (
      !empty($_POST["txttenkh"]) &&
      !empty($_POST["txtsodt"]) && preg_match('/^[0]{1}[0-9]{9,10}$/', $phone) &&
      !empty($_POST["txtusername"]) &&
      !empty($_POST["txtemail"]) && filter_var($email, FILTER_VALIDATE_EMAIL) &&
      !empty($_POST["txtdiachi"]) &&
      !empty($_POST["txtpass"]) &&
      !empty($_POST["retypepassword"]) && $_POST["txtpass"] == $_POST["retypepassword"]
    ) :
    ?>
   
   index.php?action=registration&act=registration_action
   <?php
    endif;
    ?>
   " method="post" class="form" role="form">
        <div class="row">
          <!-- tên khach -->
          <div class="col-xs-4 col-md-4"> <label>Tên Khách Hàng:</label> </div>
          <div class="col-xs-8 col-md-8">
            <input class="form-control" id="tenkhach" value="<?php if (isset($name)) echo $name; ?>" name="txttenkh" placeholder="Tên khách hàng" type="text">
            <span style="color:red"><?php if (isset($nameErr)) echo $nameErr; ?></span>
          </div>

          <!-- địa chỉ -->
          <div class="col-xs-4 col-md-4"> <label>Địa chỉ:</label></div>
          <div class="col-xs-8 col-md-8">
            <input class="form-control" id="diachi" value="<?php echo $diachi; ?>" name="txtdiachi" onclick='xuat()' placeholder="Địa chỉ khách hàng" type="text">
            <span style="font-size:15px" id="xuat"></span>
            <span style="color:red"><?php if (isset($diachiErr)) echo $diachiErr; ?></span>
          </div>


          <!-- Phone -->
          <div class="col-xs-4 col-md-4"> <label>Số Điện Thoại:</label></div>
          <div class="col-xs-8 col-md-8">
            <input class="form-control" id="phone" value="<?php echo $phone; ?>" name="txtsodt" placeholder="Số điện thoại khách hàng" type="text">
            <span style="color:red"><?php if (isset($phoneErr)) echo $phoneErr; ?></span>
          </div>

          <!-- user -->
          <div class="col-xs-4 col-md-4"><label>Tên Đăng Nhập:</label></div>
          <div class="col-xs-8 col-md-8">
            <input class="form-control" id="user" value="<?php echo $user; ?>" name="txtusername" placeholder="Tên đăng nhập" type="text">
            <span style="color:red"><?php if (isset($userErr)) echo $userErr; ?></span>
          </div>

          <!-- EMial -->
        </div><label>Email:</label>
        <input class="form-control" id="email" value="<?php echo $email; ?>" name="txtemail" placeholder="Email" type="email">
        <span style="color:red"><?php if (isset($emailErr)) echo $emailErr; ?><br></span>

        <!-- Pass -->
        <label>Mật Khẩu:</label>
        <input class="form-control" id="pass" value="<?php echo $pass; ?>" name="txtpass" placeholder="Mật khẩu" type="password">
        <span style="color:red"><?php if (isset($passErr)) echo $passErr; ?><br>
        </span>
        <!-- Pass -->
        <label>Nhập Lại Mật Khẩu:</label>
        <input class="form-control" id="passlai" value="<?php echo $passlai; ?>" name="retypepassword" placeholder="Nhập lại mật khẩu" type="password">
        <span style="color:red;margin-top:-80px"><?php if (isset($passlaiErr)) echo $passlaiErr; ?></span>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"> Đăng ký</button>
      </form>
    </div>
  </div>
</div>