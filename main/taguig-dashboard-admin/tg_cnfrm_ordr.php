<?php
include_once('connection.php');
include_once('../functions.php');
include_once('tg_log_functions.php'); // Include the logging functions

if (!$con) {
    die(json_encode(["status" => "error", "message" => "Database connection failed."]));
}

if (isset($_POST['check_availability'])) {
    $productName = $_POST['product_name'] ?? '';
    $productSize = $_POST['size'] ?? '';

    $checkProduct = "SELECT quantity_on_hand FROM producttabletaguig WHERE name=? AND size=?";
    $stmt = $con->prepare($checkProduct);
    $stmt->bind_param("ss", $productName, $productSize);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentQuantity = $row['quantity_on_hand'];

        if ($currentQuantity > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "No available quantity left."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Product not found."]);
    }
    exit; 
}

$customerName = $_POST['customer_name'] ?? '';
$customerNum = $_POST['customer_num'] ?? '';
$customerAdd = $_POST['customer_add'] ?? '';

if (empty($customerName) || empty($customerNum) || empty($customerAdd)) {
    echo json_encode(["status" => "error", "message" => "Please fill in all customer details."]);
    exit;
}

$customerQuery = "INSERT INTO taguig_customers (name, contact, address) VALUES (?, ?, ?)";
$stmt = $con->prepare($customerQuery);
$stmt->bind_param("sss", $customerName, $customerNum, $customerAdd);
if (!$stmt->execute()) {
    echo json_encode(["status" => "error", "message" => "Failed to save customer details."]);
    exit;
}

$customerID = $con->insert_id;

$orderQuery = "INSERT INTO taguig_orders (customer_id) VALUES (?)";
$stmt = $con->prepare($orderQuery);
$stmt->bind_param("i", $customerID);
if (!$stmt->execute()) {
    echo json_encode(["status" => "error", "message" => "Failed to create order."]);
    exit;
}

$orderID = $con->insert_id;

$productName = $_POST['product_name'] ?? '';
$productSize = $_POST['size'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$price = $_POST['price'] ?? '';

$totalPrice = $quantity * $price;

if (empty($productName) || empty($productSize) || empty($quantity) || empty($price)) {
    echo json_encode(["status" => "error", "message" => "Please fill in all product details."]);
    exit;
}

$checkProduct = "SELECT quantity_on_hand FROM producttabletaguig WHERE name=? AND size=?";
$stmt = $con->prepare($checkProduct);
$stmt->bind_param("ss", $productName, $productSize);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentQuantity = $row['quantity_on_hand'];

    if ($currentQuantity >= $quantity) {
        $newQuantity = $currentQuantity - $quantity;
        $updateStock = "UPDATE producttabletaguig SET quantity_on_hand=? WHERE name=? AND size=?";
        $stmt = $con->prepare($updateStock);
        $stmt->bind_param("iss", $newQuantity, $productName, $productSize);
        $stmt->execute();

        $orderItemQuery = "INSERT INTO taguig_order_items (order_id, product_name, size, quantity, price, total_price) 
                           VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($orderItemQuery);
        $stmt->bind_param("issidd", $orderID, $productName, $productSize, $quantity, $price, $totalPrice);

        if ($stmt->execute()) {
            // Log the activity after successfully confirming the order
            $username = $_SESSION['username '] ?? 'Unknown User'; // Get the username from the session
            $description = "Released product '$productName' (Size: $productSize) to customer '$customerName' (Quantity: $quantity, Total Price: ₱$totalPrice)";
            logtgActivity($con, $username, 'Release Item', null, $description); // Log the activity

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

$con->close();
?>