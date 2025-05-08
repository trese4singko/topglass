<?php
session_start();
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['username'])) {
        echo "unauthorized";
        exit;
    }

    $username = $_SESSION['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM usertb WHERE username = '$username' AND usertype = 'admin' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            echo "success";
        } else {
            echo "fail";
        }
    } else {
        echo "fail";
    }
}
