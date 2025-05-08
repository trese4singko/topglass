<?php
require 'vendor/autoload.php'; // Autoload Composer dependencies
include("connection.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set column headers
$sheet->setCellValue('A1', 'UserID');
$sheet->setCellValue('B1', 'Username');
$sheet->setCellValue('C1', 'Password');
$sheet->setCellValue('D1', 'UserType');
$sheet->setCellValue('E1', 'FullName');
$sheet->setCellValue('F1', 'Email');
$sheet->setCellValue('G1', 'Phone');
$sheet->setCellValue('H1', 'Address');

$query = mysqli_query($con, "SELECT * FROM usertb");
$rowNum = 2;

while ($row = mysqli_fetch_assoc($query)) {
    $sheet->setCellValue("A{$rowNum}", $row['userid']);
    $sheet->setCellValue("B{$rowNum}", $row['username']);
    $sheet->setCellValue("C{$rowNum}", $row['p1']);
    $sheet->setCellValue("D{$rowNum}", $row['usertype']);
    $sheet->setCellValue("E{$rowNum}", $row['fullname']);
    $sheet->setCellValue("F{$rowNum}", $row['email']);
    $sheet->setCellValue("G{$rowNum}", $row['phone']);
    $sheet->setCellValue("H{$rowNum}", $row['address']);
    $rowNum++;
}

// Send the file to the browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="users_data.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
