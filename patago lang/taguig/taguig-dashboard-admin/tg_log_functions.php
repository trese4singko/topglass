<?php
function logtgActivity($con, $username, $action, $item_id = null, $description = '') {
    $query = "INSERT INTO taguig_activity_logs (username, action, item_id, description) 
              VALUES (?, ?, ?, ?)";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("ssis", $username, $action, $item_id, $description);
        $stmt->execute();
        $stmt->close();
        return true;
    }
    return false;
}
?>
