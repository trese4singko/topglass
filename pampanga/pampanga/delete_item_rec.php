<?php
session_start(); 
include_once("connection.php");
include_once("../../functions.php");
include_once("ppg_log_functions.php");

if (isset($_POST['eid'])) {
    $eid = $_POST['eid'];

    $getItem = mysqli_query($con, "SELECT name FROM pmpng_add_prod_data WHERE product_id = '$eid'");
    $item = mysqli_fetch_assoc($getItem);
    
    if ($item) {
        $itemName = $item['name'];  
        
        $deletequery = mysqli_query($con, "DELETE FROM pmpng_add_prod_data WHERE product_id='$eid'");

        if ($deletequery) {
            $description = "Removed item '$itemName' (ID: $eid) from Pampanga Product Table";
            logppgActivity($con, $_SESSION['username'], 'Remove Item', $eid, $description);
            logActivity($con, $_SESSION['username'], 'Remove Item', $eid, $description);

            echo "Record has been deleted";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    } else {
        echo "Item not found!";
    }
} else {
    echo "Intruder detected!";
}
?>