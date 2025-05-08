<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// // Check if the user is logged in
// if (!isset($_SESSION['usertype'])) {
//     header('Location: ../../index.php'); // Redirect to login page if not logged in
//     exit();
// }

// // Check if the user is Makati Admin
// if ($_SESSION['usertype'] !== 'Admin') {
//     // Redirect to a page indicating no access, or an error page
//     header('Location: ../../index.php'); 
//     exit();
// }

// $usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once("connection.php");

    $searchquery = mysqli_query($con, "SELECT * FROM mkt_add_prod_data WHERE product_id='$id'");
    if (mysqli_num_rows($searchquery) > 0) {
        $row = mysqli_fetch_array($searchquery);

        $Productname = $row["name"];
        $size = $row["size"];
        $price = $row["price"];
        $quantityonhand = $row["quantity_on_hand"];
        $category = $row["category"];
        $status = $row["status"];
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css\mkt_viewprod.css">
            <link rel="stylesheet" href="css\mkt_viewprod2.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
            <title>View Product Item</title>
        </head>
        <body>
        <?php
 
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
 
// // Check if the user is logged in
// if (!isset($_SESSION['usertype'])) {
//     header('Location: ../../index.php'); // Redirect to login page if not logged in
//     exit();
// }
// $usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
?>	
        <!DOCTYPE html>
        
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Main Page Brances</title>
            <link rel="stylesheet" href="taguig_css\edit.css">
            <link rel="stylesheet" href="taguig_css\tg_view1.css">
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
        <div class="icons">
            <div class="notification-icon" onclick="showNotification()">
                <span class="icon">&#128276;</span> <!-- Bell icon -->
                <span class="badge">3</span> <!-- Notification count -->
                <div class="notification-dropdown" id="notificationDropdown">
                    <div class="notification-item">New order received.</div>
                    <div class="notification-item">Meeting scheduled at 3 PM.</div>
                    <div class="notification-item">Payment reminder.</div>
                </div>
            </div>
            <div class="chat-icon" onclick="openChat()">
                <span class="icon">&#128172;</span> <!-- Chat icon -->
                <div class="chat-dropdown" id="chatDropdown">
                    <div class="chat-item">John: Can you send the report?</div>
                    <div class="chat-item">Emily: Let's discuss the project tomorrow.</div>
                    <div class="chat-item">Paul: I need your feedback on the design.</div>
                </div>
            </div>
            <div class="personal-icon" onclick="toggleDropdown()">
                <span class="icon">&#128100;</span> <!-- Person icon -->
                <span class="welcome-message">Welcome admin!</span> <!-- Welcome message -->
                <div class="dropdown-content" id="personalDropdown">
                    <div class="dropdown-item">Profile</div>
                    <div class="dropdown-item">Information</div>
                </div>
            </div>
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
      <!-- Primary top nav -->
      <ul class="nav-list primary-nav">
        <!-- <li class="nav-item">
          <a href="?page=taguig_dashboard" class="nav-link">
            <span class="nav-icon material-symbols-rounded">dashboard</span>
            <span class="nav-label">Taguig Dashboard</span>
          </a>
          <span class="nav-tooltip">Taguig Dashboard</span>
        </li> -->

        <!-- <li class="nav-item">
          <a href="?page=taguig-products" class="nav-link ">
            <i class="fa-solid fa-location-dot dotted"></i>
            <span class="nav-label">Taguig Products</span>
          </a>
          <span class="nav-tooltip">Taguig Products</span>
        </li> -->

        <!-- <li class="nav-item">
          <a href="?page=add-products" class="nav-link ">
            <i class="fa-solid fa-box-open dotted"></i>
            <span class="nav-label">Add Products</span>
          </a>
          <span class="nav-tooltip">Add Products</span>
        </li> -->

        <!-- <li class="nav-item">
          <a href="?page=release_product" class="nav-link ">
            <i class="fa-solid fa-dollar-sign dotted"></i>
            <span class="nav-label">Release Products</span>
          </a>
          <span class="nav-tooltip">Release Products</span>
        </li> -->

        <!-- <li class="nav-item">
          <a href="?page=records" class="nav-link ">
            <i class="fa-solid fa-clock-rotate-left dotted"></i>
            <span class="nav-label">Records </span>
          </a>
          <span class="nav-tooltip">Records </span>
        </li> -->

        <li class="nav-item">
          <a href="makati_main.php?page=makati_products" class="nav-link ">
            <i class="fa-solid fa-backward"></i>
            <span class="nav-label"> Back to Product Tables </span>
          </a>
          <span class="nav-tooltip"> Back to Product Tables </span>
        </li>

      </ul>
      <!-- Secondary bottom nav -->
      <ul class="nav-list secondary-nav">

        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <span class="nav-icon material-symbols-rounded">account_circle</span>
            <span class="nav-label">Profile</span>
          </a>
          <span class="nav-tooltip">Profile</span>
        </li> -->

        <!-- <li class="nav-item">
          <a href="../logout.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">logout</span>
            <span class="nav-label">Logout</span>
          </a>
          <span class="nav-tooltip">Logout</span>
        </li> -->

      </ul>
    </nav>
  </aside>
  </div>

    <div class="parent">
    <div class="container">
        <h1>View Item</h1>

        <label for="">Product name: </label>
        <p><?php echo $Productname; ?></p>

        <label for="">Product size: </label>
        <p><?php echo $size; ?></p>

        <label for="">Product price: </label>
        <p><?php echo $price; ?></p>

        <label for="">Product Quantity: </label>
        <p><?php echo $quantityonhand; ?></p>

        <label for="">Product Category: </label>
        <p><?php echo $category; ?></p>

        <label for="">Product Status: </label>
        <p><?php echo $status; ?></p>

        <div>
            <button class="update" onclick="window.location.href='makati_edit_prod.php?id=<?php echo ($id); ?>';">
                Update
            </button>
            <button class="print">Print</button>
            
        </div>
    </div>
</div>
        <script src="js/foredit.js"></script>

</body>
</html>
<?php
    }
}
?>