<?php
include_once("connection.php");
include_once("../functions.php");

// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// if (!isset($_SESSION['usertype'])) {
//     header('Location: ../../index.php');
//     exit();
// }
$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $searchquery = mysqli_query($con, "SELECT * FROM producttabletaguig WHERE product_id='$id'");
    if (mysqli_num_rows($searchquery) > 0) {
        $row = mysqli_fetch_array($searchquery);

        $Productname = $row["name"];
        $size = $row["size"];
        $price = $row["price"];
        $quantityonhand = $row["quantity_on_hand"];
        $category = $row["category"];
        $status = $row["status"];

        $description = "Viewed product '$Productname' (ID: $id) on View Item (Product Table Taguig)";
        logActivity($con, $_SESSION['username'], 'View Item', $id, $description); 
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Main Page Brances</title>

            <link rel="stylesheet" href="taguig_css/tg_viewprod.css">
            <link rel="stylesheet" href="taguig_css/tg_viewprod2.css">

            <link rel="shortcut icon" href="img/side.png" type="image/x-icon">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
                  integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
                  crossorigin="anonymous" referrerpolicy="no-referrer"/>
            <link rel="stylesheet"
                  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">

        </head>
        <body>

        <div class="box">
            <div class="content">
                <img src="taguig_css/logo-remove-bg.png" alt="Site Logo" class="site-logo">
                <h6>TOP GLASS ALUMINUM CENTER</h6>
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
                        <a href="index.php?page=taguig_table_products" class="nav-link ">
                            <i class="fa-solid fa-backward"></i>
                            <span class="nav-label"> Back to Product Tables </span>
                        </a>
                        <span class="nav-tooltip"> Back to Product Tables </span>
                    </li>
                </ul>

                <ul class="nav-list secondary-nav">
                </ul>
            </nav>
        </aside>

        <div class="parent">
            <div class="container">
                <h1>View Item</h1>

                <label for="">Product name: </label>
                <?php echo $Productname; ?></p>

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
                    <button class="update" onclick="window.location.href='tg_edit_prod.php?id=<?php echo ($id); ?>';">
                        Update
                    </button>
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