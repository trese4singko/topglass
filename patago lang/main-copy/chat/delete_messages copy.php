<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['userid'])) {
    exit(json_encode(["success" => false, "message" => "Unauthorized access."]));
}

$userid = $_SESSION['userid'];
$receiver_id = $_POST['receiver_id']; // Get the receiver ID from the POST request

// SQL query to delete messages between the logged-in user and the selected user
$sql = "DELETE FROM messages WHERE (sender_id = '$userid' AND receiver_id = '$receiver_id') OR (sender_id = '$receiver_id' AND receiver_id = '$userid')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => true, "message" => "All messages with this user deleted successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Error deleting messages: " . mysqli_error($conn)]);
}

mysqli_close($conn);
