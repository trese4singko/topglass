<?php
session_start();
require_once 'db_config.php';

// Check if user is logged in
if (!isset($_SESSION['userid']) || !isset($_GET['receiver_id'])) {
    echo json_encode(["error" => "Unauthorized access."]);
    exit;
}

$userid = $_SESSION['userid'];
$receiver_id = $_GET['receiver_id'];

// Fetch messages between the logged-in user and the receiver
$sql = "SELECT m.*, u.username 
        FROM messages m 
        JOIN usertb u ON m.sender_id = u.userid 
        WHERE (m.sender_id = $userid AND m.receiver_id = $receiver_id) 
           OR (m.sender_id = $receiver_id AND m.receiver_id = $userid) 
        ORDER BY m.timestamp ASC";

$result = mysqli_query($con, $sql);

if (!$result) {
    echo json_encode(["error" => "Query failed: " . mysqli_error($con)]);
    exit;
}

$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Return messages as JSON
echo json_encode($messages);
mysqli_close($con);
