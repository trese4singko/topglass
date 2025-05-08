<?php
session_start();

if (isset($_SESSION['userid']) && isset($_SESSION['session_token'])) {
    header("Location: makati/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="makati/css/login.css">
    <link rel="shortcut icon" href="taguig_css/side.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="content">
                <div class="forimage">
                    <div class="logo">
                        <img src="main/img/logo.png" alt="logo" class="logo">
                    </div>
                </div>

                <div class="texts">
                    <h2>
                        Welcome To <br> TopGlass Aluminum Center!
                        <br>
                        EXCLUSIVE ONLY <br> FOR ADMIN
                    </h2>
                    <form class="user" method="POST" autocomplete="off">
                        <div class="form-group">
                            <input type="text" class="username both" id="username" name="username" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="password both" name="password" id="password" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" id="showPassword">
                                <label for="showPassword"></label>
                            </div>
                        </div>
                        <div class="forbuttonlogin">
                            <button type="submit" id="btnlogin" class="btnlogin">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        document.querySelector("form").addEventListener("submit", function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const storedToken = localStorage.getItem("session_token");
            if (storedToken) formData.append("session_token", storedToken);

            fetch("login_process.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "already_logged_in") {
                        Swal.fire({
                            icon: "warning",
                            title: "Already Logged In",
                            text: data.message || "Your account is already active on another device.",
                            confirmButtonText: "OK"
                        });
                    } else if (data.status === "success" && data.redirect) {
                        if (data.session_token) {
                            localStorage.setItem("session_token", data.session_token);
                        }
                        Swal.fire({
                            icon: 'success',
                            title: 'Welcome Admin!',
                            text: 'Good Day Makati Admin!',
                            confirmButtonText: 'Proceed',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = data.redirect;
                            }
                        });
                    } else if (data.status === "invalid") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: data.message,
                        });
                    } else if (data.status === "unauthorized") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Access Denied',
                            text: data.message,
                        });
                    }
                })
                .catch(error => {
                    console.error("Error during login:", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Something went wrong. Please try again later.',
                    });
                });
        });

        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordField = document.getElementById('password');
            passwordField.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>

</html>
