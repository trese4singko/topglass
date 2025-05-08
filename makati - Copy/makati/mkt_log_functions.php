<?php
function logmktActivity($con, $username, $action, $item_id = null, $description = '') {
    if (empty($con) || empty($username) || empty($action)) {
        return false;
    }

    // Prepare the item_id for the query
    $item_id = ($item_id !== null) ? $item_id : "NULL"; // Use NULL if item_id is not provided

    // Escape the strings to prevent SQL injection
    $username = mysqli_real_escape_string($con, $username);
    $action = mysqli_real_escape_string($con, $action);
    $description = mysqli_real_escape_string($con, $description);

    // Construct the query
    $query = "INSERT INTO makati_activity_logs (username, action, item_id, description) 
              VALUES ('$username', '$action', $item_id, '$description')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        return true; 
    } else {
        error_log("Error logging Makati activity: " . mysqli_error($con)); // Log error
        return false;
    }
}
?>