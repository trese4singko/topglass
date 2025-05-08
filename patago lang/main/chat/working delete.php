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

// Soft delete: only hide messages for the current user
$update_sender = "
    UPDATE messages 
    SET sender_deleted = 1 
    WHERE sender_id = '$userid' AND receiver_id = '$receiver_id'
";

$update_receiver = "
    UPDATE messages 
    SET receiver_deleted = 1 
    WHERE sender_id = '$receiver_id' AND receiver_id = '$userid'
";

$success1 = mysqli_query($conn, $update_sender);
$success2 = mysqli_query($conn, $update_receiver);

if ($success1 && $success2) {
    echo json_encode(["success" => true, "message" => "Conversation hidden successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Error hiding conversation: " . mysqli_error($conn)]);
}

mysqli_close($conn);
