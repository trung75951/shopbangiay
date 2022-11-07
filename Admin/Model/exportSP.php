<?php
session_start();
// require '../../PHPExcel-1.8/Classes/PHPExcel.php';
require 'PHPExcel-1.8/Classes/PHPExcel.php';
// require 'PHPExcel-1.8/Classes/PHPExcel.php';

$objExcel = new PHPExcel();
$objExcel->getActiveSheet(0);
$sheet = $objExcel->getActiveSheet()->setTitle('sanpham');
$rowcount = 1;

$sheet->setCellValue('A' . $rowcount, "Mã hàng");
$sheet->setCellValue('B' . $rowcount, "Tên hàng");
$sheet->setCellValue('C' . $rowcount, "Đơn giá");
$sheet->setCellValue('D' . $rowcount, "Giảm giá");
$sheet->setCellValue('E' . $rowcount, "Hình thumbnail");
$sheet->setCellValue('F' . $rowcount, "Hình detail");
$sheet->setCellValue('G' . $rowcount, "Nhóm");
$sheet->setCellValue('H' . $rowcount, "Mã loại");
$sheet->setCellValue('I' . $rowcount, "Đặc biệt");
$sheet->setCellValue('J' . $rowcount, "Số lượt xem");
$sheet->setCellValue('K' . $rowcount, "Ngày lập");
$sheet->setCellValue('L' . $rowcount, "Mô tả");
$sheet->setCellValue('M' . $rowcount, "Số lượng tồn");
$sheet->setCellValue('N' . $rowcount, "Màu sắc");
$sheet->setCellValue('O' . $rowcount, "Size");

$dsn = 'mysql:host=localhost;dbname=giay';
$user = 'root';
$pass = '';
$db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//   echo '<script>alert("filter là :' . $_SESSION['maloai'] . '")</script>';
if (isset($_SESSION['maloai'])) {
    $maloai = $_SESSION['maloai'];
    // return $maloai;
    // echo '<script>alert("filter là :' . $_SESSION['maloai'] . '")</script>';
}
// $maloai = $_SESSION['maloai'];
    if (!isset($maloai)) {
        $select = "select * from hanghoa a inner join loai b on a.maloai=b.maloai";
       
    }
    else{
        $select = "select * from hanghoa a inner join loai b on a.maloai=b.maloai where a.maloai=$maloai";
    }

$res = $db->query($select);
while ($r = $res->fetch()) {
    $result[] = $r;
}

if (count($result) > 1) {
    $i = 2;
    foreach ($result as $key => $row) {
        $sheet->setCellValue('A' . $i, $row['mahh']);
        $sheet->setCellValue('B' . $i, $row['tenhh']);
        $sheet->setCellValue('C' . $i, $row['dongia']);
        $sheet->setCellValue('D' . $i, $row['giamgia']);
        $sheet->setCellValue('E' . $i, $row['hinhthumbnail']);
        $sheet->setCellValue('F' . $i, $row['hinhdetail']);
        $sheet->setCellValue('G' . $i, $row['Nhom']);
        $sheet->setCellValue('H' . $i, $row['maloai']);
        $sheet->setCellValue('I' . $i, $row['dacbiet']);
        $sheet->setCellValue('J' . $i, $row['soluotxem']);
        $sheet->setCellValue('K' . $i, $row['created_at']);
        $sheet->setCellValue('L' . $i, $row['mota']);
        $sheet->setCellValue('M' . $i, $row['soluongton']);
        $sheet->setCellValue('N' . $i, $row['mausac']);
        $sheet->setCellValue('O' . $i, $row['size']);
        $i++;
    }
    $objwriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = 'sanpham.xlsx';
    $objwriter->save($filename);
    header('Content-Disposition:attachment;filename="' . $filename . '"');
    header('Content-Type:application/vnd.openxmlformatsofflicedocument.spreadsheettml.sheet');
    header('Content-Length:' . filesize($filename));
    header('Content-Transfer-Encoding:binary');
    header('Cach-Control:must-ravalidate');
    header('Pragma:no-cache');
    readfile($filename);
    unset($_SESSION['maloai']);
} else {
    echo "Lỗi không export đc";
}
