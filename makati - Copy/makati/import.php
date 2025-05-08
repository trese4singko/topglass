<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet (assuming you have a vendor folder)

if (isset($_FILES['import_file']['tmp_name'])) {
    $inputFileName = $_FILES['import_file']['tmp_name'];

    try {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        // Skip header row
        array_shift($data);

        include("connection.php");

        $insertCount = 0;

        foreach ($data as $row) {
            // Assuming columns: Name, Size, Price, Quantity, Category, Status
            $name = mysqli_real_escape_string($con, $row[0]);
            $size = mysqli_real_escape_string($con, $row[1]);
            $price = mysqli_real_escape_string($con, $row[2]);
            $quantity = mysqli_real_escape_string($con, $row[3]);
            $category = mysqli_real_escape_string($con, $row[4]);
            $status = mysqli_real_escape_string($con, $row[5]);

            // Check if the product already exists
            $checkQuery = mysqli_query($con, "SELECT * FROM mkt_add_prod_data WHERE name='$name' AND size='$size' AND price='$price' AND category='$category'");
            
            if (mysqli_num_rows($checkQuery) > 0) {
                // Product exists, update the quantity
                $existingProduct = mysqli_fetch_assoc($checkQuery);
                $newQuantity = $existingProduct['quantity_on_hand'] + $quantity;

                $updateQuery = mysqli_query($con, "UPDATE mkt_add_prod_data SET quantity_on_hand='$newQuantity', status='$status' WHERE product_id='{$existingProduct['product_id']}'");
                
                if ($updateQuery) {
                    $insertCount++;
                }
            } else {
                // Insert new product
                $query = "INSERT INTO mkt_add_prod_data (name, size, price, quantity_on_hand, category, status)
                          VALUES ('$name', '$size', '$price', '$quantity', '$category', '$status')";
                if (mysqli_query($con, $query)) {
                    $insertCount++;
                }
            }
        }

        echo "$insertCount records have been successfully imported.";

    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>