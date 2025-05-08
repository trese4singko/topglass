<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// // Check if the user is logged in
// if (!isset($_SESSION['usertype'])) {
//     header('Location:  ../index.php'); // Redirect to login page if not logged in
//     exit();
// }

// // Check if the user is Makati Admin
// if ($_SESSION['usertype'] !== 'Taguig Admin') {
//     // Redirect to a page indicating no access, or an error page
//     header('Location:  ../index.php');
//     exit();
// }

// $usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
// $nickname = isset($_SESSION['nickname']) ? htmlspecialchars($_SESSION['nickname']) : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="users\css\addusers.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>

    <div class="bloom-container">

        <div class="nebula-title">Add Employee</div>

        <div class="form">
            <!-- Product Category -->
            <div class="nova-input">
                <span class="comet-details">User Type</span>
                <select name="usertype" class="usertype" id="usertype" required>
                    <option value="">Select Usertype</option>
                    <option value="admin">Main Admin</option>
                    <option value="Taguig Admin">Taguig Admin</option>
                    <option value="Makati Admin">Makati Admin</option>
                    <option value="Pampanga Admin">Pampanga Admin</option>
                </select>
            </div>

            <!-- Product Name -->
            <div class="nova-input">
                <span class="comet-details">Enter User Name</span>
                <input type="text" name="username" placeholder="Enter your desired username" class="username"
                    id="username" required>
            </div>

            <!-- Product Size -->
            <div class="nova-input">
                <span class="comet-details">Enter Password</span>
                <input type="text" name="password" placeholder="Enter password" class="password" id="password">
            </div>

            <!-- Product Price -->
            <div class="nova-input">
                <span class="comet-details">Branch Admin Name</span>
                <input type="text" name="fullname" class="fullname" id="fullname" placeholder="Branch Admin" required>
            </div>

            <div class="nova-input">
                <span class="comet-details">Nickname</span>
                <input type="text" name="nickname" class="nickname" id="nickname" placeholder="nickname">
            </div>

            <!-- Product Quantity on Hand -->
            <div class="nova-input">
                <span class="comet-details">Email Account</span>
                <input type="email" name="email" class="email" id="email" placeholder="email a valid email address"
                    required>
            </div>

            <!-- Product Quantity on Hand -->
            <div class="nova-input">
                <span class="comet-details">Contact Number</span>
                <input type="number" name="phone" class="phone" id="phone" placeholder="Enter Contact Number" required>
            </div>

            <!-- Product Quantity on Hand -->
            <div class="nova-input">
                <span class="comet-details">Address</span>
                <input type="text" name="address" class="address" id="address" placeholder="Optional">
            </div>

            <!-- Submit Button -->
            <div class="star-button" id="addbutton" onclick="adduser()">
                <input type="submit" value="Save New Employee">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- <script src="users\js\sweetalert.js"></script> -->
 <script>
    function adduser() {
    let username = $("#username").val();
    let password = $("#password").val();
    let usertype = $("#usertype").val();
    let nickname = $("#nickname").val();
    let fullname = $("#fullname").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let address = $("#address").val();

    const usernameRegex = /^[a-zA-Z0-9@.]+$/;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Basic email format validation

    if (username === "" || password === "" || usertype === "" || nickname === "" || fullname === "" || email === "" || phone === "") {
        Swal.fire({
            icon: 'warning',
            title: 'Missing Information',
            text: 'Please input all required data!',
        });
        return;
    }

    if (!usernameRegex.test(username)) {
        Swal.fire({
            icon: 'error',
            title: 'Invalid Username',
            text: 'Special characters are not allowed. Only "@" and "." are permitted.',
        });
        return;
    }

    if (password.length < 8) {
        Swal.fire({
            icon: 'error',
            title: 'Weak Password',
            text: 'Password must contain at least 8 characters!',
        });
        return;
    }

    if (!emailRegex.test(email)) {
        Swal.fire({
            icon: 'error',
            title: 'Invalid Email',
            text: 'Please enter a valid email address!',
        });
        return;
    }

    $.ajax({
        url: 'users/savenewuser.php',
        method: 'POST',
        data: {
            usertype: usertype,
            username: username,
            password: password,
            nickname: nickname,
            fullname: fullname,
            email: email,
            phone: phone,
            address: address
        },
        success: function(response) {
            if (response.includes("success")) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'New user saved successfully!',
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: response,
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Request Failed',
                text: 'An error occurred: ' + error,
            });
        }
    });
}

 </script>

</body>

</html>