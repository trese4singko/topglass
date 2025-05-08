<?php

session_start();
include('connection.php');
include('../functions.php');

if (
    isset($_POST['productname']) &&
    isset($_POST['size']) &&
    isset($_POST['price']) &&
    isset($_POST['quantity_on_hand']) &&
    isset($_POST['category']) &&
    isset($_POST['status']) &&
    isset($_POST['eid'])
) {
    $productname = $_POST['productname'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $quantity_on_hand = $_POST['quantity_on_hand'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $eid = $_POST['eid'];

    $updatequery = mysqli_query(
        $con,
        "UPDATE producttabletaguig 
        SET name='$productname', size='$size', price='$price', quantity_on_hand='$quantity_on_hand', category='$category', status='$status'
        WHERE product_id='$eid'"
    );

    if ($updatequery) {
        
        $description = "Updated product '$productname' (ID: $eid) on Taguig Edit Product";

        logActivity($con, $_SESSION['username'], 'Update Item', $eid, $description);

        echo "Record Updated!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Missing required fields!";
}
?>