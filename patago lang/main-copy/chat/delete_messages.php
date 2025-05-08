<?php
session_start();
require_once 'conn.php';

header('Content-Type: application/json');

if (!isset($_SESSION['userid'])) {
    exit(json_encode(["success" => false, "message" => "Unauthorized access."]));
}

$userid = $_SESSION['userid'];
$receiver_id = $_POST['receiver_id'];

if (!$receiver_id) {
    exit(json_encode(["success" => false, "message" => "Receiver ID is required."]));
}

// Soft delete by setting flags (only hides for current user)
$update = "
    UPDATE messages 
    SET 
        sender_deleted = CASE WHEN sender_id = '$userid' THEN 1 ELSE sender_deleted END,
        receiver_deleted = CASE WHEN receiver_id = '$userid' THEN 1 ELSE receiver_deleted END
    WHERE 
        (sender_id = '$userid' AND receiver_id = '$receiver_id') 
        OR 
        (sender_id = '$receiver_id' AND receiver_id = '$userid')
";

if (mysqli_query($conn, $update)) {
    echo json_encode(["success" => true, "message" => "Conversation hidden successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Error hiding conversation: " . mysqli_error($conn)]);
}

mysqli_close($conn);
