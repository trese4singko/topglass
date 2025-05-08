<?php
session_start();
if (isset($_SESSION['userid'])) {
    $_SESSION['last_activity'] = time();
    echo "success";
}
