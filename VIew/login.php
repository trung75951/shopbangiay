<div class="container border shadow mt-4 mb-4" >
	<h2>Login</h2>
  <div class="col" id="message"></div>
  <form action="index.php?action=login&act=login_action" method="post" style="width:50%; display:inline-block">
    <div class="form-group">
      <label for="email">Email or Phone:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email or phone" name="email">
      <span class="error" style="color: red;" id="email_err"></span>

    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
      <span class="error" style="color: red;" id="pwd_err"></span>

    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <!-- <input class="form-check-input" type="checkbox" name="remember"> Remember me -->

        <a name="remember" href="index.php?action=login&act=resetpass">Quên mật khẩu</a>
      </label>
    </div>
    <button type="button" id="button_login" class="btn btn-primary">Submit</button>
  </form>
      <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="Girl in a jacket" width="350" height="325" style="margin: -90px 0 50px 60px;">
</div>


<!-- <div class="container" style="margin-top: 100px;">
    <form action="index.php?action=login&act=login_action" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control" id="email" name="email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
    </form>
    <a href="index.php?action=auth&act=reset">Quên mật khẩu</a>
    <a href="index.php?action=auth&act=resgister">Tạo tài khoản</a>
</div> -->

<script>
  $(document).ready(function(){
    $('#email').on('input', function() {
      checkemail();
    });

    $('#pwd').on('input', function() {
      checkpwd();
    });

    $("#button_login").click(function(){
      if (!checkemail() && !checkpwd()) {
        console.log("er1");
        
      }
    })

    function checkemail() {
      if ($("#email").val() == "") {
        $("#email_err").html("Email hoặc số điện thoại không được để trống");
        return false;
      } else {
        $("#email_err").html("");
        return true;
      }
    }

    function checkpwd() {
      if ($("#pwd").val() == "") {
        $("#pwd_err").html("Mật khẩu không được để trống");
        return false;
      } else {
        $("#pwd_err").html("");
        return true;
      }
    }
  })
 
</script>