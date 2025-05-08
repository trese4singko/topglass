<?php
include('connection.php');
include('tg_log_functions.php');
include('functions.php');

session_set_cookie_params(0); // 0 means until the browser is closed
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['usertype'])) {
  header('Location:  index.php');
  exit();
}

switch ($_SESSION['usertype']) {
  case 'Taguig Admin':
    break;

  // header('Location: ../index.php');
  // exit();
}
$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
$nickname = isset($_SESSION['nickname']) ? htmlspecialchars($_SESSION['nickname']) : 'Guest';
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';

//=========================================================================================//


include_once 'connection.php';  // Database connection
$timeout =  20; // 10 sec (in seconds)
$timeout_duration = 20; // 10 sec (in seconds)
$inactivity_limit = 1000; // 10 sec (in seconds)

if (isset($_SESSION['userid'])) {
  $userid = $_SESSION['userid'];

  $result = mysqli_query($con, "SELECT last_active FROM usertb WHERE userid = '$userid'");
  $row = mysqli_fetch_assoc($result);

  if ($row && isset($row['last_active'])) {
    $last_active_time = strtotime($row['last_active']);

    // Session expiry check
    if (time() - $last_active_time > $timeout_duration) {
      // Log out the user and clear session data
      mysqli_query($con, "UPDATE usertb SET session_token = NULL WHERE userid = '$userid'");
      session_unset();
      session_destroy();

      // Output JavaScript to show the modal
      echo "<script>
                window.onload = function() {
                    document.getElementById('logoutModal').style.display = 'block';  // Show the modal
                };
            </script>";

      // Redirect after a short delay to allow the modal to be visible
      header('Location: ../index.php?session=expired');  // Redirect to login page with expired session flag
      exit();
    }
  }

  if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactivity_limit) {
    mysqli_query($con, "UPDATE usertb SET session_token = NULL WHERE userid = '$userid'");
    session_unset();
    session_destroy();
    header('Location: ../index.php?session=expired');
    exit();
  }

  $_SESSION['last_activity'] = time();
  mysqli_query($con, "UPDATE usertb SET last_active = NOW() WHERE userid = '$userid'");
} else {
  header('Location: ../index.php');
  exit();
}


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

$viewCustomerQuery = "SELECT * FROM taguig_activity_logs WHERE action = 'View Customer' ORDER BY timestamp DESC LIMIT 5";
$viewCustomerResult = mysqli_query($con, $viewCustomerQuery);
$viewCustomerHistory = mysqli_fetch_all($viewCustomerResult, MYSQLI_ASSOC);

$releaseCustomerQuery = "SELECT * FROM taguig_activity_logs WHERE action = 'Release Item' ORDER BY timestamp DESC LIMIT 5";
$releaseCustomerResult = mysqli_query($con, $releaseCustomerQuery);
$releaseCustomerHistory = mysqli_fetch_all($releaseCustomerResult, MYSQLI_ASSOC);


$notifications = array_merge($loginHistory, $productHistory, $removeHistory, $updateHistory, $viewHistory, $viewCustomerHistory, $releaseCustomerHistory) ;

usort($notifications, function ($a, $b) {
  return strtotime($b['timestamp']) - strtotime($a['timestamp']);
});

$unreadCountResult = mysqli_query($con, "SELECT COUNT(*) AS total FROM taguig_activity_logs WHERE is_viewed = FALSE");
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
    <h4 class="sidebar-welcome">Welcome, <?php echo $username ?>!</h4>

    <div class="header-right">
      <div class="notifications-icon" onclick="toggleNotifications()">
        <i class="fa fa-bell"></i>
        <span class="badge"><?php echo $unreadCount; ?></span>
      </div>
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
                 <?php echo $log['description']; ?> at <?php echo $log['timestamp']; ?>
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

  
  <!-- for logout auto  -->
  <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      const sessionToken = sessionStorage.getItem("session_token");

      // If session token is not present, stop execution
      if (!sessionToken) {
        return;
      }

      // --- Heartbeat: Keep session alive every 10 seconds ---
      setInterval(() => {
        fetch("heartbeat.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            token: sessionToken,
          }),
        }).catch((error) => {
          console.error("Heartbeat failed:", error);
        });
      }, 10000);

      // --- Inactivity Timer with SweetAlert2 ---
      let inactivityTime = <?php echo $timeout; ?> * 1000; // Convert seconds to milliseconds
      // let inactivityTime = 30 * 1000; // 30 seconds
      let timeout;
      let inactiveFor = 0; // Time elapsed since last activity in seconds

      // Function to show SweetAlert when user has been inactive for 30 seconds
      function showInactivityAlert() {
        Swal.fire({
          title: 'Inactive for 30 seconds!',
          text: 'Due to inactivity, you will be redirected to the login page.',
          icon: 'warning',
          showCancelButton: false,
          confirmButtonText: 'OK',
          allowOutsideClick: false
        }).then((result) => {
          if (result.isConfirmed) {
            logout(); // Log out the user if they confirm the alert
          }
        });
      }

      // Function to log out the user and redirect to the login page
      function logout() {
        console.log("User is being logged out due to inactivity.");
        window.location.href = 'lgout.php'; // Redirect to login page
      }

      // Function to reset the timer whenever there is activity
      function resetTimer() {
        console.log("Resetting inactivity timer");
        clearTimeout(timeout);
        timeout = setTimeout(showInactivityAlert, inactivityTime); // Show alert after 30 seconds of inactivity
        inactiveFor = 0; // Reset inactive time
      }

      // Update inactivity time on each user activity (mouse move, key press, etc.)
      document.onmousemove = resetTimer;
      document.onkeypress = resetTimer;
      document.onclick = resetTimer;
      document.onscroll = resetTimer;

      // Start the inactivity timer initially
      timeout = setTimeout(showInactivityAlert, inactivityTime);

      // --- Unload & Beforeunload Events ---
      window.addEventListener("beforeunload", (event) => {
        console.log("User is about to leave the page.");

        if (sessionToken) {
          // This will prevent the page unload and prompt the user
          event.preventDefault();
          event.returnValue = "You are about to be logged out due to inactivity."; // Standard browser message

          // Trigger actions before unload (using sendBeacon)
          const data = new Blob([JSON.stringify({
            token: sessionToken
          })], {
            type: "application/json"
          });

          // Send data to backend before unloading
          navigator.sendBeacon("auto_logout.php", data);
          navigator.sendBeacon("cleanup_sessions.php", data);
          navigator.sendBeacon("logout_on_browser_close.php", data);
        }
      });

      window.addEventListener("unload", () => {
        if (sessionToken) {
          console.log("Cleaning up session before unload");
          navigator.sendBeacon("logout_on_browser_close.php");
        }
      });

      // Heartbeat and inactivity timer functionality is now merged.
    });
  </script> -->

  <script>
    // Inactivity timeout duration in seconds (30 seconds)
    const inactivityTimeout = 1000;
    let inactivityTimer;

    // Function to reset the inactivity timer
    function resetInactivityTimer() {
      clearTimeout(inactivityTimer);
      inactivityTimer = setTimeout(() => {
        // Show SweetAlert2 popup after 30 seconds of inactivity
        Swal.fire({
          title: 'Session Expired!',
          text: 'You have been inactive for too long. You will be logged out.',
          icon: 'warning',
          confirmButtonText: 'Okay'
        }).then((result) => {
          if (result.isConfirmed) {
            // Log the user out after closing the SweetAlert2 modal
            window.location.href = '../logout.php'; // Redirect to logout page
          }
        });
      }, inactivityTimeout * 1000); // 30 seconds in milliseconds
    }

    // Monitor user activity (mouse movements, keyboard presses)
    document.addEventListener('mousemove', resetInactivityTimer);
    document.addEventListener('keypress', resetInactivityTimer);

    // Initialize inactivity timer
    resetInactivityTimer();
  </script>
  
<!-- <script>

window.addEventListener('unload', function () {
    navigator.sendBeacon('logout-on-close.php');
});
</script> -->

  <!-- <script>
    let isNavigatingAway = false;

    window.addEventListener('beforeunload', function(e) {
      if (!isNavigatingAway) {
        navigator.sendBeacon('logout-on-close.php');
      }
    });

    // Flag navigation within site
    document.addEventListener('click', function(e) {
      const target = e.target.closest("a");
      if (target && target.href && target.origin === location.origin) {
        isNavigatingAway = true;
      }
    });
  </script> -->

  <!-- <script>
    let isNavigatingAway = false;

    // Detect internal navigation (clicks on internal links)
    document.addEventListener("click", function(e) {
      const anchor = e.target.closest("a");
      if (anchor && anchor.href && anchor.origin === location.origin) {
        isNavigatingAway = true;
      }
    });

    // Detect reload via keyboard (F5, Ctrl+R, etc.)
    window.addEventListener("keydown", function(e) {
      if ((e.key === "F5") || (e.ctrlKey && e.key === "r")) {
        isNavigatingAway = true;
      }
    });

    // Only send logout beacon if tab or browser is being closed
    window.addEventListener("beforeunload", function() {
      if (!isNavigatingAway) {
        navigator.sendBeacon("logout-on-close.php");
      }
    });
  </script> -->


  <!-- for closing the browser or pc shutdoon ! important  -->
  <script>
    let isNavigatingAway = false;

    // Detect internal navigation (e.g., clicking links)
    document.addEventListener("click", function (e) {
      const anchor = e.target.closest("a");
      if (anchor && anchor.href && anchor.origin === location.origin) {
        isNavigatingAway = true;
      }
    });

    // Detect page reload via keyboard (F5, Ctrl+R, Ctrl+Shift+R)
    window.addEventListener("keydown", function (e) {
      if ((e.key === "F5") || (e.ctrlKey && e.key.toLowerCase() === "r")) {
        isNavigatingAway = true;
      }
    });

    // Prevent logout if it's a reload or back/forward navigation
    window.addEventListener("beforeunload", function () {
      const navType = performance.getEntriesByType("navigation")[0]?.type;

      const isReload = (navType === "reload");
      const isBackForward = (navType === "back_forward");

      if (!isNavigatingAway && !isReload && !isBackForward) {
        navigator.sendBeacon("../logout-on-close.php");
      }
    });
  </script>

  <script src="taguig_js/jquery.js"></script>
  <script src="taguig_js/main.js"></script>
  <!-- <script src="js/landing-page.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>