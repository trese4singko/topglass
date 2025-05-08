<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['userid']) || !isset($_GET['receiver_id'])) {
    exit("Unauthorized access.");
}

$userid = $_SESSION['userid'];
$receiver_id = $_GET['receiver_id'];

// Fetch messages between the logged-in user and the receiver
$sql = "SELECT m.*, u.username FROM messages m 
        JOIN usertb u ON m.sender_id = u.userid 
        WHERE (m.sender_id = $userid AND m.receiver_id = $receiver_id) 
        OR (m.sender_id = $receiver_id AND m.receiver_id = $userid) 
        ORDER BY m.timestamp";

$result = mysqli_query($con, $sql);
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Mark messages as read
$update_sql = "UPDATE messages SET is_read = 1 WHERE sender_id = $receiver_id AND receiver_id = $userid";
mysqli_query($con, $update_sql);

// Return messages as JSON
echo json_encode($messages);
mysqli_close($con);
