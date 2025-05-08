<?php
function logActivity($con, $username, $action, $item_id = null, $description = '') {
    if (empty($con) || empty($username) || empty($action)) {
        return false;
    }

    $query = "INSERT INTO activity_logs (username, action, item_id, description) 
              VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($con, $query)) {
        $item_id = ($item_id !== null) ? $item_id : NULL; 
        mysqli_stmt_bind_param($stmt, "ssis", $username, $action, $item_id, $description);

        if (mysqli_stmt_execute($stmt)) {
            return true; 
        } else {
            return false;
        }
    } else {
        return false; 
    }
}

function logLoginActivity($con, $username, $success, $description = '') {
    $action = $success ? "Login" : "Login Attempt Failed";  
    logActivity($con, $username, $action, null, $description); 
    
}
function getLatestLoginHistory($con) {
    $query = "SELECT * FROM activity_logs WHERE action = 'Login' ORDER BY timestamp DESC LIMIT 5"; 
    $result = mysqli_query($con, $query);
    
    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC); 
    }
    return [];
}


?>
