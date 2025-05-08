<?php
// Ensure connection.php is included
include_once('connection.php');

if (!$con) {
    die(json_encode(["status" => "error", "message" => "Database connection failed."]));
}

// Get customer details from POST request
$customerName = $_POST['customer_name'] ?? '';
$customerNum = $_POST['customer_num'] ?? '';
$customerAdd = $_POST['customer_add'] ?? '';

// Validate customer input
if (empty($customerName) || empty($customerNum) || empty($customerAdd)) {
    echo json_encode(["status" => "error", "message" => "Please fill in all customer details."]);
    exit;
}

// Insert customer details into the taguig_customers table
$customerQuery = "INSERT INTO makati_customers (name, contact, address) VALUES ('$customerName', '$customerNum', '$customerAdd')";
if (!$con->query($customerQuery)) {
    echo json_encode(["status" => "error", "message" => "Failed to save customer details."]);
    exit;
}

// Get the last inserted customer ID
$customerID = $con->insert_id;

// Create an order record for the customer
$orderQuery = "INSERT INTO makati_orders (customer_id) VALUES ('$customerID')";
if (!$con->query($orderQuery)) {
    echo json_encode(["status" => "error", "message" => "Failed to create order."]);
    exit;
}

// Get the last inserted order ID
$orderID = $con->insert_id;

// Get product details
$productName = $_POST['product_name'] ?? '';
$productSize = $_POST['size'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$price = $_POST['price'] ?? '';

// Calculate total price
$totalPrice = $quantity * $price;

// Validate product input
if (empty($productName) || empty($productSize) || empty($quantity) || empty($price)) {
    echo json_encode(["status" => "error", "message" => "Please fill in all product details."]);
    exit;
}

// Check if the product exists and has enough quantity
$checkProduct = "SELECT quantity_on_hand FROM mkt_add_prod_data WHERE name='$productName' AND size='$productSize'";
$result = $con->query($checkProduct);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentQuantity = $row['quantity_on_hand'];

    if ($currentQuantity >= $quantity) {
        // Deduct quantity from product stock
        $newQuantity = $currentQuantity - $quantity;
        $updateStock = "UPDATE mkt_add_prod_data SET quantity_on_hand='$newQuantity' WHERE name='$productName' AND size='$productSize'";
        $con->query($updateStock);

        // Insert order details into the taguig_order_items table
        $orderItemQuery = "INSERT INTO makati_order_items (order_id, product_name, size, quantity, price, total_price) 
                           VALUES ('$orderID', '$productName', '$productSize', '$quantity', '$price', '$totalPrice')";

        if ($con->query($orderItemQuery)) {
            echo json_encode(["status" => "success", "message" => "Order confirmed and stock updated."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to save order details."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Not enough stock available."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Product not found."]);
}

// Close the connection
$con->close();
