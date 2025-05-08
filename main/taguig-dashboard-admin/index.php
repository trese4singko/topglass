<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include('connection.php');
if (!isset($_SESSION['usertype'])) {
  header('Location:  ../index.php');
  exit();
}

switch ($_SESSION['usertype']) {
  case 'admin':
    // Stay on the current page or continue loading
    break;
  case 'Taguig Admin':
    header('Location: taguig-dashboard-admin/index.php?page=taguig_dashboard');
    exit();
  case 'Makati Admin':
    header('Location: ../makati/index.php?page=makati_dashboard');
    exit();
  case 'Pampanga Admin':
    header('Location: ../pampanga/index.php?page=pampanga_dashboard');
    exit();
  default:
    header('Location: ../index.php');
    exit();
}
$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
$nickname = isset($_SESSION['nickname']) ? htmlspecialchars($_SESSION['nickname']) : 'Guest';
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';

//=========================================================================================//

$loginQuery = "SELECT * FROM taguig_activity_logs WHERE action = 'Login' ORDER BY timestamp DESC LIMIT 5";
$loginResult = mysqli_query($con, $loginQuery);
$loginHistory = mysqli_fetch_all($loginResult, MYSQLI_ASSOC);

$productQuery = "SELECT * FROM taguig_activity_logs WHERE action = 'Add Item' ORDER BY timestamp DESC LIMIT 5";
$productResult = mysqli_query($con, $productQuery);
$productHistory = mysqli_fetch_all($productResult, MYSQLI_ASSOC);

$removeQuery = "SELECT * FROM taguig_activity_logs WHERE action = 'Remove Item' ORDER BY timestamp DESC LIMIT 5";
$removeResult = mysqli_query($con, $removeQuery);
$removeHistory = mysqli_fetch_all($removeResult, MYSQLI_ASSOC);

$updateQuery = "SELECT * FROM taguig_activity_logs WHERE action = 'Update Item' ORDER BY timestamp DESC LIMIT 5";
$updateResult = mysqli_query($con, $updateQuery);
$updateHistory = mysqli_fetch_all($updateResult, MYSQLI_ASSOC);

$viewQuery = "SELECT * FROM taguig_activity_logs WHERE action = 'View Item' ORDER BY timestamp DESC LIMIT 5";
$viewResult = mysqli_query($con, $viewQuery);
$viewHistory = mysqli_fetch_all($viewResult, MYSQLI_ASSOC);

// Fetching view customer logs
$viewCustomerQuery = "SELECT * FROM taguig_activity_logs WHERE action = 'View Customer' ORDER BY timestamp DESC LIMIT 5";
$viewCustomerResult = mysqli_query($con, $viewCustomerQuery);
$viewCustomerHistory = mysqli_fetch_all($viewCustomerResult, MYSQLI_ASSOC);

// Merging all notifications
$notifications = array_merge($loginHistory, $productHistory, $removeHistory, $updateHistory, $viewHistory, $viewCustomerHistory);

usort($notifications, function ($a, $b) {
  return strtotime($b['timestamp']) - strtotime($a['timestamp']);
});

$unreadCountResult = mysqli_query($con, "SELECT COUNT(*) AS total FROM activity_logs WHERE is_viewed = FALSE");
$unreadCountRow = mysqli_fetch_assoc($unreadCountResult);
$unreadCount = $unreadCountRow['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taguig Main Page Branches</title>

  <link rel="stylesheet" href="taguig_css/tg_release_tbl.css">
  <link rel="stylesheet" href="taguig_css/notification.css">
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
      <img src="taguig_css/logo-remove-bg.png" alt="Site Logo" class="site-logo">
      <h6>TOP GLASS ALUMINUM CENTER</h6>
    </div>
    <h4 class="sidebar-welcome">Welcome, <?php echo $username; ?>!</h4>

    <div class="space">
      <div class="notifications-icon" onclick="toggleNotifications()">
        <i class="fa fa-bell"></i>
        <span class="badge"><?php echo $unreadCount; ?></span>
      </div>

      <div id="notificationsDropdown" class="notifications-dropdown">
        <ul>
          <?php if (!empty($notifications)): ?>
            <?php foreach ($notifications as $log): ?>
              <li>
                <strong><?php echo $log['username']; ?></strong>
                <?php if ($log['action'] == 'Login'): ?>
                  logged in at <?php echo $log['timestamp']; ?>
                <?php elseif ($log['action'] == 'Add Item'): ?>
                  added a product: <?php echo $log['description']; ?> at <?php echo $log['timestamp']; ?>
                <?php elseif ($log['action'] == 'Remove Item'): ?>
                  removed a product: <?php echo $log['description']; ?> at <?php echo $log['timestamp']; ?>
                <?php elseif ($log['action'] == 'Update Item'): ?>
                  updated a product: <?php echo $log['description']; ?> at <?php echo $log['timestamp']; ?>
                <?php elseif ($log['action'] == 'View Item'): ?>
                  viewed a product: <?php echo $log['description']; ?> at <?php echo $log['timestamp']; ?>
                <?php elseif ($log['action'] == 'View Customer'): ?>
                  look a customer: <?php echo $log['description']; ?> at <?php echo $log['timestamp']; ?>
                <?php elseif ($log['action'] == 'Release Item'): ?>
                  released a product: <?php echo $log['description']; ?> at <?php echo $log['timestamp']; ?>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          <?php else: ?>
            <li>No activity found.</li>
          <?php endif; ?>
        </ul>
      </div>
    </div>

    <aside class="sidebar">
      <header class=" sidebar-header" style="background-color: black;">
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
            <a href="../index.php?page=branch-analysis" class="nav-link ">
              <i class="fa-solid fa-backward"></i>
              <span class="nav-label">Back to Branches </span>
            </a>
            <span class="nav-tooltip">Back to Branches </span>
          </li>
        </ul>
        <ul class="nav-list secondary-nav">
          <li class="nav-item">
            <a href="?page=act-history" class="nav-link ">
              <i class="fa-regular fa-clock"></i> <span class="nav-label">Taguig Branch Activity</span>
            </a>
            <span class="nav-tooltip">Taguig Branch Activity</span>
          </li>
          <li class="nav-item">
            <a href="../../chat/chat.php" class="nav-link">
              <span class="nav-icon material-symbols-rounded">Chat</span>
              <span class="nav-label">Chat</span>
            </a>
            <span class="nav-tooltip">Chat</span>
          </li>
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
        case 'act-history':
          include 'tg_history.php';
          break;
        default:
          echo "<br>  ";
          break;
      }
      ?>
    </div>

    <script>
      function toggleNotifications() {
        var dropdown = document.getElementById("notificationsDropdown");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";

        if (dropdown.style.display === "block") {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
              document.querySelector('.notifications-icon .badge').textContent = '0';
            }
          };
          xhr.send("markAsViewed=true");
        }
      }
      document.querySelector('.notifications-icon .badge').textContent = '0';
      document.querySelector('.notifications-icon .badge').style.display = 'none';

      document.addEventListener('DOMContentLoaded', function () {
        var unreadCount = <?php echo $unreadCount; ?>;
        var badge = document.querySelector('.notifications-icon .badge');
        if (badge) {
          badge.textContent = unreadCount;
        }
      });
    </script>

    <script src="taguig_js/jquery.js"></script>
    <script src="taguig_js/main.js"></script>
</body>

</html>