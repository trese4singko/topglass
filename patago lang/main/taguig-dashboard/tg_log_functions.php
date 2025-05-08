<?php
function logtgActivity($con, $username, $action, $item_id = null, $description = '') {
    if (empty($con) || empty($username) || empty($action)) {
        return false;
    }

    // Prepare the item_id for the query
    $item_id = ($item_id !== null) ? $item_id : "NULL"; // Use NULL if item_id is not provided

    // Construct the query
    $query = "INSERT INTO taguig_activity_logs (username, action, item_id, description) 
              VALUES ('$username', '$action', $item_id, '$description')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        return true; 
    } else {
        error_log("Error logging Taguig activity: " . mysqli_error($con)); // Log error
        return false;
    }
}
?>