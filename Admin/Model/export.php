<?php

require '../../PHPExcel-1.8/Classes/PHPExcel.php';

// Fetch records from database 

            
        $objExcel = new PHPExcel;
        $objExcel->setActiveSheetIndex(0);
        $sheet=$objExcel->getActiveSheet()->setTitle('Khách hàng');

        $rowcount = 1;
        $sheet->setCellValue('A'.$rowcount,'Mã khách hàng');
        $sheet->setCellValue('B'.$rowcount,'Tên khách hàng');
        $sheet->setCellValue('C'.$rowcount,'Username');
        $sheet->setCellValue('D'.$rowcount,'Mật khẩu');
        $sheet->setCellValue('E'.$rowcount,'Email');
        $sheet->setCellValue('F'.$rowcount,'Địa chỉ');
        $sheet->setCellValue('G'.$rowcount,'Số điện thoại');
        $sheet->setCellValue('H'.$rowcount,'Vai trò');


        $dsn='mysql:host=localhost;dbname=giay';
        $user='root';
        $pass='';
        $db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));

        $select="select * from khachhang";
        $res=$db->query($select);
        while($r=$res->fetch()){
            $result[]=$r;
        }
       
        if(count($result)>1){
            $i=2;
            foreach ($result as $key => $row) {
                $sheet->setCellValue('A'.$i,$row['makh']);
                $sheet->setCellValue('B'.$i,$row['tenkh']);
                $sheet->setCellValue('C'.$i,$row['username']);
                $sheet->setCellValue('D'.$i,$row['matkhau']);
                $sheet->setCellValue('E'.$i,$row['email']);
                $sheet->setCellValue('F'.$i,$row['diachi']);
                $sheet->setCellValue('G'.$i,$row['sodienthoai']);
                $sheet->setCellValue('H'.$i,$row['vaitro']);
                $i++;
            }
            $objwriter = new PHPExcel_Writer_Excel2007($objExcel);
            $filename='export.xlsx';
            $objwriter->save($filename);
            header('Content-Disposition:attachment;filename="'.$filename.'"');
            header('Content-Type:application/vnd.openxmlformatsofflicedocument.spreadsheettml.sheet');
            header('Content-Length:'.filesize($filename));
            header('Content-Transfer-Encoding:binary');
            header('Cach-Control:must-ravalidate');
            header('Pragma:no-cache');
            readfile($filename);
        }else{
            echo 'loi roi';
        }

        

        // if (isset($_POST["btnExport"])) {
        //     $filename = "Export_excel.xls";
        //     header("Content-Type: application/vnd.ms-excel");
        //     header("Content-Disposition: attachment; filename=\"$filename\"");
        //     $isPrintHeader = false;
        //     if (!empty($result)) {
        //         foreach ($result as $row) {
        //             if (!$isPrintHeader) {
        //                 echo implode("\t", array_keys($row)) . "\n";
        //                 $isPrintHeader = true;
        //             }
        //             echo implode("\t", array_values($row)) . "\n";
        //         }
        //     }
        //     exit();
        // }


?>