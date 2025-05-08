<?php
session_start();
require_once 'conn.php';

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    exit("Unauthorized access.");
}

$sender_id = $_SESSION['userid'];
$receiver_id = $_POST['receiver_id'];
$message = $_POST['message'];
$is_group = isset($_POST['group']) ? 1 : 0; // Check if it's a group message

// Validate message
if (!empty($message)) {
    // Escape the message to prevent SQL injection
    $message = mysqli_real_escape_string($conn, $message);

    // Prepare the SQL query
    $sql = "INSERT INTO messages (sender_id, receiver_id, message, is_read, `group`) VALUES ($sender_id, $receiver_id, '$message', 0, $is_group)";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "Error: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["error" => "Message cannot be empty."]);
}

$conn->close();
