  <?php
  if ($_GET['act'] == 'insertPost') {
    $ac = 1;
  } elseif ($_GET['act'] == 'update') {
    $ac = 2;
  }
  ?>

  <div class="row">
    <div class="" id="message"></div>
    <?php
    if ($ac == 1) {
      echo '<h3 class="mb-5 font-weight-bold" style="margin-left: 10%; color: red;">Thêm bài viết mới</h3>';
    } elseif ($ac == 2) {
      echo '<h3 class="mb-5 font-weight-bold" style="margin-left: 10%; color: red;">Edit bài viết mới</h3>';
    } else {
      echo '<h3 class="mb-5 font-weight-bold" style="margin-left: 10%; color: red;">không có bài viết mới</h3>';
    }
    ?>

  </div>
  <?php
  if (isset($_GET['id'])) {
    $idpost = $_GET['id'];
    $posts = new Posts();
    $results = $posts->getPostId($idpost);
    $tieude = $results['articletitle'];
    $tacgia = $results['articleauthor'];
    $noidung = $results['content'];
    $mota = $results['mota'];
    $ngayviet = $results['ngayviet'];
    $hinh = $results['thumbnail'];;
    $tag = $results['tag'];;
    $hinhthumbnail = $results['thumbnail'];
  }
  ?>
  <?php
  if ($ac == 1) {
    echo '<form id="formbaiviet" enctype="multipart/form-data" method="post" action="index.php?action=posts&act=insert_action" class="border shadow p-5" style="width: 90%; margin-left: auto;margin-right: auto;">';
  } elseif ($ac == 2) {
    echo '<form id="formbaiviet" enctype="multipart/form-data" method="post" action="" class="border shadow p-5" style="width: 90%; margin-left: auto;margin-right: auto;">';
  }
  ?>

  <div class="row ">
    <div class="col-lg-8">
      <div class="form-outline ">
        <label class="form-label" for="form8Example1" style="color: red;" id="">Tiêu đề bài viết</label>
        <input type="text" id="tieude" name="tieude" class="form-control" placeholder="Nhập tiêu đề ở đây" value="<?php if (isset($tieude)) echo $tieude; ?>" />
      </div>

      <div class="form-outline ">
        <label class="form-label" for="form8Example1" id="" style="color: red;">Nội dung bài viết</label>
        <textarea name="noidung" id="noidung" cols="30" rows="10"><?php if (isset($noidung)) echo $noidung; ?></textarea>
      </div>

      <div class="form-outline ">
        <label class="form-label" for="form8Example1" id="" style="color: red;">Mô tả bài viết</label>
        <textarea name="mota" id="mota" cols="30" rows="10"><?php if (isset($mota)) echo $mota; ?></textarea>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="form-outline">
        <label class="form-label" id="" style="color: red;" for="form8Example2">Ngày viết bài</label>
        <input type="date" id="ngayviet" name="ngayviet" class="form-control" placeholder="Chọn ngày" value="<?php if (isset($ngayviet)) echo $ngayviet; ?>" />
      </div>

      <div class="form-outline">
        <label class="form-label" id="" style="color: red;" for="form8Example2">Tên tác giả</label>
        <input type="text" id="author" name="author" class="form-control" placeholder="Nhập tên tác giả" value="<?php if (isset($tacgia)) echo $tacgia; ?>" />
      </div>

      <div class="form-outline">
        <label><img width="50px" height="50px" id="blah" src="../Content/imagebaiviet/<?php if (isset($_GET['id'])) echo $hinh; ?>"></label>
        Chọn hình thumbnail:
        <input type="file" name="image" id="fileuploadPost" class="form-control" onchange="readURL(this);">
        <input name="hinhthumbnailPost" type="hidden" id="hinhthumbnailPost" value="<?php echo $hinhthumbnail ?>">
      </div>

      <div class="form-outline" style="display: none;">
        <label class="form-label" id="" style="color: red;" for="form8Example2">id bài viết</label>
        <input type="text" id="idposts" name="idposts" class="form-control" placeholder="Nhập ngày" value="<?php if (isset($idpost)) echo $idpost; ?>" />
      </div>

      <div class="form-outline">
        <label class="form-label" id="" style="color: red;" for="form8Example2">Thêm tag bài viết</label>
        <input type="text" id="tagbaiviet" name="tagbaiviet" data-role="tagsinput" class="form-control"  value="<?php if (isset($tag)) echo $tag; ?>" />
      </div>
      <div class="form-group mt-4 mb-2">
        <button name="submit" <?php
                              if ($ac == 1) {
                                echo 'id="submitPost"';
                              } elseif ($ac == 2) {
                                echo 'id="submitPostup"';
                              }
                              ?> type="button" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </div>

  </form>
  <script>
    $(document).ready(function() {
      $('#submitPost').click(function(){
        var data = new FormData();
        var idpost = $('#idposts').val();
        var tieude = $('#tieude').val();
        // var noidung = $('#noidung').val();
        // var mota = $('#mota').val();
        var mota = tinyMCE.get('mota').getContent();
        var noidung = tinyMCE.get('noidung').getContent();
        var ngayviet = $('#ngayviet').val();
        var tacgia = $('#author').val();

        // console.log("noidung");
        // var hinhthumbnailPost = $('#hinhthumbnailPost').val();
        var thumbnail  = $('#fileuploadPost')[0].files[0];
        // var thumbnailexit = $('#hinhthumbnailPost').val();
        var tagbaiviet = $('#tagbaiviet').val();

        data.append('idposts',idpost);
        data.append('tieude',tieude);
        data.append('noidung',noidung);
        data.append('mota',mota);
        data.append('ngayviet',ngayviet);
        data.append('author',tacgia);
        data.append('image',thumbnail);
        // data.append('thumbnailexit',thumbnailexit);
        data.append('tagbaiviet',tagbaiviet);

        // console.log(thumbnailexit);

        $.ajax({
          type: "POST",
          url: "index.php?action=posts&act=insert_action",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          beforeSend: function() {
            $('#submitPost').html('<i class="fa-solid fa-spinner fa-spin"></i>');
            $('#submitPost').attr("disabled", true);
            $('#submitPost').css({
              "border-radius": "50%"
            });
          },

          success: function(data) {
            $('#message').html(data);
          },
          complete: function() {
            setTimeout(function() {
              $('#formbaiviet').trigger("reset");
              $('#submitPost').html('submit');
              $('#submitPost').attr("disabled", false);
              $('#submitPost').css({
                "border-radius": "4px"
              });
            }, 200);
          }
        });
      })
      $('#submitPostup').click(function(){
        var data = new FormData();
        var idpost = $('#idposts').val();
        var tieude = $('#tieude').val();
        // var noidung = $('#noidung').val();
        // var mota = $('#mota').val();
        var mota = tinyMCE.get('mota').getContent();
        var noidung = tinyMCE.get('noidung').getContent();
        var ngayviet = $('#ngayviet').val();
        var tacgia = $('#author').val();
        // var hinhthumbnailPost = $('#hinhthumbnailPost').val();
        var thumbnail  = $('#fileuploadPost')[0].files[0];
        var thumbnailexit = $('#hinhthumbnailPost').val();
        var tagbaiviet = $('#tagbaiviet').val();

        data.append('idposts',idpost);
        data.append('tieude',tieude);
        data.append('noidung',noidung);
        data.append('mota',mota);
        data.append('ngayviet',ngayviet);
        data.append('author',tacgia);
        data.append('image',thumbnail);
        data.append('thumbnailexit',thumbnailexit);
        data.append('tagbaiviet',tagbaiviet);

        // console.log(thumbnailexit);

        $.ajax({
          type: "POST",
          url: "index.php?action=posts&act=update_action",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          beforeSend: function() {
            $('#submitPostup').html('<i class="fa-solid fa-spinner fa-spin"></i>');
            $('#submitPostup').attr("disabled", true);
            $('#submitPostup').css({
              "border-radius": "50%"
            });
          },

          success: function(data) {
            $('#message').html(data);
          },
          complete: function() {
            setTimeout(function() {
              $('#formbaiviet').trigger("reset");
              $('#submitPostup').html('submit');
              $('#submitPostup').attr("disabled", false);
              $('#submitPostup').css({
                "border-radius": "4px"
              });
            }, 200);
          }
        });
      })


      // $("#fileuploadPost").on("change", function(e) {
      //   var form_data = new FormData();
      //   var file_data = $(this).prop('files')[0];
      //   var ext = $(this).val().split('.').prop().toLowerCase();
      //   var filename = e.target.files[0].name;
      //   var thumbnailPost = $('#hinhthumbnailPost');
      //   thumbnailPost.val(filename);
      //   if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
      //     alert("Only jpg and png images allowed");
      //     return;
      //   }

      //   var picsize = (file_data.size);
      //   if (pisize > 2097152) {
      //     alert("image allowd less than 2mb");
      //     return;
      //   }
      //   form_data.append('file', file_data);
      //   $.ajax({
      //     url: './View/ajax/uploadimage_ajax.php?dr=../../../Content/imagebaiviet/',
      //     dataType: 'text',
      //     cache: false,
      //     contentType: false,
      //     processData: false,
      //     data: form_data,
      //     type: 'post',

      //     success: function(res) {
      //       console.log(res);
      //     }
      //   });
      // })
    })
  </script>