<?php
session_start();
include_once "connection.php";

// Check if session exists and handle it
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];

    // Clear session token in the database for both tables
    mysqli_query($con, "UPDATE usertb SET session_token = NULL WHERE userid = '$userid'");
}

// Destroy session and clear cookies
session_unset();
session_destroy();

// Clear session cookie if it exists
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 3600,  // Expire the cookie by setting it to one hour ago 
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Send a response to the front-end for handling localStorage cleanup and redirection
echo "<script>
    // Clear session token from localStorage (if it's set)
    localStorage.removeItem('session_token');
    localStorage.removeItem('isLoggedIn');
    
    // Redirect the user to the login page
    window.location.href = '../index.php';  // Adjust path if necessary
</script>";

// Ensure that the user is redirected
exit();