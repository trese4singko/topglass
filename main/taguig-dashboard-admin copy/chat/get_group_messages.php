<?php
session_start();
require_once 'db_config.php';

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    exit("Unauthorized access.");
}

$userid = $_SESSION['userid'];

// Fetch group messages
$sql = "SELECT m.*, u.username FROM messages m 
        JOIN usertb u ON m.sender_id = u.userid 
        WHERE m.group = 1 
        ORDER BY m.timestamp ASC";

$result = mysqli_query($con, $sql);
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Return messages as JSON
echo json_encode($messages);
mysqli_close($con);
