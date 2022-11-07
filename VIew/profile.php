<hr>
<div class="container bootstrap snippet">
  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $kh = new User();
    $resuilt = $kh->getIdKhachHang($id);
  }
  ?>
  <form action="index.php?action=home&act=update_action" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $resuilt['makh'] ?>">
    <div class="row">
      <div class="col-sm-3">
        <!--left col-->


        <div class="text-center">
          <img id="blah" src="../Content/profile/<?php echo $resuilt['hinhprofile'] ?>" class="avatar rounded-circle thumbnail" style="width: 100%;" alt="avatar">
          <input type="file" name="image" id="fileupload" class="text-center center-block file-upload" onchange="readURL(this);">
          <h6>Upload a different photo...</h6>
          <!-- <input type="file" class=""> -->
        </div>
        </hr><br>


        <div class="panel panel-default">
          <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
          <div class="panel-body"><a href=""></a></div>
        </div>


        <ul class="list-group">
          <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
        </ul>


      </div>
      <!--/col-3-->
      <div class="col-sm-9">
        <div class="tab-content">
          <div class="tab-pane active" id="home">
            <hr>
            <form class="form" method="post" id="registrationForm">
              <input type="hidden" name="">
              <div class="form-group">
                <input name="hinhprofilexit" type="hidden" value="<?php echo $resuilt['hinhprofile'] ?>">

                <div class="col-xs-6">
                  <label for="first_name">
                    <h4>Tên của bạn</h4>
                  </label>
                  <input type="text" class="form-control" name="tenkh" id="first_name" value="<?php echo $resuilt['tenkh'] ?>" placeholder="Nhập tên của bạn" title="enter your first name if any.">
                  <span class="form-label" style="color: red;" for="form8Example5" id="soluongton_err">Lỗi hiển thị ở đây</span>

                </div>
              </div>
              <div class="form-group">

                <div class="col-xs-6">
                  <label for="last_name">
                    <h4>Username</h4>
                  </label>
                  <input type="text" class="form-control" name="username" id="last_name" value="<?php echo $resuilt['username'] ?>" placeholder="Nhập username" title="enter your last name if any.">
                </div>
              </div>

              <div class="form-group">

                <div class="col-xs-6">
                  <label for="phone">
                    <h4>Số điện thoại</h4>
                  </label>
                  <input type="text" class="form-control" name="sodienthoai" id="phone" value="<?php echo $resuilt['sodienthoai'] ?>" placeholder="Nhập số điện thoại" title="enter your phone number if any.">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-6">
                  <label for="mobile">
                    <h4>Địa chỉ</h4>
                  </label>
                  <input type="text" class="form-control" name="diachi" id="mobile" value="diachi" placeholder="Nhập địa chỉ" title="enter your mobile number if any.">
                </div>
              </div>
              <div class="form-group">

                <div class="col-xs-6">
                  <label for="email">
                    <h4>Email</h4>
                  </label>
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo $resuilt['email'] ?>" placeholder="Nhập địa chỉ email" title="enter your email.">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12">
                  <br>
                  <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                  <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                </div>
              </div>
            </form>

            <hr>

          </div>
          <!--/tab-pane-->
        </div>

      </div>
      <!--/col-9-->
    </div>

  </form>

  <script>
    $('#fileupload').on('change', function() {
      console.log("test");
      var file_data = $(this).prop('files')[0];
      var form_data = new FormData();
      var ext = $(this).val().split('.').pop().toLowerCase();
      if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        alert("only jpg and png images allowed");
        return;
      }
      var picsize = (file_data.size);
      console.log(picsize); /*in byte*/
      if (picsize > 2097152) /* 2mb*/ {
        alert("Image allowd less than 2 mb")
        return;
      }
      form_data.append('file', file_data);
      $.ajax({
        url: 'View/ajax/uploadhinh.php',
        /*point to server-side PHP script */
        dataType: 'text',
        /* what to expect back from the PHP script, if anything*/
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(res) {
          console.log(res);
        }
      });
    });
  </script>



  <!--/row-->