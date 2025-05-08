<?php
// session_cleanup.php
session_start();
include_once "connection.php";

if (isset($_POST['token'])) {
    $session_token = $_POST['token'];

    // Fetch the user ID based on the session token
    $result = mysqli_query($con, "SELECT userid FROM usertb WHERE session_token = '$session_token'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userid = $row['userid'];

        // Clear the session token from both usertb and backup_acc
        mysqli_query($con, "UPDATE usertb SET session_token = NULL WHERE userid = '$userid'");
        mysqli_query($con, "UPDATE backup_acc SET session_token = NULL WHERE userid = '$userid'");
    }

    // Clean up the session on the server
    session_unset();
    session_destroy();

    echo json_encode(["status" => "success"]);
    exit();
} else {
    echo json_encode(["status" => "error", "message" => "No session token provided."]);
    exit();
}
