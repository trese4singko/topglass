    <?php
    session_start();
    require_once 'db_config.php';

    if (!isset($_SESSION['userid']) || !isset($_GET['receiver_id'])) {
        echo json_encode(["error" => "Unauthorized access."]);
        exit;
    }

    $userid = (int) $_SESSION['userid'];
    $receiver_id = (int) $_GET['receiver_id'];

    // Fetch conversation
    $sql = "
        SELECT m.id, m.sender_id, m.receiver_id, m.message, m.file_path, m.timestamp, u.username 
        FROM messages m 
        JOIN usertb u ON m.sender_id = u.userid 
        WHERE 
            (m.sender_id = $userid AND m.receiver_id = $receiver_id) 
            OR 
            (m.sender_id = $receiver_id AND m.receiver_id = $userid) 
        ORDER BY m.timestamp ASC
    ";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo json_encode(["error" => "Query failed: " . mysqli_error($con)]);
        exit;
    }

    $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Mark messages as read
    $update_sql = "
        UPDATE messages 
        SET is_read = 1 
        WHERE sender_id = $receiver_id AND receiver_id = $userid AND is_read = 0
    ";
    mysqli_query($con, $update_sql);

    // Return messages
    header('Content-Type: application/json');
    echo json_encode($messages);

    mysqli_close($con);
