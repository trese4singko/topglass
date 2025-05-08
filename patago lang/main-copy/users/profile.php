<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure the user is logged in
if (!isset($_SESSION['usertype']) || !isset($_SESSION['userid'])) {
    header('Location: ../index.php');
    exit();
}

// Only allow admin access
if ($_SESSION['usertype'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}
$nickname = isset($_SESSION['nickname']) ? htmlspecialchars($_SESSION['nickname']) : 'Guest';

include_once("connection.php");

// Get current user's ID from session
$id = $_SESSION['userid'];

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
    <title>Update My Account</title>
    <link rel="stylesheet" href="css/edit_user.css">
    <link rel="shortcut icon" href="img/side.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded">
</head>

<body>
    <div class="box">
        <div class="content">
            <img src="css/logo-remove-bg.png" alt="Site Logo" class="site-logo">
            <h6>TOP GLASS ALUMINUM CENTER</h6>
        </div>
    </div>

    <aside class="sidebar">
        <header class="sidebar-header" style=" background-color: black; ">
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
                    <a href="../index.php?page=branch-analysis" class="nav-link">
                        <i class="fa-solid fa-backward"></i>
                        <span class="nav-label">Back to Home</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <div class="center-container">
        <div class="main">
            <div class="bloom-container">
                <div class="nebula-title">Update My Account</div>
                <form id="updateForm">
                    <div class="form">
                        <div class="half">
                            <div class="una">
                                <div class="nova-input">
                                    <span class="comet-details">User Type</span>
                                    <select name="usertype" id="usertype" disabled>
                                        <option value="">Please Select</option>
                                        <option value="admin" <?php if ($usertype == "admin") echo 'selected'; ?>>Super Admin</option>
                                        <option value="Taguig Admin" <?php if ($usertype == "Taguig Admin") echo 'selected'; ?>>Taguig Admin</option>
                                        <option value="Makati Admin" <?php if ($usertype == "Makati Admin") echo 'selected'; ?>>Makati Admin</option>
                                        <option value="Pampanga Admin" <?php if ($usertype == "Pampanga Admin") echo 'selected'; ?>>Pampanga Admin</option>
                                    </select>
                                </div>

                                <div class="nova-input">
                                    <span class="comet-details">Username</span>
                                    <input type="text" name="username" id="username" value="<?php echo $username; ?>">
                                </div>

                                <div class="nova-input">
                                    <span class="comet-details">Password</span>
                                    <input type="text" name="password" id="password" value="<?php echo $password; ?>">
                                </div>

                                <div class="nova-input">
                                    <span class="comet-details">Nickname</span>
                                    <input type="text" name="nickname" id="nickname" value="<?php echo $nickname; ?>">
                                </div>
                            </div>

                            <div class="2nd">
                                <div class="nova-input">
                                    <span class="comet-details">Full Name</span>
                                    <input type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>">
                                </div>

                                <div class="nova-input">
                                    <span class="comet-details">Email</span>
                                    <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                                </div>

                                <div class="nova-input">
                                    <span class="comet-details">Phone</span>
                                    <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
                                </div>

                                <div class="nova-input">
                                    <span class="comet-details">Address</span>
                                    <input type="text" name="address" id="address" value="<?php echo $address; ?>">
                                </div>

                                <div class="star-button">
                                    <input type="submit" value="Update My Account">
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

    <script>
        $(document).ready(function () {
            $("#updateForm").on("submit", function (event) {
                event.preventDefault();

                let id = "<?php echo $id; ?>";
                let username = $("#username").val();
                let password = $("#password").val();
                let usertype = $("#usertype").val();
                let nickname = $("#nickname").val();
                let fullname = $("#fullname").val();
                let email = $("#email").val();
                let phone = $("#phone").val();
                let address = $("#address").val();

                if (!username || !password || !usertype || !email || !phone || !address) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Missing Data',
                        text: 'Please input all important data.'
                    });
                } else if (password.length < 8) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Password Too Short',
                        text: 'Password must be at least 8 characters long.'
                    });
                } else {
                    $.ajax({
                        url: "update_user.php",
                        method: "POST",
                        data: {
                            id: id,
                            username: username,
                            password: password,
                            usertype: usertype,
                            nickname: nickname,
                            fullname: fullname,
                            email: email,
                            phone: phone,
                            address: address
                        },
                        success: function (response) {
                            if (response.trim() === "Record Updated!") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Your account has been updated.'
                                }).then(() => {
                                    window.location.href = "../index.php";
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Update Failed',
                                    text: response
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Server Error',
                                text: 'An error occurred while processing the request.'
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
} else {
    echo "User record not found.";
}
?>
