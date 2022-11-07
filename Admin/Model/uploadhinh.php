<?php
function uploadImage()
{
  $target_dir = "../Content/imagegiay/";

  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


  $uploadimage = 1;
  if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check != false) {
      $uploadimage = 1;
    } else {
      echo "<script>alert('Hình này ko có')</script>";
      $uploadimage = 0;
    }
  }
  if ($_FILES["image"]["size"] > 5000000) {
    // echo "<script>alert('Hình vượt dung lượng')</script>";

    $uploadimage = 0;
  }
  if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
    // echo "<script>alert('Hình ko đúng định dạng')</script>";
    $uploadimage = 0;
  }
  if ($uploadimage == 0) {
    // echo "<script>alert('Lỗi quá trình upload')</script>";
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "Thành công";
    } else {
      echo "Thát bại";
    }
  }
}
function uploadImageprofile()
{
  $target_dir = "../Content/profile/";

  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


  $uploadimage = 1;
  if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check != false) {
      $uploadimage = 1;
    } else {
      echo "<script>alert('Hình này ko có')</script>";
      $uploadimage = 0;
    }
  }
  // if (file_exists($target_file)) {
  //   echo "<script>alert('File này đã tồn tài')</script>";
  //   $uploadimage = 0;
  // }
  if ($_FILES["image"]["size"] > 5000000) {
    echo "<script>alert('Hình vượt dung lượng')</script>";

    $uploadimage = 0;
  }
  if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
    echo "<script>alert('Hình ko đúng định dạng')</script>";
    $uploadimage = 0;
  }
  if ($uploadimage == 0) {
    echo "<script>alert('Lỗi quá trình upload')</script>";
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "Thành công";
    } else {
      echo "Thát bại";
    }
  }
}
function uploadImageBlog()
{
  $target_dir = "../Content/imagebaiviet/";

  $target_file = $target_dir . basename($_FILES["image"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  $uploadimage = 1;
  if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check != false) {
      $uploadimage = 1;
    } else {
      echo "<script>alert('Hình này ko có')</script>";
      $uploadimage = 0;
    }
  }
  if ($_FILES["image"]["size"] > 5000000) {
    echo "<script>alert('Hình vượt dung lượng')</script>";

    $uploadimage = 0;
  }
  if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
    echo "<script>alert('Hình ko đúng định dạng')</script>";
    $uploadimage = 0;
  }
  if ($uploadimage == 0) {
    echo "<script>alert('Lỗi quá trình upload')</script>";
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "Thành công";
    } else {
      echo "Thát bại";
    }
  }
}

function uploadimage_ajax($dir)
{
    $valid_extensions = array('jpeg', 'jpg', 'png');

    if (0 < $_FILES['image']['error']) {
        echo 'Error: ' . $_FILES['image']['error'] . '<br>';
    } else {

        $code = mt_rand(10, 100000);/* rename the file name*/
        // $target_dir = "../../../Content/imagegiay/";
        $target_dir = $dir;
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        // echo $target_file;
        // exit();

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        $size = $_FILES['image']['size'];
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if ($size > 2097152) /*2 mb 1024*1024 bytes*/ {
            echo json_encode(array("statusCode" => 400, 'msg' => "Image allowd less than 2 mb"));
        } else if (!in_array($ext, $valid_extensions)) {
            echo json_encode(array("statusCode" => 400, 'msg' => $ext . ' not allowed'));
        } else {

            $result = move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            echo json_encode(array("statusCode" => 200, 'code' => $target_file));
        }
    }
}