<?php
$action = 'importfile';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case 'importfile':
        if (!isset($_SESSION['useradmin'])) {
            echo '<script> alert("Bạn chưa đăng nhập");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login_admin"/>';
        }
        include 'View/importFile.php';
        break;

    case 'importfile_sanpham':
        // if (isset($_POST['submit'])) {
        //     $file = $_FILES["file"]["tmp_name"];
        //     file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
        //     $file_open = fopen($file, "r");
        //     $hh = new HangHoa();
        //     while (($csv = fgetcsv($file_open, 1000, ',')) !== false) {
        //         $tenhh = $csv[0];
        //         $dongia = $csv[1];
        //         $giamgia = $csv[2];
        //         $hinh = $csv[3];
        //         $Nhom = $csv[4];
        //         $maloai = $csv[5];
        //         $dacbiet = $csv[6];
        //         $soluotxem = $csv[7];
        //         $ngaylap = $csv[8];
        //         $mota = $csv[9];
        //         $soluongton = $csv[10];
        //         $mausac = $csv[11];
        //         $size = $csv[12];


        //         $hh->insertsp($tenhh, $dongia, $giamgia, $hinh, $Nhom, $maloai, $dacbiet, $soluotxem, $ngaylap, $mota, $soluongton, $mausac, $size);
        //     }
        // }
        include "Model/importsp.php";
        echo "<script>alert('Import thành công')</script>";
        include 'View/hanghoa.php';
        break;

        // echo "<script>alert('Import thành công')</script>";
        // include 'View/hanghoa.php';
        // break;

    case "importfile_khachhang";
        // if (isset($_POST['submit'])) {
        //     $file = $_FILES["file"]["tmp_name"];
        //     file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
        //     $file_open = fopen($file, "r");
        //     $kh = new KhachHang();
        //     while (($csv = fgetcsv($file_open, 1000, ',')) !== false) {
        //         $tenkh = $csv[0];
        //         $username = $csv[1];
        //         $matkhau = $csv[2];
        //         $email = $csv[3];
        //         $diachi = $csv[4];
        //         $sodienthoai = $csv[5];
        //         $vaitro = $csv[6];
        //         $kh->insertKhachHang($tenkh,$username,$matkhau,$email,$diachi,$sodienthoai,$vaitro);
        //     }
        // }

        // if (isset($_POST['submit'])) {
        //     $file = $_FILES['file']['tmp_name'];
        //     echo $file;
        // }
        include "Model/importkh.php";
        echo "<script>alert('Import thành công')</script>";
        include 'View/khachhang.php';
        break;

    case 'export_filesanpham':
        include 'Model/export.php';
        echo '<meta http-equiv="content-type" content="0,url=.index.php?action=khachhang"/>';
        break;

    case 'export_fileKH':
        include 'Model/export.php';
        echo '<meta http-equiv="content-type" content="0,url=.index.php?action=khachhang"/>';
        break;
    case 'export_fileSP';
        include 'Model/exportSP.php';
        echo '<meta http-equiv="content-type" content="0,url=.index.php?action=sanpham"/>';
        break;
}
