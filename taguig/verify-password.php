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

    // Check in 'usertb' first
    $query = "SELECT * FROM usertb WHERE username = '$username' AND usertype = 'admin' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            echo "success";
        } else {
            echo "fail";
        }
    } 
}
    
//     else {
//         // If not found in 'usertb', check 'backup_acc'
//         $query_backup = "SELECT * FROM backup_acc WHERE username = '$username' AND usertype = 'admin' LIMIT 1";
//         $result_backup = mysqli_query($con, $query_backup);

//         if ($result_backup && mysqli_num_rows($result_backup) > 0) {
//             $row_backup = mysqli_fetch_assoc($result_backup);
//             if (password_verify($password, $row_backup['password'])) {
//                 echo "success";
//             } else {
//                 echo "fail";
//             }
//         } else {
//             echo "fail";
//         }
//     }
// }
