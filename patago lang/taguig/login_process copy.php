<?php
session_start();

include "taguig-dashboard-admin/functions.php";
include "taguig-dashboard-admin/tg_log_functions.php";
include "connection.php";

header('Content-Type: application/json');

if ($con === false) {
    echo json_encode(["status" => "error", "message" => "Connection error"]);
    exit();
}

function generateSessionToken() {
    return bin2hex(random_bytes(16));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = $_POST["password"];
    $browserToken = isset($_POST["session_token"]) ? $_POST["session_token"] : "";

    function handleLogin($con, $row, $table) {
        $newToken = generateSessionToken();
        $userid = $row['userid'];

        mysqli_query($con, "UPDATE $table SET session_token = '$newToken' WHERE userid = '$userid'");

        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $row['username'];
        $_SESSION['nickname'] = $row['nickname'];
        $_SESSION['usertype'] = $row['usertype'];
        $_SESSION['session_token'] = $newToken;

        logtgActivity($con, $row['username'], 'Login', null, "Taguig user {$row['username']} has logged in");

        echo json_encode([
            "status" => "success",
            "redirect" => "taguig-dashboard-admin/index.php?page=taguig_dashboard",
            "session_token" => $newToken
        ]);
        exit();
    }

    function checkAndLogin($con, $table) {
        global $username, $password, $browserToken;

        $query = "SELECT * FROM $table WHERE username = '$username'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if ($row['usertype'] !== 'Taguig Admin') {
                echo json_encode(["status" => "unauthorized", "message" => "Not authorized."]);
                exit();
            }

            if (password_verify($password, $row['password'])) {
                // If session_token exists and does not match browser token, reject
                if (!empty($row['session_token']) && $row['session_token'] !== $browserToken) {
                    echo json_encode([
                        "status" => "already_logged_in",
                        "message" => "Account is already logged in on another browser or device.",
                        "table" => $table
                    ]);
                    exit();
                } else {
                    handleLogin($con, $row, $table);
                }
            } else {
                logtgActivity($con, $username, false, "Invalid password for user {$username}");
                echo json_encode(["status" => "invalid", "message" => "Invalid username or password."]);
                exit();
            }
        }
    }

    checkAndLogin($con, 'usertb');

    logActivity($con, $username, false, "User {$username} not found");
    echo json_encode(["status" => "invalid", "message" => "Invalid username or password."]);
    exit();
}

mysqli_close($con);
?>
