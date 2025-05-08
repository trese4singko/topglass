<?php
session_start();
include_once("connection.php");
include("../../functions.php");
include("ppg_log_functions.php");

if (isset($_POST['order_id'])) { 
    $id = intval($_POST['order_id']); 

    $orderQuery = "
        SELECT 
            c.name AS customer_name,
            i.product_name
        FROM pmpng_orders o
        JOIN pmpng_customer c ON o.customer_id = c.id
        JOIN pmpng_order_items i ON o.id = i.order_id
        WHERE o.id = $id
    ";

    $orderResult = mysqli_query($con, $orderQuery);
    if ($orderResult && mysqli_num_rows($orderResult) > 0) {
        $orderDetails = mysqli_fetch_assoc($orderResult);
        $customerName = $orderDetails['customer_name'];
        $productName = $orderDetails['product_name'];

        // Delete the order items
        $deletequery = mysqli_query($con, "DELETE FROM pmpng_order_items WHERE order_id = $id"); // Ensure the table name is correct
        if ($deletequery) {
            $username = $_SESSION['username'] ?? 'Unknown User';
            $description = "Deleted order items for order ID '$id' (Customer: '$customerName', Product: '$productName in Pampanga Release Records')";

            logActivity($con, $username, 'Delete Order Item', $id, $description);
            logppgActivity($con, $username, 'Delete Order Item', $id, $description); // Log to branch-specific activity log

            echo "Record has been deleted";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "No order found for the provided ID.";
    }
} else {
    echo "No order ID provided.";
}
?>