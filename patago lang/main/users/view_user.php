
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
?><?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once("connection.php");

    $searchquery = mysqli_query($con, "SELECT * FROM usertb WHERE userid ='$id'");
    if (mysqli_num_rows($searchquery) > 0) {
        $row = mysqli_fetch_array($searchquery);

        $username = $row["username"];
        $password = $row["password"];
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
            <title>Main Page Brances</title>
            
            <link rel="stylesheet" href="css/view_user.css">
            <link rel="shortcut icon" href="img/side.png" type="image/x-icon">
            
            <!-- Linking Google fonts for icons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
            
        </head>

        <body>
        <div class="box">
            <div class="content">
        <img src="css\logo-remove-bg.png" alt="Site Logo" class="site-logo">
        <h6>TOP GLASS ALUMINUM CENTER</h6>
        </div>
    </div>
</div>

  <aside class="sidebar">
    <!-- Sidebar header -->
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
          <a href="..\index.php" class="nav-link ">
            <i class="fa-solid fa-backward"></i>
            <span class="nav-label"> Back to Home </span>
          </a>
          <span class="nav-tooltip"> Back to Home </span>
        </li>

      </ul>
      <ul class="nav-list secondary-nav">

      </ul>
    </nav>
  </aside>
  </div>

    <div class="parent">
    <div class="container">
        <h1>View Item</h1>

        <label for="">Username: </label>
        <p><?php echo $username; ?></p>

        <label for="">Password: </label>
        <p><?php echo $password; ?></p>

        <label for="">User Branch: </label>
        <p><?php echo $usertype; ?></p>

        <label for="">Nickname: </label>
        <p><?php echo $nickname; ?></p>

        <label for="">Full Name: </label>
        <p><?php echo $fullname; ?></p>

        <label for="">Email: </label>
        <p><?php echo $email; ?></p>

        <label for="">Phone: </label>
        <p><?php echo $phone; ?></p>

        <label for="">Address: </label>
        <p><?php echo $address; ?></p>

        <div>
            <button class="update" onclick="window.location.href='edit_user.php?id=<?php echo ($id); ?>';">
                Update
            </button>
            <!-- <button class="print">Print</button> -->
            
        </div>
    </div>
</div>
        <script src="js\foredit.js"></script>

</body>
</html>
<?php
    }
}
?>