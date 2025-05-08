<?php
include('connection.php');

if (isset($_POST['products'])) {
    $products = json_decode($_POST['products'], true);

    foreach ($products as $product) {
        $name = $product['name'];
        $size = $product['size'];
        $price = $product['price'];
        $quantity_on_hand = $product['quantity_on_hand'];
        $category = $product['category'];
        $status = $product['status'];

        // Check if product exists
        $checkQuery = mysqli_query($con, "SELECT * FROM pmpng_add_prod_data WHERE name='$name' AND size='$size' AND price='$price' AND category='$category'");

        if (mysqli_num_rows($checkQuery) > 0) {
            // Product exists, update quantity
            $row = mysqli_fetch_assoc($checkQuery);
            $newQuantity = $row['quantity_on_hand'] + $quantity_on_hand;

            $updateQuery = mysqli_query(
                $con,
                "UPDATE pmpng_add_prod_data SET 
                 quantity_on_hand='$newQuantity', 
                 status='$status' 
                 WHERE name='$name' AND size='$size' AND price='$price' AND category='$category'"
            );

            if (!$updateQuery) {
                echo "Error updating product: " . mysqli_error($con);
                exit;
            }
        } else {
            // Insert new product
            $insertQuery = mysqli_query(
                $con,
                "INSERT INTO pmpng_add_prod_data VALUES 
             (null, '$name', '$size', '$price', '$quantity_on_hand', '$category', '$status')"
            );

            if (!$insertQuery) {
                echo "Error adding product: " . mysqli_error($con);
                exit;
            }
        }
    }

    echo "Products processed successfully!";
} else {
    echo "Invalid request. Please provide product data.";
    exit();
}