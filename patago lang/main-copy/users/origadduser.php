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
    <title>Add User  </title>  
    <link rel="stylesheet" href="users\css\addusers.css">  
</head>  
<body>  
    <div class="bloom-container">  
        <div class="nebula-title">Add New Admin</div>  
       <div class="form">
            
<!-- Product Category -->  
            <div class="nova-input" >  
                <span class="comet-details">User Type</span>  
                <select name="usertype"  class="usertype" id="usertype" require >  
                    <option value="">Please Select</option>  
                    <option value="Taguig Admin">Taguig Admin</option>  
                    <option value="Makati Admin">Makati Admin</option>  
                    <option value="Pampanga Admin">Pampanga Admin</option>  
                </select>  
            </div>  

            <!-- Product Name -->  
            <div class="nova-input">  
                <span class="comet-details" require> Enter User Name</span>  
                <input type="text" name="username" placeholder="Enter your desire username " class="username" id="username" require>  
            </div>  

             <!-- Product size -->  
            <div class="nova-input">  
                <span class="comet-details" require>Enter Password</span>  
                <input type="text" name="password" placeholder="Enter password" class="password" id="password"  >  
            </div> 

            <!-- Product Price -->  
            <div class="nova-input">  
                <span class="comet-details"> Name branch admin</span>  
                <input type="text" name="fullname" class="fullname" id="fullname" placeholder="Branch Admin" require>  
            </div>  

            <!-- Product Quantity on hand -->  
            <div class="nova-input">  
                <span class="comet-details">Email Account</span>  
                <input type="email" name="email"  class="email" id="email" placeholder="email"   >  
            </div>   

         <!-- Product Quantity on hand -->  
            <div class="nova-input">  
                <span class="comet-details">Contact Number  </span>  
                <input type="number" name="phone"  class="phone" id="phone" placeholder="Enter Contact Number" require>  
            </div>  
             
              <!-- Product Quantity on hand -->  
            <div class="nova-input">  
                <span class="comet-details"> Address  </span>  
                <input type="text" name="address"  class="address" id="address" placeholder="Optional"  >  
            </div> 

            <!-- Submit Button -->  
            <div class="star-button" id="addbutton" onclick="adduser()">  
                <input type="submit"  value="Save New User">  
            </div>  
        
        </div>  
    </div>  
    <script src="users\js\jquery.js"></script>
    <script src="users\js\sweetalert.js"></script>
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
        Swal.fire({
            icon: 'warning',
            title: 'Missing Information',
            text: 'Please input all required data!'
        });
        return; // Exit the function
    }

    // Validate username to disallow special characters (except . and @)
    if (!usernameRegex.test(username)) {
        Swal.fire({
            icon: 'error',
            title: 'Invalid Username',
            text: 'Special characters are not allowed. Only "@" and "." are permitted.'
        });
        return; // Exit the function
    }

    // Check password length
    if (password.length < 8) {
        Swal.fire({
            icon: 'error',
            title: 'Weak Password',
            text: 'Password must contain at least 8 characters!'
        });
        return; // Exit the function
    }

    // Proceed with AJAX request
    $.ajax({
        url: 'origsavenewuser.php',
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
        dataType: 'json', // Expect JSON response
        success: function(response) {
            if (response.status === "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message
                }).then(() => {
                    location.reload(); // Reload the page after successful save
                });
            } else if (response.status === "error") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'AJAX Error',
                text: 'An error occurred: ' + error
            });
        }
    });
}
</script>

</body>  
</html>  
