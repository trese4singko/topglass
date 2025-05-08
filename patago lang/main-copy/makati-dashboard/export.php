<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Include your database connection
include("connection.php");

// Fetch data from the database
$query = "SELECT name, size, price, quantity_on_hand, category, status FROM mkt_add_prod_data";
$result = mysqli_query($con, $query);

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set the header row
$sheet->setCellValue('A1', 'Product Name');
$sheet->setCellValue('B1', 'Product Size');
$sheet->setCellValue('C1', 'Product Price');
$sheet->setCellValue('D1', 'Product Quantity');
$sheet->setCellValue('E1', 'Product Category');
$sheet->setCellValue('F1', 'Product Status');

// Add data to the spreadsheet
$row = 2; // Start from the second row
while ($data = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $row, $data['name']);
    $sheet->setCellValue('B' . $row, $data['size']);
    $sheet->setCellValue('C' . $row, $data['price']);
    $sheet->setCellValue('D' . $row, $data['quantity_on_hand']);
    $sheet->setCellValue('E' . $row, $data['category']);
    $sheet->setCellValue('F' . $row, $data['status']);
    $row++;
}

// Create a writer and save the file
$writer = new Xlsx($spreadsheet);
$filename = 'makati_products.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Save the file to output
$writer->save('php://output');
exit();
?>