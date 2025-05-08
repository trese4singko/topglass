<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax'
]);

session_start();
include "taguig-dashboard-admin/functions.php";
include "taguig-dashboard-admin/tg_log_functions.php";
include "connection.php";

header('Content-Type: application/json');

if ($con === false) {
    echo json_encode(["status" => "error", "message" => "Connection error"]);
    exit();
}

function generateSessionToken()
{
    return bin2hex(random_bytes(16));
}

$lockout_duration = 20; // seconds
$max_attempts = 3;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = $_POST["password"];
    $browserToken = $_POST["session_token"] ?? "";

    // Lockout check
    if (isset($_SESSION['lockout_until']) && time() < $_SESSION['lockout_until']) {
        $remain = $_SESSION['lockout_until'] - time();
        echo json_encode([
            "status" => "locked",
            "message" => "Too many failed attempts. Try again in " . gmdate("i\m s\s", $remain),
            "lockout_remaining" => $remain
        ]);
        exit();
    }

    // Already logged-in check
    if (isset($_SESSION['session_token']) && !empty($_SESSION['session_token'])) {
        $userToken = $_SESSION['session_token'];
        $username = $_SESSION['username'];

        $res = mysqli_query($con, "SELECT * FROM usertb WHERE username = '$username'");
        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($row['session_token'] === $userToken) {
                echo json_encode([
                    "status" => "success",
                    "message" => "You are already logged in.",
                    "redirect" => "taguig-dashboard-admin/index.php?page=taguig_dashboard",
                    "set_local_storage" => true
                ]);
                exit();
            }
        }
    }

    function handleLogin($con, $row, $table)
    {
        session_unset();
        session_destroy();

        // Start a new session with cookie that expires on browser close
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'domain' => '',
            'secure' => isset($_SERVER['HTTPS']),
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
        session_start();

        $token = generateSessionToken();
        $userid = $row['userid'];

        mysqli_query($con, "UPDATE $table SET session_token = '$token' WHERE userid = '$userid'");

        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $row['username'];
        $_SESSION['nickname'] = $row['nickname'];
        $_SESSION['usertype'] = $row['usertype'];
        $_SESSION['session_token'] = $token;

        unset($_SESSION['failed_attempts'], $_SESSION['lockout_until']);

        logtgActivity($con, $row['username'], 'Login', null, "Admin user {$row['username']} has logged in");
        logActivity($con, $row['username'], 'Login', null, "Admin user {$row['username']} has logged in");

        echo json_encode([
            "status" => "success",
            "redirect" => "taguig-dashboard-admin/index.php?page=taguig_dashboard",
            "session_token" => $token
        ]);
        exit();
    }

    function checkLoginTable($con, $table)
    {
        global $username, $password, $browserToken, $max_attempts, $lockout_duration;

        $stmt = $con->prepare("SELECT * FROM $table WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['usertype'] !== 'Taguig Admin')
            // change this depend on what usertype are you using 
            {
                echo json_encode(["status" => "unauthorized", "message" => "Access restricted to admins."]);
                exit();
            }

            if (password_verify($password, $row['password'])) {
                if (!empty($row['session_token']) && $row['session_token'] !== $browserToken) {
                    echo json_encode(["status" => "already_logged_in", "message" => "Account already active on another device."]);
                    exit();
                }
                handleLogin($con, $row, $table);
            } else {
                $_SESSION['failed_attempts'] = ($_SESSION['failed_attempts'] ?? 0) + 1;
                if ($_SESSION['failed_attempts'] >= $max_attempts) {
                    $_SESSION['lockout_until'] = time() + $lockout_duration;
                    echo json_encode([
                        "status" => "locked",
                        "message" => "Too many failed attempts. Wait {$lockout_duration} seconds.",
                        "lockout_remaining" => $lockout_duration
                    ]);
                    exit();
                }
                logLoginActivity($con, $username, false, "Wrong password for $username");
                echo json_encode(["status" => "invalid", "message" => "Wrong username or password. Attempts left: " . ($max_attempts - $_SESSION['failed_attempts'])]);
                exit();
            }
        }
    }

    checkLoginTable($con, 'usertb');


    $_SESSION['failed_attempts'] = ($_SESSION['failed_attempts'] ?? 0) + 1;
    if ($_SESSION['failed_attempts'] >= $max_attempts) {
        $_SESSION['lockout_until'] = time() + $lockout_duration;
        echo json_encode([
            "status" => "locked",
            "message" => "Too many failed attempts. Wait {$lockout_duration} seconds.",
            "lockout_remaining" => $lockout_duration
        ]);
        exit();
    }

    logLoginActivity($con, $username, false, "User $username not found");
    echo json_encode(["status" => "invalid", "message" => "Invalid username or password. Attempts left: " . ($max_attempts - $_SESSION['failed_attempts'])]);
    exit();
}

mysqli_close($con);
