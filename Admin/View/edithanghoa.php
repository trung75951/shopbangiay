<?php
if (isset($_GET['act'])) {
  if ($_GET['act'] == "insertsp") {
    $ac = 1;
  } elseif ($_GET['act'] == "update") {
    $ac = 2;
  } else {
    $ac = 0;
  }
}
?>



<div class="row col-md-12 col-md-offset-4 ">
  <?php
  if ($ac == 1) {
    echo '<h3 class="mb-5 font-weight-bold">THÊM SẢN PHẨM</h3>';
  } elseif ($ac == 2) {
    echo '<h3 class="mb-5 font-weight-bold">UPDATE SẢN PHẨM</h3>';
  } else {
    echo '<h3 class="mb-5 font-weight-bold">KHÔNG CÓ SẢN PHẨM</h3>';
  }
  ?>
  <div class="col" id="message"></div>

  <?php
  if ($ac == 1) {
    echo '<form  method="post" enctype="multipart/form-data" id="myform">';
  } elseif ($ac == 2) {
    echo '<form  method="post" enctype="multipart/form-data" id="myform">';
  } else {
    echo 'rong';
  }
  ?>
  <?php
  $hh = new HangHoa();
  if (isset($_GET['id'])) {
    $mahh = $_GET['id'];
    $result = $hh->getHangHoaId($mahh);
    $tenhh = $result['tenhh'];
    $dongia = $result['dongia'];
    $giamgia = $result['giamgia'];
    $hinhdetail = $result['hinhdetail'];
    $hinhthumbnail = $result['hinhthumbnail'];
    $nhom = $result['Nhom'];
    $maloai = $result['maloai'];
    $dacbiet = $result['dacbiet'];
    $solx = $result['soluotxem'];
    $ngaylap = $result['ngaylap'];
    $mota = $result['mota'];
    $solt = $result['soluongton'];
    $mausac = $result['mausac'];
    $size = $result['size'];
  }
  ?>



  <div class="row ">
    <div class="col">
      <!-- Name input -->
      <div class="form-outline ">
        <label for="">Tên hàng hóa</label>
        <input type="text" id="tenhh" class="form-control" name="tenhh" placeholder="Tên hàng hóa" value="<?php if (isset($tenhh)) echo $tenhh; ?>" />
        <span class="error" style="color: red;" for="form8Example1" id="tenhh_err"></span>
      </div>
    </div>
    <div class="col">
      <!-- Email input -->
      <div class="form-outline">
      <label for="">Đơn giá</label>

        <input type="text" id="dongia" name="dongia" class="form-control" placeholder="Nhập đơn giá" value="<?php if (isset($dongia)) echo $dongia; ?>" />
        <span class="form-label" style="color: red;" id="dongia_err" for="form8Example2"></span>
      </div>
    </div>
    <div class="col">
      <!-- Email input -->
      <div class="form-outline">
      <label for="">Giảm giá</label>

        <input type="text" id="giamgia" name="giamgia" class="form-control" placeholder="Nhập tiền giảm giá" value="<?php if (isset($giamgia)) echo $giamgia; ?>" />
        <span class="error" style="color: red;" id="giamgia_err"></span>
      </div>
    </div>
  </div>

  <hr />

  <div class="row">
    <div class="col">
      <!-- Name input -->
      <div class="form-outline">
        <label for="">Nhóm</label>
        <input type="text" name="nhom" id="nhom" class="form-control" placeholder="Nhập nhóm" value="<?php if (isset($nhom)) echo $nhom; ?>" />
        <sapn class="form-label" style="color: red;" for="form8Example3"></sapn>
      </div>
    </div>
    <div class="col">
      <!-- Name input -->
      <div class="form-outline">
        <label for="">Tên loại</label>
        <select name="maloai" id="maloai" class="form-control">
          <?php
          if (isset($_GET['id'])) {
            $results = $hh->getListMaLoaiSP();
            while ($set = $results->fetch()) {
              if ($set['maloai'] == $maloai) {
                echo '<option value="' . $set['maloai'] . '" selected>' . $set['tenloai'] . '</option>';
              }
            }
          } else {
            $results = $hh->getListMaLoaiSP();
            while ($set = $results->fetch()) {
              echo '<option value="' . $set['maloai'] . '">' . $set['tenloai'] . '</option>';
            }
          }
          ?>

        </select>
      </div>
    </div>
    <div class="col">
      <!-- Email input -->
      <div class="form-outline">
        <label for="">Đặc biệt</label>
        <input type="text" name="dacbiet" id="dacbiet" class="form-control" placeholder="Nhập đậc biệt" value="<?php if (isset($dacbiet)) echo $dacbiet; ?>" />
        <span class="form-label" for="form8Example5"></span>
      </div>
    </div>
  </div>
  <hr />
  <div class="row">
    <div class="col" style="display: none;">
      <!-- Name input -->
      <div class="form-outline ">
        <input type="text" id="mahh" class="form-control" name="mahh" placeholder="Tên hàng hóa" value="<?php if (isset($mahh)) echo $mahh; ?>" />
        <span class="error" for="form8Example1" id=""></span>
      </div>
    </div>
    <div class="col" style="display: none;">
      <!-- Name input -->
      <div class="form-outline ">
        <input type="text" id="soluotxem" class="form-control" name="soluotxem" placeholder="Số lượt xem" value="<?php if (isset($solx)) echo $solx; ?>" />
        <span class="error" for="form8Example1" id=""></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <!-- Name input -->
      <div class="form-outline">
        <label for="">Ngày</label>
        <input type="date" id="ngaylap" name="ngaylap" class="form-control" placeholder="Chọn ngày tạo" value="<?php if (isset($ngaylap)) echo $ngaylap; ?>" />
        <span class="form-label" for="form8Example3"></span>
      </div>
    </div>

    <div class="col">
      <!-- Email input -->
      <div class="form-outline">
        <label for="">Số lượng tồn</label>
        <input type="text" id="soluongton" class="form-control" placeholder="Nhập số lượng tồn" name="soluongton" value="<?php if (isset($solt)) echo $solt; ?>" />
        <span class="form-label" style="color: red;" for="form8Example5" id="soluongton_err"></span>
      </div>
    </div>

    <div class="col">
      <!-- Email input -->
      <div class="form-outline">
        <label for="">Size</label>
        <input type="text" id="size" name="size" data-role="tagsinput" class="form-control" placeholder="Nhập size" value="<?php if (isset($size)) echo $size; ?>" />
        <!-- <span class="form-label" id="size_err" style="color: red;" for="form8Example2"></span> -->
      </div>
    </div>
  </div>
  <hr>
  <div class="row">

    <div class="col">
      <!-- Email input -->
      <div class="form-outline">
        <label for="">Màu sắc</label>
        <input type="text" id="mausac" name="mausac" class="form-control" placeholder="Nhập màu sắc" value="<?php if (isset($mausac)) echo $mausac; ?>" />
        <span class="form-label" id="mausac_err" style="color: red;" for="form8Example2"></span>
      </div>
    </div>



    <div class="col">
      <!-- Name input -->
      <div class="form-outline">
        <label><img width="50px" height="50px" id="blah" src="../Content/imagegiay/<?php if (isset($_GET['id'])) echo $hinhthumbnail; ?>"></label>
        Chọn file thumbnail:
        <!-- <input type="file" name=" []" id="files" class="form-control" multiple required onchange="readURL(this);"> -->
        <input type="file" name="image" id="fileupload" class="form-control" required onchange="readURL(this);">
        <input name="hinhthumbnailexit" type="hidden" id="hinhthumbnailexit" value="<?php echo $hinhthumbnail ?>">
        <!-- <input type="hidden" name="" > -->

        <!-- <input type="file" id='files' name="files[]" multiple><br> -->
        <!-- <input type="button" id="submitimg" value='Upload'> -->
        <!-- <div id='preview'></div> -->
      </div>
    </div>

    <div class="col">
      <!-- Name input -->
      <div class="form-outline">
        <label <?php if (!isset($_GET['id'])) echo 'style="display:none;"'; ?>>
          <?php
          $arrconvertImg = explode(";", $hinhdetail);
          foreach ($arrconvertImg as $key => $value) :
          ?>
            <img width="50px" height="50px" id="imagedetail" src="../Content/imagegiay/<?php if (isset($_GET['id'])) echo $value; ?>">
          <?php
          endforeach;
          ?>
        </label><br>
        Chọn file để load mô tả:
        <input type="file" name="files[]" id="files" class="form-control" multiple required onchange="readArr(this);">
        <!-- <input type="file" name="image" id="fileupload" class="form-control"  required onchange="readURL(this);"> -->

        <!-- <input type="file" id='files' name="files[]" multiple><br> -->
        <input type="button" id="submitimg" value='Upload'>

        <input type="hidden" name="hinhdetailexit" id="hinhdetailexit" value="<?php echo $hinhdetail ?>">
        <div id='preview'></div>
      </div>
    </div>



    <?php
    if (isset($_GET['id'])) :
    ?>
      <div class="col" style="display: none;">
        <div class="form-line">
          <input type="text" id="mahh" class="form-control" name="mahh" placeholder="id" value="<?php if (isset($mahh)) echo $mahh; ?>" />
          <span class="form-label" for="form8Example1">id user</span>
        </div>
      </div>

    <?php
    endif
    ?> -->


  </div>

  <hr />

  <div class="row">
    <div class="col">
      <!-- Name input -->
      <div class="form-outline">
      <label for="">Mô tả</label>
        <!-- <input type="text" id="mota" name="mota" class="form-control" placeholder="Nhập mô tả sản phẩm" value="" /> -->
        <textarea name="motasanpham" id="motasanpham" cols="30" rows="10"><?php if (isset($mota)) echo $mota; ?></textarea>
        <div class="form-label" style="color: red;" for="form8Example4" id="mota_err"></div>
      </div>
    </div>
  </div>

  <div class="form-group mt-4 mb-2">
    <button name="submit" <?php
                          if ($ac == 1) {
                            echo 'id="submit"';
                          } elseif ($ac == 2) {
                            echo 'id="submitUP"';
                          }
                          ?> type="button" class="btn btn-danger">Submit</button>
  </div>
  </form>
</div>
<script>
  $(document).ready(function() {
    $('#tenhh').on('input', function() {
      checktenhh();
    });
    $('#dongia').on('input', function() {
      checkdongia();
    });

    $('#giamgia').on('input', function() {
      checkgiamgia();
    });

    $('#soluongton').on('input', function() {
      checksoluongton();
    });
    $('#mausac').on('input', function() {
      checkmausac();
    });
    // $('#size').on('input', function() {
    //   checksize();
    // });
    // ===========================================

    $('#submit').click(function() {
      if (!checktenhh() && !checkdongia() && !checksoluongton() && !checkmausac()) {
        console.log("er1");
        $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form đi </div>`);
      } else if (!checktenhh() || !checkdongia() || !checksoluongton() || !checkmausac()) {
        $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form</div>`);
        console.log("er");
      } else {
        console.log("ok");
        $("#message").html("");
        var arrImg = [];
        var totalfiles = document.getElementById('files').files.length;

        for (let i = 0; i < totalfiles; i++) {
          const element = files.files[i].name;
          arrImg.push(files.files[i].name)
        }
        if (arrImg.lenth != 0) {
          var strNameImg = arrImg.join(';');
          $('#hinhdetailexit').val(strNameImg);

        }
        // var form = $('#myform')[0];

        var data = new FormData();
        // var mota = tinymce.get("motasanpham").getContent();
        var tenhh = $('#tenhh').val();
        var dongia = $('#dongia').val();
        var giamgia = $('#giamgia').val();
        var nhom = $('#nhom').val();
        var maloai = $('#maloai').val();
        var dacbiet = $('#dacbiet').val();
        var mahh = $('#mahh').val();
        var soluotxem = $('#soluotxem').val();
        var ngaylap = $('#ngaylap').val();
        var size = $('#size').val();
        var soluongton = $('#soluongton').val();
        var mausac = $('#mausac').val();
        var hinhthumbnail = $('#fileupload')[0].files[0];
        var hinhdetail = $('#hinhdetailexit').val();
        var mota = tinyMCE.get('motasanpham').getContent();
        data.append('tenhh', tenhh);
        data.append('dongia', dongia);
        data.append('giamgia', giamgia);
        data.append('nhom', nhom);
        data.append('maloai', maloai);
        data.append('dacbiet', dacbiet);
        data.append('mahh', mahh);
        data.append('soluotxem', soluotxem);
        data.append('ngaylap', ngaylap);
        data.append('size', size);
        data.append('soluongton', soluongton);
        data.append('mausac', mausac);
        data.append('hinhthumbnail', hinhthumbnail);
        data.append('hinhdetail', hinhdetail);
        data.append('motasanpham', mota);
        console.log(data);
        $.ajax({
          type: "POST",
          url: "index.php?action=sanpham&act=insert_action",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          beforeSend: function() {
            $('#submit').html('<i class="fa-solid fa-spinner fa-spin"></i>');
            $('#submit').attr("disabled", true);
            $('#submit').css({
              "border-radius": "50%"
            });
          },

          success: function(data) {
            $('#message').html(data);
          },
          complete: function() {
            setTimeout(function() {
              $('#myform').trigger("reset");
              $('#submit').html('Submit');
              $('#submit').attr("disabled", false);
              $('#submit').css({
                "border-radius": "4px"
              });
            }, 200);
          }
        });
      }
    });
    $('#submitUP').click(function() {
      if (!checktenhh() && !checkdongia() && !checksoluongton() && !checkmausac()) {
        console.log("er1");
        $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form đi </div>`);
      } else if (!checktenhh() || !checkdongia() || !checksoluongton() || !checkmausac()) {
        $("#message").html(`<div class="alert alert-warning">Nhập hoàn chỉnh form</div>`);
        console.log("er");
      } else {
        console.log("ok");
        $("#message").html("");
        var form = $('#myform')[0];
        var data = new FormData();
        var tenhh = $('#tenhh').val();
        var dongia = $('#dongia').val();
        var giamgia = $('#giamgia').val();
        var nhom = $('#nhom').val();
        var maloai = $('#maloai').val();
        var dacbiet = $('#dacbiet').val();
        var mahh = $('#mahh').val();
        var soluotxem = $('#soluotxem').val();
        var ngaylap = $('#ngaylap').val();
        var size = $('#size').val();
        var soluongton = $('#soluongton').val();
        var mausac = $('#mausac').val();
        var hinhthumbnail = $('#hinhthumbnailexit').val();
        var hinhdetail = $('#hinhdetailexit').val();
        var mota = tinyMCE.get('motasanpham').getContent();
        data.append('tenhh', tenhh);
        data.append('dongia', dongia);
        data.append('giamgia', giamgia);
        data.append('nhom', nhom);
        data.append('maloai', maloai);
        data.append('dacbiet', dacbiet);
        data.append('mahh', mahh);
        data.append('soluotxem', soluotxem);
        data.append('ngaylap', ngaylap);
        data.append('size', size);
        data.append('soluongton', soluongton);
        data.append('mausac', mausac);
        data.append('hinhthumbnailexit', hinhthumbnail);
        data.append('hinhdetail', hinhdetail);
        data.append('motasanpham', mota);
        // console.log(form);
        $.ajax({
          type: "POST",
          url: "index.php?action=sanpham&act=update_action",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          beforeSend: function() {
            $('#submitUP').html('<i class="fa-solid fa-spinner fa-spin"></i>');
            $('#submitUP').attr("disabled", true);
            $('#submitUP').css({
              "border-radius": "50%"
            });
          },

          success: function(data) {
            $('#message').html(data);
          },
          complete: function() {
            setTimeout(function() {
              $('#myform').trigger("reset");
              $('#submitUP').html('submit');
              $('#subsubmitUPmit').attr("disabled", false);
              $('#submitUP').css({
                "border-radius": "4px"
              });
            }, 200);
          }
        });
      }
    });
    $('#fileupload').on('change', function(e) {
      var form_data = new FormData();
      var file_data = $(this).prop('files')[0];
      var filename = e.target.files[0].name;
      var ext = $(this).val().split('.').pop().toLowerCase();
      var thumbnail = $('#hinhthumbnailexit');
      thumbnail.val(filename);

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
        url: './View/ajax/uploadimage_ajax.php?dr=../../../Content/imagegiay/',
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

      console.log(ext);
    })

    // $('#files').on('change', function(e) {
    //   var filename = e.target.files[0].name;
    //   var thumbnail = $('#hinhdetailexit');
    //   thumbnail.val(filename);
    // })
    // =================================================







    function checktenhh() {
      var pattern = /^[A-Za-z0-9]+$/;
      var name = $('#tenhh').val();
      var validname = pattern.test(name);
      if (name == "") {
        $('#tenhh_err').html('Tên hàng hóa không được bỏ trống');
        console.log(name)
        return false;
      } else if (name.length < 2) {
        $('#tenhh_err').html('Tên hàng hóa quá ngắn');
        return false;
      } else {
        $('#tenhh_err').html('');
        return true;
      }
    }

    function checkdongia() {
      if (!$.isNumeric($("#dongia").val())) {
        $("#dongia_err").html("Chỉ được nhập số");
        return false;
      } else if ($("#mobile").val() == "") {
        $("#dongia_err").html("Không được để trống");
        return false;
      } else {
        $("#dongia_err").html("");
        return true;
      }
    }

    function checkgiamgia() {
      if (!$.isNumeric($("#giamgia").val())) {
        $("#giamgia_err").html("Chỉ được nhập số");
        return false;
      } else {
        $("#giamgia_err").html("");
        return true;
      }
    }



    function checksoluongton() {
      if ($("#soluongton").val() == "") {
        $("#soluongton_err").html("Không được để trống");
        return false;
      } else if (!$.isNumeric($("#soluongton").val())) {
        $("#soluongton_err").html("Chỉ được nhập số");
        return false;
      } else {
        $("#soluongton_err").html("");
        return true;
      }
    }

    function checkmausac() {
      var mausac = $('#mausac').val();
      if (mausac == "") {
        $('#mausac_err').html('Bắt buộc nhập');
        return false;
      } else if (mausac.length < 4) {
        $('#mausac_err').html('không được nhập dưới 4 ký tự');
        return false;
      } else {
        $('#mausac_err').html('');
        return true;
      }
    }

    function checksize() {
      if ($("#size").val() == "") {
        $("#size_err").html("Không được để trống");
        return false;
      } else if ($("#size").val().length > 2) {
        $('#size_err').html('Size không đươc nhập hơn đơn vị 100');
        return false;
      } else if (!$.isNumeric($("#size").val())) {
        $("#size_err").html("Chỉ được nhập số");
        return false;
      } else {
        $("#size_err").html("");
        return true;
      }
    }
    // ============================================================
  })
</script>