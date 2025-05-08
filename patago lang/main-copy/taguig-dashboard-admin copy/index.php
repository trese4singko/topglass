<?php
include_once("connection.php");
include_once("../../main/functions.php");
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['usertype'])) {
  header('Location: ../../../index.php'); // Redirect to login page if not logged in
  exit();
}

$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';

// Redirect if the user is not 'admin' or 'taguig admin'
if ($usertype !== 'admin' && $usertype !== 'Taguig Admin') {
  header('Location: ../../../index.php');
  exit();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taguig Main Page Branhces</title>

  <link rel="stylesheet" href="taguig_css/tg_release_tbl.css">
  <link rel="shortcut icon" href="img/side.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
 
</head>

<body>

  <div class="box">
    <div class="content">
      <img src="taguig_css\logo-remove-bg.png" alt="Site Logo" class="site-logo">
      <h6>TOP GLASS ALUMINUM CENTER</h6>
    </div>
    <h4 class="sidebar-welcome" >Welcome, <?php echo $username; ?>!</h4>
  </div>

  </div>

  <aside class="sidebar">
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
          <a href="?page=taguig_dashboard" class="nav-link">
            <span class="nav-icon material-symbols-rounded">dashboard</span>
            <span class="nav-label">Taguig Dashboard</span>
          </a>
          <span class="nav-tooltip">Taguig Dashboard</span>
        </li>

        <li class="nav-item">
          <a href="?page=taguig_table_products" class="nav-link ">
            <i class="fa-solid fa-location-dot dotted"></i>
            <span class="nav-label">Taguig Products</span>
          </a>
          <span class="nav-tooltip">Taguig Products</span>
        </li>
        <li class="nav-item">
          <a href="?page=taguig_add_products" class="nav-link ">
            <i class="fa-solid fa-box-open dotted"></i>
            <span class="nav-label">Add Products</span>
          </a>
          <span class="nav-tooltip">Add Products</span>
        </li>

        <li class="nav-item">
          <a href="?page=taguig_release_product" class="nav-link ">
            <i class="fa-solid fa-dollar-sign dotted"></i>
            <span class="nav-label">Release Products</span>
          </a>
          <span class="nav-tooltip">Release Products</span>
        </li>

        <li class="nav-item">
          <a href="?page=taguig_records" class="nav-link ">
            <i class="fa-solid fa-clock-rotate-left dotted"></i>
            <span class="nav-label">Records </span>
          </a>
          <span class="nav-tooltip">Records </span>
        </li>
        <li class="nav-item">
          <a href="../chat/chat.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">Chat</span>
            <span class="nav-label">Chat</span>
          </a>
          <span class="nav-tooltip">Chat</span>
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

        <li class="nav-item">
          <a href="../logout.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">logout</span>
            <span class="nav-label">Logout</span>
          </a>
          <span class="nav-tooltip">Logout</span>
        </li>
      </ul>
    </nav>
  </aside>
  </div>

  <div class="main">
    <br><br><br>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    switch ($page) {

      case 'taguig_dashboard':
        include 'tg_dashboard.php';
        break;

      case 'taguig_table_products':
        include 'tg_product_tbl.php';
        break;

      case 'taguig_add_products':
        include 'tg_add_prod.php';
        break;

      case 'taguig_release_product':
        include 'tg_release_prod.php';
        break;

      case 'taguig_records':
        include 'tg_release_rec.php';
        break;


      default:
        echo "<br>  ";
        break;
    }
    ?>
  </div>
  <script src="taguig_js/jquery.js"></script>
  <script src="taguig_js/main.js"></script>
</body>

</html>