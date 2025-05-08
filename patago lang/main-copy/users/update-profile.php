<?php
if (
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['usertype']) &&
    isset($_POST['nickname']) &&
    isset($_POST['fullname']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['address']) &&
    isset($_POST['id'])
) {
    // Get the form data
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $usertype = mysqli_real_escape_string($con, $_POST['usertype']);
    $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $eid = $_POST['id'];

    include('connection.php');

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update the user details in the database, including the hashed password
    $updatequery = mysqli_query(
        $con,
        "UPDATE usertb 
        SET username='$username', password='$hashedPassword', usertype='$usertype', nickname='$nickname', fullname='$fullname', email='$email', phone='$phone', address='$address'
        WHERE userid ='$eid'"
    );

    if ($updatequery) {
        echo "Record Updated!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Missing required fields!";
}
?>