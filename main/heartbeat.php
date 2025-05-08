<?php
// heartbeat.php
include_once "connection.php";

$data = json_decode(file_get_contents("php://input"), true);
$token = mysqli_real_escape_string($con, $data["token"]);

if (!empty($token)) {
    // Update the last_active field for the session token in both tables
    mysqli_query($con, "UPDATE usertb SET last_active = NOW() WHERE session_token = '$token'");
    mysqli_query($con, "UPDATE backup_acc SET last_active = NOW() WHERE session_token = '$token'");
}
