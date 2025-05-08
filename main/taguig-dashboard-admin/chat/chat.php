<?php
session_start();
require_once 'db_config.php';

// Check if session variables are set
if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
    header("Location: main.php"); // Redirect to main.php if not logged in
    exit;
}

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

// Fetch users with unread message count
$query = "
    SELECT u.userid, u.username, COUNT(m.id) AS unread_count 
    FROM usertb u 
    LEFT JOIN messages m ON (m.receiver_id = '$userid' AND m.sender_id = u.userid AND m.is_read = 0)
    WHERE u.userid != '$userid'
    GROUP BY u.userid, u.username
";
$result = mysqli_query($con, $query);

// Check for query errors
if (!$result) {
    echo "Error fetching users: " . mysqli_error($con);
    exit;
}

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div id="chat-container">
        <div id="user-list">
            <h3>Users</h3>
            <button id="group-chat-btn">Group Chat</button>
            <?php foreach ($users as $user): ?>
                <div class="user" data-user-id="<?php echo $user['userid']; ?>" style="font-weight: bold;">
                    <?php echo htmlspecialchars($user['username']); ?>
                    <?php if ($user['unread_count'] > 0): ?>
                        <sup style="color: red;"><?php echo $user['unread_count']; ?></sup>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="chat-window">
            <h2 id="chat-header">Select a user to chat</h2>
            <input type="file" id = "uploadBtn">
            <div id="messages"></div>
            <form id="message-form">
                <input type="hidden" id="receiver_id" name="receiver_id">
                <input type="text" id="message" name="message" placeholder="Type your message..." required>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
    <?php mysqli_close($con); ?>

    <script src="jquery.js"></script>
    <script src="js.js"></script>
    
</body>
</html>