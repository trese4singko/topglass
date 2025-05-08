<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usertype'])) {
    header("Location: ../index.php");
    exit();
}

if (!isset($_SESSION['usertype'])) {
    header('Location: ../../index.php'); 
    exit();
}
$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TG Users</title>
</head>

<body>
    <h1>hello world users page</h1>
</body>

</html>