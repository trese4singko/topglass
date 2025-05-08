<?php
session_set_cookie_params(0); // Set to expire on browser close
session_start();

include_once 'main/connection.php'; // Adjust if your path is different

if (isset($_SESSION['userid']) && isset($_SESSION['session_token'])) {
    $userid = $_SESSION['userid'];
    $session_token = $_SESSION['session_token'];

    // Check if session exists in both tables
    $result1 = mysqli_query($con, "SELECT session_token FROM usertb WHERE userid = '$userid'");
    $row1 = mysqli_fetch_assoc($result1);

    $result2 = mysqli_query($con, "SELECT session_token FROM backup_acc WHERE userid = '$userid'");
    $row2 = mysqli_fetch_assoc($result2);

    // If session_token mismatched in both tables, clear session
    if ($row1['session_token'] !== $session_token && $row2['session_token'] !== $session_token) {
        session_unset();
        session_destroy();

        // Clear session token in the database
        if (!mysqli_query($con, "UPDATE usertb SET session_token = NULL WHERE userid = '$userid'")) {
            error_log("Error updating usertb: " . mysqli_error($con));
        }

        // if (!mysqli_query($con, "UPDATE backup_acc SET session_token = NULL WHERE userid = '$userid'")) {
        //     error_log("Error updating backup_acc: " . mysqli_error($con));
        // }

    } else {
        // If session is valid, redirect to the main page
        header("Location: main/index.php?page=branch-analysis");  // Adjust this path to your main page
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="main/css/main/login.css">

    <link rel="shortcut icon" href="main/img/side.png" type="image/x-icon">
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
                        <div id="lockout-timer" style="color: red; text-align:center; display: none; margin-bottom: 10px;"></div>
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
        // login.js
        document.querySelector("form").addEventListener("submit", function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("main/login_process-SA.php", {
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
                            localStorage.setItem("session_token", data.session_token); // Store session token
                        }
                        localStorage.removeItem("lockout_expiry");
                        localStorage.setItem("isLoggedIn", "true"); // User is logged in

                        Swal.fire({
                            icon: 'success',
                            title: 'Welcome Admin!',
                            text: 'Good Day Super Admin!',
                            confirmButtonText: 'Proceed',
                        }).then(result => {
                            if (result.isConfirmed) {
                                window.location.href = data.redirect; // Redirect to the specified page
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
                            title: 'Access Denied. This link is allowed for Super admin only.',
                            text: data.message,
                        });
                    } else if (data.status === "locked") {
                        const duration = data.lockout_remaining || 300;
                        localStorage.setItem("lockout_expiry", Date.now() + duration * 1000);
                        showLockoutModal(duration);
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

        // Show/hide password functionality
        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordField = document.getElementById('password');
            passwordField.type = this.checked ? 'text' : 'password';
        });

        // Lockout modal for too many failed attempts
        function startLockoutTimer(duration) {
            const display = document.getElementById("lockout-timer");
            const loginButton = document.getElementById("btnlogin");
            let timer = duration;
            display.style.display = "block";
            loginButton.disabled = true;

            const interval = setInterval(() => {
                display.textContent = `Login locked. Try again in ${timer} seconds`;
                if (--timer < 0) {
                    clearInterval(interval);
                    display.style.display = "none";
                    loginButton.disabled = false;
                    localStorage.removeItem("lockout_expiry");
                }
            }, 1000);
        }

        function showLockoutModal(duration) {
            let remaining = duration;

            Swal.fire({
                icon: 'error',
                title: 'Page Locked Due to Multiple Failed Attempts',
                html: `<b>Login locked</b><br>Please wait <b><span id="countdown">${remaining}</span> seconds</b>`,
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    const countdownEl = Swal.getHtmlContainer().querySelector('#countdown');
                    const interval = setInterval(() => {
                        remaining--;
                        countdownEl.textContent = remaining;
                        if (remaining <= 0) {
                            clearInterval(interval);
                            Swal.close();
                        }
                    }, 1000);
                }
            });

            startLockoutTimer(duration);
        }

        // Check lockout status
        window.addEventListener("DOMContentLoaded", () => {
            const expiry = localStorage.getItem("lockout_expiry");
            if (expiry) {
                const remaining = Math.floor((expiry - Date.now()) / 1000);
                if (remaining > 0) {
                    showLockoutModal(remaining);
                    startLockoutTimer(remaining);
                } else {
                    localStorage.removeItem("lockout_expiry");
                }
            }
        });
    </script>
</body>

</html>