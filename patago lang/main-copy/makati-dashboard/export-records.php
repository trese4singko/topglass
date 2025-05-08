<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Include your database connection
include("connection.php");

// Query to fetch the necessary data
$query = "
    SELECT 
        o.id AS order_id,
        c.name AS customer_name,
        c.contact AS customer_contact,
        c.address AS customer_address,
        o.order_date,
        GROUP_CONCAT(i.product_name SEPARATOR ', ') AS product_names,
        GROUP_CONCAT(i.size SEPARATOR ', ') AS product_sizes,
        GROUP_CONCAT(i.quantity SEPARATOR ', ') AS product_quantities,
        GROUP_CONCAT(i.price SEPARATOR ', ') AS product_prices,
        GROUP_CONCAT(i.total_price SEPARATOR ', ') AS total_prices
    FROM makati_orders o
    JOIN makati_customers c ON o.customer_id = c.id
    JOIN makati_order_items i ON o.id = i.order_id
    GROUP BY o.id
    ORDER BY o.order_date DESC
";

// Fetch data from the database
$result = mysqli_query($con, $query);

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set the header row
$sheet->setCellValue('A1', 'Order ID');
$sheet->setCellValue('B1', 'Customer Name');
$sheet->setCellValue('C1', 'Customer Contact');
$sheet->setCellValue('D1', 'Customer Address');
$sheet->setCellValue('E1', 'Order Date');
$sheet->setCellValue('F1', 'Product Names');
$sheet->setCellValue('G1', 'Product Sizes');
$sheet->setCellValue('H1', 'Product Quantities');
$sheet->setCellValue('I1', 'Product Prices');
$sheet->setCellValue('J1', 'Total Prices');

// Add data to the spreadsheet
$row = 2; // Start from the second row
while ($data = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $row, $data['order_id']);
    $sheet->setCellValue('B' . $row, $data['customer_name']);
    $sheet->setCellValue('C' . $row, $data['customer_contact']);
    $sheet->setCellValue('D' . $row, $data['customer_address']);
    $sheet->setCellValue('E' . $row, $data['order_date']);
    $sheet->setCellValue('F' . $row, $data['product_names']);
    $sheet->setCellValue('G' . $row, $data['product_sizes']);
    $sheet->setCellValue('H' . $row, $data['product_quantities']);
    $sheet->setCellValue('I' . $row, $data['product_prices']);
    $sheet->setCellValue('J' . $row, $data['total_prices']);
    $row++;
}

// Create a writer and save the file
$writer = new Xlsx($spreadsheet);
$filename = 'pampanga_records.xlsx';

// Set headers for Excel file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Save the file to output
$writer->save('php://output');
exit();
?>
