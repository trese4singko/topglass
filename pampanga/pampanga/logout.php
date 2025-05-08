<?php
session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the login page or home page
header('Location:  ../index.php'); // or any page you want to redirect to
exit();
?>
