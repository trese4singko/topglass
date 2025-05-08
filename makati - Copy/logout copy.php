<?php
session_start();
include_once "connection.php";
include ('makati/functions.php');
include ('makati/mkt_log_functions.php');

// Get the session user ID
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username']; // Ensure you have the username stored in the session

    // Clear session_token from usertb
    $query = "UPDATE usertb SET session_token = '' WHERE userid = '$userid'";
    mysqli_query($con, $query);

    // Log the logout activity in both logs
    logActivity($con, $username, "Logout", null, "User  logged out successfully.");
    logmktActivity($con, $username, "Logout", null, "User  logged out successfully.");
}

// Destroy the session
session_unset();
session_destroy();

// Remove session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );  
}

// Redirect and also remove session_token from localStorage
echo "<script>  
    localStorage.removeItem('session_token');
    window.location.href = 'index.php';
</script>";
exit;
?>