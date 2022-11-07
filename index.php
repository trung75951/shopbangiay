<?php
session_start();
ob_start();
include 'Model/cart.php';
// include 'Model/uploadhinh.php';
// $mail = new Mailler();
// include "mail/sendmail.php";
set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');

spl_autoload_register();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Demo WebBanGiay</title>
  <script src="./Content/js/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="./Content/fontawesome-free-5.15.3-web/css/all.min.css"> -->
  <link rel="stylesheet" href="./Content/css/pro.min.css">
  <link rel="stylesheet" href="./Content/css/bootstrap/dist/css/bootstrap.css">
  <script src="./Content/js/popper.min.js"></script>
  <script src="./Content/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="./Content/css/style.css">
  <script src="./Content/js/script.js"></script>

  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.0/css/pro.min.css" />
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

  <!-- <link rel="stylesheet" href="Content/css//style.css"> -->
  <script src="./node_modules/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="./Content/css/fontawesome.js"></script>

</head>

</html>

<body>
  <div id="maintest-nav-oragne">
    <?php 
      include "View/dautrang.php";
    ?>

    <?php
      include "VIew/banner.php";
    ?>

    <div class="container-fluid">
      <div class="row">
        <?php
        $ctrl = "home";
        if (isset($_GET['action'])) {
          $ctrl = $_GET['action'];
        }
        include 'Controller/' . $ctrl . '.php';
        ?>

      </div>
    </div>
    <?php
    include "View/footer.php";
    ?>
  </div>
  <!-- <script src="https://cdn.tiny.cloud/1/5to837jgaayhbjkam58rzcyye5p6nut0nzdktthsp7bpuj5q/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
  <script>
    $(document).ready(function() {
      tinymce.init({
        selector: '#noidungbaiviet',
        height: 200,
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
          },
          {
            value: 'Email',
            title: 'Email'
          },
        ]
      });
      // tinymce.init({
      //   selector: '#noidungbaiviet',
      //   plugins: [
      //     'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
      //     'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
      //     'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
      //   ],
      //   toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'

      // });




    })
  </script>
  <!-- <script type="text/javascript">
    var filterValue = document.querySelectorAll('input[name="filter"]');

    function filterTypes() {

    }
    $(document).ready(function() {
      $('#locsanpham').on('click', function() {
        var tmpArray = [];
        // filterValue.forEach((item) => {
        //   if (item.checked) {
        //     tmpArray.push(item.value);
        //     console.log('1');
        //   }
        // })
        for (let i = 0;  i< filterValue.length; i++) {
          if(filterValue[i].checked){
            tmpArray.push(filterValue[i].value);
            console.log(i);
          }
        }
        document.querySelector('input[name="tmpArray"]').value = tmpArray;
        var form = document.querySelector('#categoryForm');
        var data = new FormData(form)
        $.ajax({
          url: 'index.php?action=home&act=tmp',
          type: "POST",
          crossDomain: true,
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          async: false,

          success: function(data) {
            $('#data').html(data);
          }

        })


      })

    })
  </script> -->
  <!-- <script>
    $(window).on('load',function(){
      $('#banner').modal('show');
    })
  </script> -->
</body>


</html>