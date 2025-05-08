<?php
// Include database connection
include_once "connection.php";

// Get the session token sent from the client
$data = json_decode(file_get_contents("php://input"), true);
$token = mysqli_real_escape_string($con, $data["token"]);

// Check if token is not empty
if (!empty($token)) {
    // Clear the session token from both usertb and backup_acc tables
    mysqli_query($con, "UPDATE usertb SET session_token = NULL WHERE session_token = '$token'");

    // Optionally log the logout action for auditing (this could be added for security purposes)
    // mysqli_query($con, "INSERT INTO activity_log (user_id, action, timestamp) VALUES ('$userid', 'logout', NOW())");
}

// Respond with a success message (optional)
echo json_encode(["status" => "success"]);
exit();
