<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['userid'])) {
    echo json_encode(["error" => "Not logged in"]);
    exit;
}

$userid = $_SESSION['userid'];
$query = "
    SELECT sender_id, COUNT(id) AS unread_count 
    FROM messages 
    WHERE receiver_id = '$userid' AND is_read = 0 
    GROUP BY sender_id
";

$result = mysqli_query($con, $query);
$unreadCounts = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $unreadCounts[$row['sender_id']] = $row['unread_count'];
    }
}

echo json_encode($unreadCounts);
mysqli_close($con);
?>
