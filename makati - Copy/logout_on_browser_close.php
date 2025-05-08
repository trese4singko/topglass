<?php
session_start();
include_once 'makati/connection.php'; // Adjust if your path is different

if (isset($_SESSION['userid']) && isset($_SESSION['session_token'])) {
    $userid = $_SESSION['userid'];

    // Clear session token in the database
    mysqli_query($con, "UPDATE usertb SET session_token = NULL WHERE userid = '$userid'");

    // Destroy the session
    session_unset();
    session_destroy();

    // Optionally, you can clear the session cookie as well
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 20,  // Expire the cookie
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
}
