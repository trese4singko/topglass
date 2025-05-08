<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['usertype'])) {
    header('Location: ../../index.php'); // Redirect to login page if not logged in
    exit();
}
$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once("connection.php");

    $searchquery = mysqli_query($con, "SELECT * FROM pmpng_order_items WHERE id ='$id'");
    if (mysqli_num_rows($searchquery) > 0) {
        $row = mysqli_fetch_array($searchquery);

        $product_name = $row ["product_name"];
        $size = $row ["size"];
        $quantity = $row ["quantity"];
        $price = $row ["price"];
        $total_price = $row["total_price"];
?>

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
            <link rel="stylesheet" href="css/pmpng_viewprod.css">
            <link rel="stylesheet" href="css/pmpng_viewprod2.css">
            <link rel="shortcut icon" href="img/side.png" type="image/x-icon">
            <!-- Linking Google fonts for icons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
            
        </head>

        <body>

        <div class="box">
            <div class="content">
        <img src="css/logo-remove-bg.png" alt="Site Logo" class="site-logo">
        <h6>TOP GLASS ALUMINUM CENTER</h6>
        </div>
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
          <a href="pmpng_main.php?page=pampanga_products" class="nav-link ">
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

        <label for="">Product Name: </label>
        <p><?php echo $product_name; ?></p>

        <label for="">Product Size: </label>
        <p><?php echo $size; ?></p>

        <label for="">Quantity: </label>
        <p><?php echo $quantity; ?></p>

        <label for="">Price: </label>
        <p><?php echo $price; ?></p>

        <label for="">Total Price: </label>
        <p><?php echo $total_price; ?></p>
        
        <!-- <button class="btndelete" id=" ?>" title="Delete">
                                        <span class="fa-stack">
                                            <i class="fas fa-square fa-stack-2x custom-colortrash"></i>
                                            <i class="fas fa-trash fa-stack-1x custom-color"></i>
                                        </span>
            </button>

        <div>

            <button class="update" onclick="window.location.href='makati_edit_prod.php?id=';">
                Update
            </button>
            <button class="print">Print</button>
            
        </div> -->
    </div>
</div>
        <script src="js/foredit.js"></script>

</body>
</html>
<?php
    }
}
?>

<!-- ?php echo $result['id']; -->
<!-- ?php echo ($id); ?> -->