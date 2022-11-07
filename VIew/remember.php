<div class="container border shadow mt-4 mb-4">
  <h2>Resset Password</h2>
  <form action="" method="post" style="width:50%; display:inline-block">
    <?php
    include 'mail/sendmail.php';

    if (isset($_POST['submit'])) {
      $error = array();
      $email = $_POST['email'];
      if ($email == "") {
        $error['email'] = 'Không được bỏ trống email';
      }
      if (empty($error)) {
        $kh = new User();
        $mail = new Mailler();
        $resuil = $kh->getEmailKhachHang($email);

        if ($resuil == "") {
          echo "<script>alert('Email không tồn tại')</script>";
          echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=resetpass"/>';
        }
        else{
          $maxacthuc =  substr(rand(0, 999999), 0, 6);
          $title = "Quên mật khẩu";
          $content = "Mã xác nhận của bạn là: <span style='color:green'>" . $maxacthuc . "</span>";
          $mail->sendMail($title, $content, $email);
          $_SESSION['mail'] = $email;
          $_SESSION['maxacthuc'] = $maxacthuc;
          // header('location: View/Verification.php');
          // include "View/Verification.php";
          // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=Verification"/>';
        }


      }
    }
    ?>
    <div class="form-group">
      <label for="email">Nhập email đã đăng ký:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter your email " name="email">
      <span style="color: red;"><?php if (isset($error['email'])) echo $error['email'] ?></span>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
  <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="Girl in a jacket" width="350" height="325" style="margin: -90px 0 50px 60px;">
</div>