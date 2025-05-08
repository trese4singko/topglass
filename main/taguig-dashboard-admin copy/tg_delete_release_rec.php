<?php
if (isset($_POST['order_id'])) { 
    $id = intval($_POST['order_id']); 

    include_once("connection.php");

    $deletequery = mysqli_query($con, "DELETE FROM taguig_order_items WHERE order_id = $id"); // Ensure the table name is correct
    if ($deletequery) {
        echo "Record has been deleted";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "No order ID provided.";
}
?>