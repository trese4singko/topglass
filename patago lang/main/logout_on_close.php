<?php
session_start();
include_once "connection.php";

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    mysqli_query($con, "UPDATE usertb SET session_token = NULL WHERE userid = '$userid'");
}
session_unset();
session_destroy();
