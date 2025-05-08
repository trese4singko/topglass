<?php
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

    include('connection.php');

    $updatequery = mysqli_query(
        $con,
        "UPDATE producttabletaguig 
        SET name='$productname', size='$size', price='$price', quantity_on_hand='$quantity_on_hand', category='$category', status='$status'
        WHERE product_id='$eid'"
    );

    if ($updatequery) {
        echo "Record Updated!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Missing required fields!";
}
