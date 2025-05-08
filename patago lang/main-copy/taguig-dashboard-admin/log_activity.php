<?php
include('connection.php');
include('../functions.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && isset($_POST['description'])) {
        $username = $_SESSION['username'];
        $action = $_POST['action'];
        $description = $_POST['description'];

        $result = logActivity($con, $username, $action, null, $description); // Removed the source parameter

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Activity logged successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to log activity.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>