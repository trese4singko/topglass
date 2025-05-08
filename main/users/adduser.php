<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['usertype'])) {
    header('Location:  ../index.php'); // Redirect to login page if not logged in
    exit();
}

// Check if the user is Makati Admin
if ($_SESSION['usertype'] !== 'Taguig Admin') {
    // Redirect to a page indicating no access, or an error page
    header('Location:  ../index.php'); 
    exit();
}

$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
$nickname = isset($_SESSION['nickname']) ? htmlspecialchars($_SESSION['nickname']) : 'Guest';
?>
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Add User</title>  
    <link rel="stylesheet" href="css/addusers.css">  
</head>  
<body>  
    <div class="bloom-container">  
        <div class="nebula-title">Add Users</div>  

        <div class="form">
            <!-- Product Category -->
            <div class="nova-input">
                <span class="comet-details">User Type</span>
                <select name="usertype" class="usertype" id="usertype" required>
                    <option value="">Please Select</option>
                    <option value="Taguig Admin">Taguig Admin</option>
                    <option value="Makati Admin">Makati Admin</option>
                    <option value="Pampanga Admin">Pampanga Admin</option>
                </select>
            </div>

            <!-- Product Name -->
            <div class="nova-input">
                <span class="comet-details">Enter User Name</span>
                <input type="text" name="username" placeholder="Enter your desired username" class="username" id="username" required>
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

            <!-- Product Quantity on Hand -->
            <div class="nova-input">
                <span class="comet-details">Email Account</span>
                <input type="email" name="email" class="email" id="email" placeholder="email">
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
                <input type="submit" value="Save New User">
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script>
        function adduser() {
            let usertype = $("#usertype").val();
            let username = $("#username").val();
            let password = $("#password").val();
            let fullname = $("#fullname").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let address = $("#address").val();

            // Regular expression to allow only letters, numbers, @, and .
            const usernameRegex = /^[a-zA-Z0-9@.]+$/;

            // Check if all fields are empty
            if (usertype === "" || username === "" || password === "" || fullname === "" || email === "" || phone === "") {
                alert('Please input all required data!');
                return; // Exit the function
            }

            // Validate username to disallow special characters (except . and @)
            if (!usernameRegex.test(username)) {
                alert('Special characters are not allowed. Only "@" and "." are permitted.');
                return; // Exit the function
            }

            // Check password length
            if (password.length < 8) {
                alert('Password must contain at least 8 characters!');
                return; // Exit the function
            }

            // Proceed with AJAX request
            $.ajax({
                url: 'savenewuser.php',
                method: 'POST',
                data: {
                    usertype: usertype,
                    username: username,
                    password: password,
                    fullname: fullname,
                    email: email,
                    phone: phone,
                    address: address
                },
                success: function(response) {
                    if (response.includes("success")) {
                        alert("New user saved successfully!");
                        location.reload(); // Reload the page after successful save
                    } else {
                        alert(response); // Display any other response message
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        }
    </script>

</body>  
</html>
