<div class="container border shadow mt-4 mb-4">
  <h2>Resset Password</h2>
  <form action="" method="post" style="width:50%; display:inline-block">
    <div class="form-group">
      <!-- <label for="email">Nhập mã xác thực</label> -->

      <?php
        if (isset($_POST['submit'])) {
          $error = array();
          if ($_POST['code'] != $_SESSION['maxacthuc']) {
            $error['fail'] = "Mã xác nhận không tồn tại"; 
          }

          else{
            echo "<script>alert('Nhập mã xác nhận thành công')</script>";
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=changepassword"/>';
          }

        }
      ?>

      <?php
        if (isset($error['fail'])) {
          echo '<div class="alert alert-danger" role="alert">'.$error['fail'].'</div>';
        }
        else{
          echo '<div class="alert alert-primary" role="alert">Hãy nhập mã xác nhận mà chúng tôi gửi</div>';
        }
      ?>
      <input type="text" class="form-control" id="code" placeholder="Enter your code " name="code">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
  <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="Girl in a jacket" width="350" height="325" style="margin: -90px 0 50px 60px;">
</div>