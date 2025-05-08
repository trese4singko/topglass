<?php
session_start();
include_once "connection.php";

// Get the session user ID
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];

    // Clear session_token from usertb
    $query = "UPDATE usertb SET session_token = '' WHERE userid = '$userid'";
    mysqli_query($con, $query);

    // Clear session_token from backup_acc
    $query2 = "UPDATE backup_acc SET session_token = '' WHERE userid = '$userid'";
    mysqli_query($con, $query2);
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
