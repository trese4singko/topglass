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
if ($_SESSION['usertype'] !== 'admin') {
    // Redirect to a page indicating no access, or an error page
    header('Location:  ../index.php');
    exit();
}

$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
$nickname = isset($_SESSION['nickname']) ? htmlspecialchars($_SESSION['nickname']) : 'Guest';
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once("connection.php");

    $searchquery = mysqli_query($con, "SELECT * FROM usertb WHERE userid ='$id'");
    if (mysqli_num_rows($searchquery) > 0) {
        $row = mysqli_fetch_array($searchquery);

        $username = $row["username"];
        $password = $row["p1"];
        $usertype = $row["usertype"];
        $nickname = $row["nickname"];
        $fullname = $row["fullname"];
        $email = $row["email"];
        $phone = $row["phone"];
        $address = $row["address"];
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Updating Products</title>

            <link rel="stylesheet" href="css/edit_user.css">
            <link rel="shortcut icon" href="img/side.png" type="image/x-icon">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
                integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
        </head>

        <body>
            <div class="box">
                <div class="content">
                    <img src="css/logo-remove-bg.png" alt="Site Logo" class="site-logo">
                    <h6>TOP GLASS ALUMINUM CENTER</h6>
                    <div class="icons">
                        <!-- Notification, Chat, and Personal Icons -->
                    </div>
                </div>
            </div>

            <aside class="sidebar"> <!-- Sidebar header -->
                <header class="sidebar-header">
                    <button class="toggler sidebar-toggler">
                        <span class="material-symbols-rounded">chevron_left</span>
                    </button>

                    <button class="toggler menu-toggler">
                        <span class="material-symbols-rounded">menu</span>
                    </button>

                </header>
                <nav class="sidebar-nav">
                    <ul class="nav-list primary-nav">

                        <li class="nav-item">
                            <a href="../index.php" class="nav-link ">
                                <i class="fa-solid fa-backward"></i>
                                <span class="nav-label">Back to Home</span>
                            </a>
                            <span class="nav-tooltip">Back to Home</span>
                        </li>
                    </ul>

                    <ul class="nav-list secondary-nav">
                    </ul>
                </nav>
            </aside>
            <div class="center-container">
                <div class="main">
                    <div class="bloom-container">
                        <div class="nebula-title">Update User Branch</div>
                        <form id="updateForm">
                            <div class="form">
                                <div class="half">
                                    <div class="una">
                                        <div class="nova-input">
                                            <div class="nova-input">
                                                <span class="comet-details">User Type</span>
                                                <select name="usertype" class="usertype" id="usertype" required>
                                                    <option value="">Please Select</option>
                                                    <option value="admin" <?php if ($usertype == "admin")
                                                        echo 'selected'; ?>>Super Admin</option>
                                                          <option value="Taguig Admin" <?php if ($usertype == "Taguig Admin")
                                                        echo 'selected'; ?>>Taguig Admin</option>
                                                    <option value="Makati Admin" <?php if ($usertype == "Makati Admin")
                                                        echo 'selected'; ?>>Makati Admin</option>
                                                    <option value="Pampanga Admin" <?php if ($usertype == "Pampanga Admin")
                                                        echo 'selected'; ?>>Pampanga Admin</option>
                                                </select>
                                            </div>
                                            <span class="comet-details">Username</span>
                                            <input type="text" name="username" class="username" id="username"
                                                value="<?php echo $username; ?>">
                                        </div>
                                        <div class="nova-input">
                                            <span class="comet-details">Password</span>
                                            <input type="text" name="password" class="password" id="password"
                                                value="<?php echo $password; ?>">
                                        </div>

                                        <div class="nova-input">
                                            <span class="comet-details">Nickname</span>
                                            <input type="text" name="nickname" class="nickname" id="nickname"
                                                value="<?php echo $nickname; ?>">
                                        </div>
                                    </div>
                                    <div class="2nd">
                                        <div class="nova-input">
                                            <span class="comet-details">Full Name</span>
                                            <input type="text" name="fullname" class="fullname" id="fullname"
                                                value="<?php echo $fullname; ?>">
                                        </div>
                                        <div class="nova-input">
                                            <span class="comet-details">Email</span>
                                            <input type="text" name="email" class="email" id="email"
                                                value="<?php echo $email; ?>">
                                        </div>
                                        <div class="nova-input">
                                            <span class="comet-details">Phone</span>
                                            <input type="text" name="phone" class="phone" id="phone"
                                                value="<?php echo $phone; ?>">
                                        </div>
                                        <div class="nova-input">
                                            <span class="comet-details">Address</span>
                                            <input type="text" name="address" class="address" id="address"
                                                value="<?php echo $address; ?>">
                                        </div>
                                        <div class="star-button" id="updatebutton" edit_id="<?php echo $id; ?>">
                                            <input type="submit" value="Update User Branch">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="js/jquery.js"></script>
            <script src="js/sweetalert.js"></script>
        
            <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> Use SweetAlert2 CDN -->
            <script>
                $(document).ready(function () {
                    $("#usertype").on("change", function () {
                        let selectedBranch = $(this).val();
                        if (selectedBranch === "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Please select a branch.',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                            $(this).val("");
                        }
                    });

                    $("#updateForm").on("submit", function (event) {
                        event.preventDefault(); // Prevent default form submission
                        let id = $("#updatebutton").attr("edit_id");
                        let username = $("#username").val();
                        let password = $("#password").val();
                        let usertype = $("#usertype").val();
                        let nickname = $("#nickname").val();
                        let full_name = $("#fullname").val();
                        let email = $("#email").val();
                        let phone = $("#phone").val();
                        let address = $("#address").val();

                        if (
                            username === "" ||
                            password === "" ||
                            usertype === "" ||
                            email === "" ||
                            phone === "" ||
                            address === ""
                        ) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Missing Data',
                                text: 'Please input all important data.',
                                confirmButtonColor: '#d33'
                            });
                        } else if (password.length < 8) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Password Too Short',
                                text: 'Password must be at least 8 characters long.',
                                confirmButtonColor: '#f39c12'
                            });
                        } else {
                            $.ajax({
                                url: "update_user.php",
                                method: "POST",
                                data: {
                                    username: username,
                                    password: password,
                                    usertype: usertype,
                                    nickname: nickname,
                                    fullname: full_name,
                                    email: email,
                                    phone: phone,
                                    address: address,
                                    id: id
                                },
                                success: function (response) {
                                    if (response.trim() === "Record Updated!") {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'User record has been updated.',
                                            confirmButtonColor: '#28a745'
                                        }).then(() => {
                                            window.location.href = "../index.php?page=users-only";
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Update Failed',
                                            text: response,
                                            confirmButtonColor: '#d33'
                                        });
                                    }
                                },
                                error: function () {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Server Error',
                                        text: 'An error occurred while processing the request.',
                                        confirmButtonColor: '#d33'
                                    });
                                }
                            });
                        }
                    });
                });
            </script>


        </body>

        </html>
        <?php
    }
}
?>