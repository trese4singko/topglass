<?php

if (
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['usertype']) &&
    isset($_POST['nickname']) &&
    isset($_POST['fullname']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['address'])
) {

    include 'connection.php';

    // Sanitize and escape inputs
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password']; // not escaped since we hash it
    $usertype = mysqli_real_escape_string($con, $_POST['usertype']);
    $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    // Use secure password hashing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if a user with the same email already exists
    $checkEmailQuery = mysqli_query(
        $con,
        "SELECT * FROM backup_acc WHERE email = '$email' AND usertype = '$usertype'"
    );

    // Check if a user with the same username already exists
    $checkUsernameQuery = mysqli_query(
        $con,
        "SELECT * FROM backup_acc WHERE username = '$username' AND usertype = '$usertype'"
    );

    $emailExists = mysqli_num_rows($checkEmailQuery) > 0;
    $usernameExists = mysqli_num_rows($checkUsernameQuery) > 0;

    // Check which condition is true and show appropriate message
    if ($emailExists && $usernameExists) {
        echo "Error: A user with both this email and username already exists!";
        exit();
    } elseif ($emailExists) {
        echo "Error: A user with this email already exists!";
        exit();
    } elseif ($usernameExists) {
        echo "Error: A user with this username already exists!";
        exit();
    }

    // Save the new user
    $saveQuery = mysqli_query(
        $con,
        "INSERT INTO backup_acc 
        (username, password, usertype, nickname, fullname, email, phone, address, p1)
        VALUES 
        ('$username', '$hashedPassword', '$usertype', '$nickname', '$fullname', '$email', '$phone', '$address', '$password')"
    );

    if ($saveQuery) {
        echo "Success: New user saved successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Error: Invalid data provided!";
    exit();
}
?>
