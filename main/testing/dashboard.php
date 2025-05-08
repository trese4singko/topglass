<?php
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Set the inactivity timeout (30 seconds for this example)
$timeout = 30; // seconds

// Update session activity timestamp on each page load
$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include SweetAlert2 CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // JavaScript to check for inactivity and show SweetAlert after 30 seconds
        let inactivityTime = <?php echo $timeout; ?> * 1000; // Convert seconds to milliseconds
        let timeout;
        let inactiveFor = 0; // Time elapsed since last activity in seconds

        // Function to show SweetAlert when user has been inactive for 30 seconds
        function showInactivityAlert() {
            Swal.fire({
                title: 'Inactive for 30 seconds!',
                text: 'Due to inactivity, you will be redirected to the login page.',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonText: 'OK',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    logout(); // Log out the user if they confirm the alert
                }
            });
        }

        // Function to log out the user and redirect to the login page
        function logout() {
            window.location.href = 'login.php'; // Redirect to login page
        }

        // Function to reset the timer whenever there is activity
        function resetTimer() {
            clearTimeout(timeout);
            timeout = setTimeout(showInactivityAlert, inactivityTime); // Show alert after 30 seconds of inactivity
            inactiveFor = 0; // Reset inactive time
        }

        // Update inactivity time on each user activity (mouse move, key press, etc.)
        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;

        // Start the timer
        timeout = setTimeout(showInactivityAlert, inactivityTime);
    </script>
</head>

<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>You are logged in. The page will log you out after 30 seconds of inactivity.</p>
    <a href="logout.php">Logout</a>
</body>

</html>