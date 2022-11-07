<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Demo WebBanGiay</title>
  <!-- <link rel="stylesheet" href="./Content/fontawesome-free-5.15.3-web/css/all.min.css"> -->
  <link rel="stylesheet" href="./Content/css/pro.min.css">
  <link rel="stylesheet" href="./Content/css/bootstrap/dist/css/bootstrap.css">
  

  <link rel="stylesheet" href="./Content/css/style.css">

  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.0/css/pro.min.css" />
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

  <!-- <link rel="stylesheet" href="Content/css//style.css"> -->

</head>

</html>

<body>
  <h1>Xin chòa</h1>
  <div id="maintest-nav-oragne">
    <?php
        include "./View/cart.php";
    ?>

  </div>

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
  <script src="./Content/js/jquery.min.js"></script>
  <script src="./Content/js/popper.min.js"></script>
  <script src="./Content/js/bootstrap.min.js"></script>
  <script src="./Content/js/script.js"></script>
  <script src="./node_modules/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="./Content/css/fontawesome.js"></script>

</body>


</html>