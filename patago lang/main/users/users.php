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
?>
<!DOCTYPE html>
 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users </title>
  <link rel="stylesheet" href=" css/user.css">
  <link rel="shortcut icon" href="img/side.png" type="image/x-icon">
  <!-- Linking Google fonts for icons -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
</head>
<body>

  <div class="box"></div>

  <aside class="sidebar">
    <!-- Sidebar header -->
    <header class="sidebar-header">
      <a href="main.php" class="header-logo logs">
        <img src="img/side.png" alt="">
       <h5 class="welcome">    <?php
// echo 'Welcome' . ' <br> ' . htmlspecialchars($_SESSION['usertype']);
?></h5>
      </a>
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
          <a href="#" class="nav-link">
            <span class="nav-icon material-symbols-rounded">dashboard</span>
            <span class="nav-label">Dashboard</span>
          </a>
          <span class="nav-tooltip">Dashboard</span>
        </li> -->
         <li class="nav-item">
          <a href="?page=users" class="nav-link ">
         <i class="fa-solid fa-user dotted"></i>
            <span class="nav-label"> Users</span>
          </a>
          <span class="nav-tooltip">Users  </span>
        </li>
       
       
      </ul>
      <!-- Secondary bottom nav -->
      <ul class="nav-list secondary-nav">
         
        <li class="nav-item">
          <a href="#" class="nav-link">
            <span class="nav-icon material-symbols-rounded">account_circle</span>
            <span class="nav-label">Profile</span>
          </a>
          <span class="nav-tooltip">Profile</span>
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
</div>
  <div class="main">
     <br><br><br>
    <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        switch ($page) {
            case 'users':
                include 'AddProdTaguig.php';  
                break;

            default:
                echo "<br>  ";
                break;
        }
    ?>
  </div>
  <script src="js/main.js"></script>
</body>
</html>
