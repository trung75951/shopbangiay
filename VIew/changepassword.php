<div class="container border shadow mt-4 mb-4">
  <h2>Đổi mật khẩu mới</h2>
  <form action="" method="post" style="width:50%; display:inline-block">
    <div class="form-group">
      <?php
      if (isset($_POST['submit'])) {
        $error = array();
        $password = $_POST['password'];
        $crytppassword = md5($password);
        $passwordre = $_POST['passwordre'];
        if ($password != $passwordre) {
          $error['fail'] = "Nhập mật khẩu không giống nhau";
        }
        elseif($password == "" && $passwordre ==""){
          $error['fail'] = "Không được bỏ trống";
        }
        elseif($password == $passwordre){
          $kh = new User();
          $kh->changePassword($crytppassword, $_SESSION['mail']);
          echo "<script>alert('Đổi mật khẩu thành công')</script>";
          unset($_SESSION['maxacthuc']);
          echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
        }
      } 
      ?>
      <?php
      if (isset($error['fail'])) {
        echo '<div class="alert alert-danger" role="alert">' . $error['fail'] . '</div>';
      }
      else {
        echo '<div class="alert alert-success" role="alert">Đổi mật khẩu mới tại đây</div>';
      }
      ?>
      <input type="text" class="form-control mb-4" id="password" placeholder="Nhập mật khẩu mới" name="password">
      <input type="text" class="form-control" id="passwordre" placeholder="Nhập lại mật khẩu" name="passwordre">
    </div>
    <div class="form-group form-check">
      <!-- <input class="form-check-input" type="checkbox" name="remember"> Remember me -->
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
  <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="Girl in a jacket" width="350" height="325" style="margin: -90px 0 50px 60px;">
</div>