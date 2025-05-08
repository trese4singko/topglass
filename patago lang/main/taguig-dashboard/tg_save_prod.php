<?php
session_start();  
include('connection.php');
include('../functions.php');

if (isset($_POST['products'])) {
    $products = json_decode($_POST['products'], true);

    foreach ($products as $product) {
        $name = $product['name'];
        $size = $product['size'];
        $price = $product['price'];
        $quantity_on_hand = $product['quantity_on_hand'];
        $category = $product['category'];
        $status = $product['status'];

        $checkQuery = mysqli_query($con, "SELECT * FROM producttabletaguig WHERE name='$name' AND size='$size' AND price='$price' AND category='$category'");

        if (mysqli_num_rows($checkQuery) > 0) {
            $row = mysqli_fetch_assoc($checkQuery);
            $newQuantity = $row['quantity_on_hand'] + $quantity_on_hand;

            $updateQuery = mysqli_query(
                $con,
                "UPDATE producttabletaguig SET 
                 quantity_on_hand='$newQuantity', 
                 status='$status' 
                 WHERE name='$name' AND size='$size' AND price='$price' AND category='$category'"
            );

            if (!$updateQuery) {
                echo "Error updating product: " . mysqli_error($con);
                exit;
            }

            // Log the update of the product
            logActivity($con, $_SESSION['username'], 'Update Item', $row['product_id'], "Updated product quantity for: $name ($size) in producttabletaguig");

            // Count unread notifications
            $unreadCountResult = mysqli_query($con, "SELECT COUNT(*) AS total FROM activity_logs WHERE is_viewed = FALSE");
            $unreadCountRow = mysqli_fetch_assoc($unreadCountResult);
            $unreadCount = $unreadCountRow['total'];

        } else {
            $insertQuery = mysqli_query(
                $con,
                "INSERT INTO producttabletaguig (name, size, price, quantity_on_hand, category, status) 
                 VALUES ('$name', '$size', '$price', '$quantity_on_hand', '$category', '$status')"
            );

            if ($insertQuery) {
                $newProductId = mysqli_insert_id($con); 

                // Log the addition of the new product
                logActivity($con, $_SESSION['username'], 'Add Item', $newProductId, "Added new product: $name ($size) from Add Products Section (Taguig)");

                // Count unread notifications
                $unreadCountResult = mysqli_query($con, "SELECT COUNT(*) AS total FROM activity_logs WHERE is_viewed = FALSE");
                $unreadCountRow = mysqli_fetch_assoc($unreadCountResult);
                $unreadCount = $unreadCountRow['total'];
                
            } else {
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
?>