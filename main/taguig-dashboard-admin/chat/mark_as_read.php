<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['userid']) || !isset($_POST['receiver_id'])) {
    echo json_encode(["error" => "Invalid request"]);
    exit;
}

$userid = $_SESSION['userid'];
$receiver_id = $_POST['receiver_id'];

$query = "UPDATE messages SET is_read = 1 WHERE sender_id = '$receiver_id' AND receiver_id = '$userid'";
mysqli_query($con, $query);

echo json_encode(["success" => true]);
mysqli_close($con);
?>
