<?php
session_start();

// Dummy login validation for username and password
if ($_POST['username'] == 'admin' && $_POST['password'] == 'password') {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $_POST['username'];
    header("Location: dashboard.php"); // Redirect to the dashboard page
} else {
    echo "Invalid credentials. Please try again.";
}
?>
