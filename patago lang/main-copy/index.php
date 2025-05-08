<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['usertype'])) {
  header('Location:  ../index.php');
  exit();
}

switch ($_SESSION['usertype']) {
  case 'admin':
     break;

  default:
    header('Location: ../index.php');
    exit();
}
$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
$nickname = isset($_SESSION['nickname']) ? htmlspecialchars($_SESSION['nickname']) : 'Guest';
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';

include('connection.php');
include('functions.php');

$loginQuery = "SELECT * FROM activity_logs WHERE action = 'Login' ORDER BY timestamp DESC LIMIT 5";
$loginResult = mysqli_query($con, $loginQuery);
$loginHistory = mysqli_fetch_all($loginResult, MYSQLI_ASSOC);

$productQuery = "SELECT * FROM activity_logs WHERE action = 'Add Item' ORDER BY timestamp DESC LIMIT 5";
$productResult = mysqli_query($con, $productQuery);
$productHistory = mysqli_fetch_all($productResult, MYSQLI_ASSOC);

$removeQuery = "SELECT * FROM activity_logs WHERE action = 'Remove Item' ORDER BY timestamp DESC LIMIT 5";
$removeResult = mysqli_query($con, $removeQuery);
$removeHistory = mysqli_fetch_all($removeResult, MYSQLI_ASSOC);

$updateQuery = "SELECT * FROM activity_logs WHERE action = 'Update Item' ORDER BY timestamp DESC LIMIT 5";
$updateResult = mysqli_query($con, $updateQuery);
$updateHistory = mysqli_fetch_all($updateResult, MYSQLI_ASSOC);

$viewQuery = "SELECT * FROM activity_logs WHERE action = 'View Item' ORDER BY timestamp DESC LIMIT 5";
$viewResult = mysqli_query($con, $viewQuery);
$viewHistory = mysqli_fetch_all($viewResult, MYSQLI_ASSOC);

// Fetching view customer logs
$viewCustomerQuery = "SELECT * FROM activity_logs WHERE action = 'View Customer' ORDER BY timestamp DESC LIMIT 5";
$viewCustomerResult = mysqli_query($con, $viewCustomerQuery);
$viewCustomerHistory = mysqli_fetch_all($viewCustomerResult, MYSQLI_ASSOC);

// Merging all notifications
$notifications = array_merge($loginHistory, $productHistory, $removeHistory, $updateHistory, $viewHistory, $viewCustomerHistory);

usort($notifications, function ($a, $b) {
  return strtotime($b['timestamp']) - strtotime($a['timestamp']);
});

// Count unread notifications
$unreadCountResult = mysqli_query($con, "SELECT COUNT(*) AS total FROM activity_logs WHERE is_viewed = FALSE");
$unreadCountRow = mysqli_fetch_assoc($unreadCountResult);
$unreadCount = $unreadCountRow['total'];

if (isset($_POST['markAsViewed'])) {
  $updateQuery = "UPDATE activity_logs SET is_viewed = TRUE WHERE is_viewed = FALSE";
  if (mysqli_query($con, $updateQuery)) {
    echo json_encode(['status' => 'success']);
  } else {
    echo json_encode(['status' => 'error']);
  }
  exit();
}

$query = "SELECT * FROM activity_logs ORDER BY timestamp DESC LIMIT 10";
$result = mysqli_query($con, $query);

$loginHistory = [];
while ($row = mysqli_fetch_assoc($result)) {
  $loginHistory[] = $row;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Admin!</title>

  <link rel="stylesheet" href="css/main/notification.css">
  <link rel="stylesheet" href="css/main/main.css">
  <link rel="stylesheet" href="css/main/usericon.css">

  <link rel="shortcut icon" href="img/side.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
  <!-- In <head> -->



</head>

<body>

  <div class="box">

    <div class="content">
      <img src="css/main/logo-remove-bg.png" alt="Site Logo" class="site-logo">
      <h6>TOP GLASS ALUMINUM CENTER</h6>
    </div>
    <div class="header-right">
      <div class="notifications-icon" onclick="toggleNotifications()">
        <i class="fa fa-bell"></i>
        <span class="badge"><?php echo $unreadCount; ?></span>
      </div>

      <div class="personal-icons" onclick="toggleDropdown()">
        <span class="icon">&#128100;</span>
        <h4 class="welcome">Welcome, <?php echo $username; ?>!</h4>
        <div class="dropdown-content" id="personalDropdown">
          <div class="dropdown-item" onclick="window.location.href='users/profile.php';">Profile</div>
        </div>
      </div>
    </div>



    <div class="space">
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


  <div id="chatContainer"></div>

  <aside class="sidebar">
    <header class="sidebar-header " style="background-color: black ;">
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
          <a href="?page=branch-analysis" class="nav-link ">
            <i class="fa-solid fa-chart-line dotted"></i>
            <span class="nav-label">Branches Analysis</span>
          </a>
          <span class="nav-tooltip">Branches Analysis</span>
        </li>

        <li class="nav-item">
          <a href="?page=act-history" class="nav-link ">
            <i class="fa-regular fa-clock"></i> <span class="nav-label">Branch Activity</span>
          </a>
          <span class="nav-tooltip">Branch Activity</span>
        </li>

        <li class="nav-item">
          <a href="taguig-dashboard/index.php?page=taguig_dashboard" class="nav-link ">
            <i class="fa-solid fa-location-dot dotted"></i>
            <span class="nav-label">Taguig Branch </span>
          </a>
          <span class="nav-tooltip">Taguig Branch </span>
        </li>

        <li class="nav-item">
          <a href="makati-dashboard/index.php?page=makati_dashboard" class="nav-link ">
            <i class="fa-solid fa-location-dot dotted"></i>
            <span class="nav-label">Makati Branch </span>
          </a>
          <span class="nav-tooltip">Makati Branch </span>
        </li>

        <li class="nav-item">
          <a href="pampanga-dashboard/index.php?page=pampanga_dashboard" class="nav-link ">
            <i class="fa-solid fa-location-dot dotted"></i>
            <span class="nav-label">Pampanga Branch </span>
          </a>
          <span class="nav-tooltip">Pampanga Branch </span>
        </li>

        <li class="nav-item">
          <a href="../chat/chat.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">Chat</span>
            <span class="nav-label">Chat</span>
          </a>
          <span class="nav-tooltip">Chat</span>
        </li>
      </ul>

      <ul class="nav-list secondary-nav">
        <li class="nav-item">
          <a href="?page=add_new_employee" class="nav-link">
            <span class="nav-icon material-symbols-rounded">account_circle</span>
            <span class="nav-label">Add New Employee</span>
          </a>
          <span class="nav-tooltip">Add New Employee</span>
        </li>

        <li class="nav-item">
          <a href="#" onclick="openPasswordModal(event)" class="nav-link">
            <span class="nav-icon material-symbols-rounded">account_circle</span>
            <span class="nav-label">User Lists</span>
          </a>


          <span class="nav-tooltip">User Lists</span>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">logout</span>
            <span class="nav-label">Logout</span>
          </a>
          <span class="nav-tooltip">Logout</span>
        </li>
      </ul>
    </nav>
  </aside>

  <div class="main">
    <br><br><br><br>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    switch ($page) {

      case 'users-only':
        include 'users/userstable.php';
        break;

      case 'add_new_employee':
        include 'users/add_user.php';
        break;

      case 'branch-analysis':
        include 'branch_graph.php';
        break;

      case 'act-history':
        include 'history_log.php';
        break;

      default:
        echo "<br>  ";
        break;
    }
    ?>
  </div>
  <!-- Password Modal -->
  <div id="customPasswordModal" class="custom-modal">
    <div class="custom-modal-content">
      <div class="custom-modal-header">
        <h5>Enter Password</h5>
        <span id="closeModal" class="custom-modal-close">&times;</span>
      </div>
      <div class="custom-modal-body">
        <input type="password" id="accessPassword" class="form-control" placeholder="Enter password" />
        <div id="passwordError" class="text-danger mt-2 d-none">Incorrect password.</div>  
      </div>
      <div class="custom-modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closePasswordModal()">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="verifyPassword()">Submit</button>
      </div>
    </div>
  </div>



  <script src="js/jquery.js"></script>
  <script src="js/main.js"></script>
  <script>
    function toggleDropdown() {
      document.getElementById("personalDropdown").classList.toggle("show");
    }

  
    window.onclick = function(event) {
      if (!event.target.closest('.personal-icons')) {
        document.getElementById("personalDropdown").classList.remove("show");
      }
    }
 
    function toggleNotifications() {
      var dropdown = document.getElementById("notificationsDropdown");
      dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";

      if (dropdown.style.display === "block") {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
            document.querySelector('.notifications-icon .badge').textContent = '0';
          }
        };
        xhr.send("markAsViewed=true");
      }
    }
    document.querySelector('.notifications-icon .badge').textContent = '0';
    document.querySelector('.notifications-icon .badge').style.display = 'none';

    document.addEventListener('DOMContentLoaded', function() {
      var unreadCount = <?php echo $unreadCount; ?>;
      var badge = document.querySelector('.notifications-icon .badge');
      if (badge) {
        badge.textContent = unreadCount;
      }
    });
  
    function toggleDropdown() {
      document.getElementById("personalDropdown").classList.toggle("show");
    }

     
    window.onclick = function(event) {
      if (!event.target.closest('.personal-icons')) {
        document.getElementById("personalDropdown").classList.remove("show");
      }
    }
  </script>
  <!-- for modal password  -->

  <script>
    function openPasswordModal(event) {
      event.preventDefault();
      document.getElementById("accessPassword").value = "";  

      // Show the modal with fade-down effect
      const modal = document.getElementById("customPasswordModal");
      modal.classList.add("show");

      // Focus on the password input when modal opens
      document.getElementById("accessPassword").focus();
    }

    // Function to close the custom password modal
    function closePasswordModal() {
      const modal = document.getElementById("customPasswordModal");
      modal.classList.remove("show");
    }

    // Function to verify the password
    function verifyPassword() {
      const password = document.getElementById("accessPassword").value;
      const errorElement = document.getElementById("passwordError");

      // Clear any previous error message before sending a new request
      errorElement.style.display = 'none'; 

      // Send password for verification via fetch
      fetch('verify-password.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams({
            password: password 
          })
        })
        .then(response => response.text())
        .then(result => {
          console.log(result); 

          if (result.trim() === 'success') {
            window.location.href = '?page=users-only';
          } else {
            // Show error message if the password is incorrect
            errorElement.style.display = 'block'; 
            errorElement.textContent = "Incorrect password"; 
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }

    // Close the modal when the close button (×) is clicked
    document.getElementById("closeModal").addEventListener("click", closePasswordModal);
  </script>




</body>

</html>