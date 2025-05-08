<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['userid'])) {
    exit("Unauthorized access.");
}

$sender_id  = $_SESSION['userid'];
$receiver_id = $_POST['receiver_id'] ?? '';
$message     = trim($_POST['message'] ?? '');
$is_group    = isset($_POST['group']) ? 1 : 0;
$file_path   = null;

// Escape the message
$message = mysqli_real_escape_string($conn, $message);

// Handle file upload (same as before)...
// Handle file upload (same as before)...
if (!empty($_FILES['file']['name'])) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    $originalName = basename($_FILES['file']['name']);
    $safeName     = preg_replace("/[^A-Za-z0-9_\-\.]/", "_", $originalName);
    $targetFilePath = $uploadDir . time() . '_' . $safeName;

    // MIME check
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime  = finfo_file($finfo, $_FILES['file']['tmp_name']);
    finfo_close($finfo);

    // Updated allowed MIME types to include documents
    $allowed = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // Word
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // Excel
        'application/vnd.ms-excel', // Excel (older version)
        'application/vnd.openxmlformats-officedocument.presentationml.presentation', // PowerPoint
        'application/vnd.ms-powerpoint', // PowerPoint (older version)
        'application/zip', // Zip files (optional)
        'application/x-zip-compressed' // Zip files (optional)
    ];

    if (!in_array($mime, $allowed)) {
        echo json_encode(["error" => "Unsupported file type."]);
        exit;
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
        $file_path = mysqli_real_escape_string($conn, $targetFilePath);
    } else {
        echo json_encode(["error" => "File upload failed."]);
        exit;
    }
}

if (empty($message) && !$file_path) {
    echo json_encode(["error" => "Message and file cannot both be empty."]);
    exit;
}

// Build & run the INSERT without created_at
$sql = "
    INSERT INTO messages 
        (sender_id, receiver_id, message, file_path, is_read, `group`)
    VALUES
        (
            '$sender_id',
            '$receiver_id',
            '$message',
            " . ($file_path ? "'$file_path'" : "NULL") . ",
            0,
            '$is_group'
        )
";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => mysqli_error($conn)]);
}

$conn->close();
