<?php


if (isset($_POST['usertype']) &&
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['fullname']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['address'])) {

    $usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = MD5($_POST['password']);
    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

    include('connection.php');

    // Check if a user with the same email and user type already exists
    $checkQuery = mysqli_query($con, 
        "SELECT * FROM usertb WHERE email = '$email' AND usertype = '$usertype'"
    );

    if (mysqli_num_rows($checkQuery) > 0) {
        // User already exists
        echo json_encode([
            "status" => "error",
            "message" => "A user with this email and user type already exists!"
        ]);
        exit();
    }

    // Save the new user
    $saveQuery = mysqli_query($con,
    "INSERT INTO usertb VALUES (null, '$username', '$password', '$usertype', '$fullname', '$email', '$phone', '$address')"
);

    if ($saveQuery) {
        echo json_encode([
            "status" => "success",
            "message" => "New user saved successfully!"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Error: " . mysqli_error($con)
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid data provided!"
    ]);
    exit();
}
?>