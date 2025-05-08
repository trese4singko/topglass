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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];
    $nickname = $_POST['nickname'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $eid = $_POST['id'];

    include('connection.php');

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update the user details in the database, including the hashed password
    $updatequery = mysqli_query(
        $con,
        "UPDATE usertb 
        SET username='$username', password='$hashedPassword', usertype='$usertype', nickname='$nickname', fullname='$fullname', email='$email', phone='$phone', address='$address', p1='$password' 
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
