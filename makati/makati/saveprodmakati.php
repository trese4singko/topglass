<?php
if (
    isset($_POST['name']) &&
    isset($_POST['size']) &&
    isset($_POST['price']) &&
    isset($_POST['quantity_on_hand']) &&
    isset($_POST['category']) &&
    isset($_POST['status'])
) {
    $name = $_POST['name'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $quantity_on_hand = $_POST['quantity_on_hand'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    include('connection.php');

    // Check if a product with the same name, size, price, and category exists
    $checkQuery = mysqli_query($con, "SELECT * FROM makati_main_product WHERE name='$name' AND size='$size' AND price='$price' AND category='$category'");
    if (mysqli_num_rows($checkQuery) > 0) {
        // Product exists, update the quantity
        $row = mysqli_fetch_assoc($checkQuery);
        $newQuantity = $row['quantity_on_hand'] + $quantity_on_hand;

        $updateQuery = mysqli_query($con, 
            "UPDATE makati_main_product SET 
             quantity_on_hand='$newQuantity', 
             status='$status' 
             WHERE name='$name' AND size='$size' AND price='$price' AND category='$category'"
        );

        if ($updateQuery) {
            echo "Product updated successfully!";
        } else {
            echo "Error updating product: " . mysqli_error($con);
        }
    } else {
        // Product does not exist, insert a new row
        $insertQuery = mysqli_query($con, 
            "INSERT INTO makati_main_product VALUES 
             (null, '$name', '$size', '$price', '$quantity_on_hand', '$category', '$status')"
        );

        if ($insertQuery) {
            echo "New product added successfully!";
        } else {
            echo "Error adding product: " . mysqli_error($con);
        }
    }
} else {
    echo "Invalid request. Please provide all required fields.";
    exit();
}
?>
