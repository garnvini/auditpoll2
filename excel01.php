<?php

/** Include PHPExcel */
require_once './phpexcel/Classes/PHPExcel.php';

include './db/database.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Garnvini Rojwongwara")
        ->setLastModifiedBy("Garnvini Rojwongwara")
        ->setTitle("Customer")
        ->setSubject("Customer")
        ->setDescription("Excel File")
        ->setKeywords("office php")
        ->setCategory("Test result file");

//Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'หน่วยรับตรวจ')
            ->setCellValue('B1', 'กระบวนการ')
            ->setCellValue('C1', 'วันที่เข้าตรวจ')
            ->setCellValue('D1', 'วันที่สิ้นสุดการตรวจ');

//From mysql
$sql2 = "SELECT pwabranch.pwaBranchName, process.processName, "
        . "process.beginDate, process.finishDate FROM process , "
        . "pwabranch WHERE process.processStatusID = 2 "
        . "AND process.pwaBranchID = pwabranch.pwaBranchID";
$result = mysqli_query($link, $sql2);
$cell = 2;

while ($row = mysqli_fetch_assoc($result)){
    $objPHPExcel->getActiveSheet()
            ->setCellValue('A'.$cell, $row['pwaBranchName'])
            ->setCellValue('B'.$cell, $row['processName'])
            ->setCellValue('C'.$cell, $row['beginDate'])
            ->setCellValue('D'.$cell, $row['finishDate']);
    $cell++;
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Customer Export');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="customer.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save('./excel/product_type.xls');
$objWriter->save('php://output');
exit;