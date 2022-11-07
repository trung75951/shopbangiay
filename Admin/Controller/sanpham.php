<?php
$action = 'sanpham';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}

switch ($action) {
    case 'sanpham':
        if (!isset($_SESSION['useradmin'])) {
            echo '<script> alert("Bạn chưa đăng nhập");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login_admin"/>';
            break;
        } else {
            include "View/hanghoa.php";
            break;
        }

    case 'insertsp':
        include 'View/edithanghoa.php';
        break;
    case 'insert_action':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # code...
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $hinhthumnail = $_FILES['hinhthumbnail']['name'];
            $hinh = $_POST['hinhdetail'];
            $Nhom = $_POST['nhom'];
            $maloai = $_POST['maloai'];
            $dacbiet = $_POST['dacbiet'];
            $soluotxem = $_POST['soluotxem'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['motasanpham'];
            $soluongton = $_POST['soluongton'];
            $mausac = $_POST['mausac'];
            $size = $_POST['size'];

            // $arrimage=[];
            // $convertImg = implode(";", $hinh);
            // echo $mota;
            // exit();

            $hh = new HangHoa();
            $hh->insertsp($tenhh, $dongia, $giamgia, $hinhthumnail, $hinh, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size);

            if (isset($hh)) {
                # code...
                uploadImage();
                echo "<script>alert('Thêm sản phảm thành công')</script>";
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham"/>';

        break;

    case 'update':
        include "View/edithanghoa.php";
        break;

    case 'update_action':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            // $hinhthumnail = $_FILES['image']['name'];
            // $hinhdetail = $_FILES['files']['name'];
            $hinhthumbnailexit = $_POST['hinhthumbnailexit'];
            $hinhdetailexit = $_POST['hinhdetail'];
            $Nhom = $_POST['nhom'];
            $maloai = $_POST['maloai'];
            $dacbiet = $_POST['dacbiet'];
            $soluotxem = $_POST['soluotxem'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['motasanpham'];
            $soluongton = $_POST['soluongton'];
            $mausac = $_POST['mausac'];
            $size = $_POST['size'];
            // echo var_dump($hinhdetailexit);
            // echo $mota;
            // exit();
            // $pass = htmlspecialchars(trim($_POST['password']));
            // $ConvertImg = implode(";", $hinhdetail)/;

            // if ($_FILES['image']['name'] != "") {
            //     $hinh = $_FILES['image']['name'];
            // } else {
            //     $hinh = $_POST['hinhthumbnailexit'];
            // }

            // if ($_FILES['files']['name'][0] != "") {
            //     $hinhdetail = implode(";", $_FILES['files']['name']);
            // } else {
            //     $hinhdetail = $_POST['hinhdetailexit'];
            // }

            $hh = new HangHoa();
            $result = $hh->updateSanpham($mahh, $tenhh, $dongia, $giamgia, $hinhthumbnailexit, $hinhdetailexit, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size);
            

            // $mota = $_POST['mahh'];
            // echo  $hinhthumbnailexit;
            // echo  $hinhdetailexit;
            // exit();
            echo "<script>alert('Update sản phẩm thành công')</script>";

            // if ($hinhthumnail == "") {
            //     if ($hinhdetail[0] == "") {
            //         $result = $hh->updateSanpham($mahh, $tenhh, $dongia, $giamgia, $hinhdetailexit, $hinhthumbnailexit, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size);
            //         // uploadImage();
            //         echo "<script>alert('Update sản phẩm thành công')</script>";
            //     } elseif ($hinhdetail[0] != "") {
            //         $result = $hh->updateSanpham($mahh, $tenhh, $dongia, $giamgia, $ConvertImg, $hinhthumnail, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size);
            //         echo "<script>alert('Update sản phẩm thành công')</script>";
            //     }
            // }
            // else{
            //     if($hinhdetail == []){
            //         $result = $hh->updateSanpham($mahh, $tenhh, $dongia, $giamgia, $hinhdetailexit, $hinhthumbnailexit, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size);
            //     // uploadImage();

            //     }
            //     else{
            //         $result = $hh->updateSanpham($mahh, $tenhh, $dongia, $giamgia, $ConvertImg, $hinhthumbnailexit, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size);
            //     }
            // }


            // $result = $hh->updateSanpham($mahh, $tenhh, $dongia, $giamgia, $hinh, $ConvertImg, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size);
            // if ($hinh == true) {
                // uploadImage();
            // }
        }
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham"/>';
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            # code...
            $mahh = $_GET['id'];
            $hh = new HangHoa();
            $hh->deleteMaHang($mahh);
            echo '<script>alert("Xóa sản phẩm thành công")</script>';
        }
        include "view/hanghoa.php";
        break;
}
