<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include("connection.php");

$query = "SELECT name, size, price, quantity_on_hand, category, status FROM producttabletaguig";
$result = mysqli_query($con, $query);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Product Name');
$sheet->setCellValue('B1', 'Product Size');
$sheet->setCellValue('C1', 'Product Price');
$sheet->setCellValue('D1', 'Product Quantity');
$sheet->setCellValue('E1', 'Product Category');
$sheet->setCellValue('F1', 'Product Status');


$row = 2; 
while ($data = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $row, $data['name']);
    $sheet->setCellValue('B' . $row, $data['size']);
    $sheet->setCellValue('C' . $row, $data['price']);
    $sheet->setCellValue('D' . $row, $data['quantity_on_hand']);
    $sheet->setCellValue('E' . $row, $data['category']);
    $sheet->setCellValue('F' . $row, $data['status']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'taguig_product.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit();
?>