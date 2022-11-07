<?php
// require './PHPExcel-1.8/Classes/PHPExcel.php';
require 'PHPExcel-1.8/Classes/PHPExcel.php';
// require 'PHPExcel-1.8/Documentation/Examples/Reader/exampleReader07.php';
include 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';






$db = new connect();

if (isset($_POST['submit'])) {
    //  Include thư viện PHPExcel_IOFactory vào
     
    $inputFileName = $_FILES['file']['tmp_name'];
     
    //  Tiến hành đọc file excel
    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Lỗi không thể đọc file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }
     
    //  Lấy thông tin cơ bản của file excel
     
    // Lấy sheet hiện tại
    $sheet = $objPHPExcel->getSheet(0);
    $sheetData=$objPHPExcel->getActiveSheet()->toArray('null',true,true,true);
    // Lấy tổng số dòng của file, trong trường hợp này là 6 dòng
    $highestRow = $sheet->getHighestRow();
    // Lấy tổng số cột của file, trong trường hợp này là 4 dòng
    $highestColumn = $sheet->getHighestColumn();
     
    // Khai báo mảng $rowData chứa dữ liệu
     
    //  Thực hiện việc lặp qua từng dòng của file, để lấy thông tin
    for ($row = 2; $row <= $highestRow; $row++){
        $makh=1;
        $tenkh=$sheetData[$row]['B'];
        $username=$sheetData[$row]['C'];
        $matkhau=$sheetData[$row]['D'];
        $email=$sheetData[$row]['E'];
        $diachi=$sheetData[$row]['F'];
        $sodienthoai=$sheetData[$row]['G'];
        $vaitro=$sheetData[$row]['H'];
        $kh=new KhachHang();
        $kh->insertKhachHang($tenkh,$username,$matkhau,$email,$diachi,$sodienthoai,$vaitro);
        
    }
    
    //In dữ liệu của mảng
    echo "<pre>";
    print_r($sheetData);
    echo "</pre>";
    
    

}

