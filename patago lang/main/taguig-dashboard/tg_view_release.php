<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once("connection.php");
    include("../functions.php");

    $query = "
        SELECT 
            o.id AS order_id,
            c.name AS customer_name,
            c.contact AS customer_contact,
            c.address AS customer_address,
            o.order_date,
            GROUP_CONCAT(i.product_name SEPARATOR '<br>') AS product_names,
            GROUP_CONCAT(i.size SEPARATOR '<br>') AS product_sizes,
            GROUP_CONCAT(i.quantity SEPARATOR '<br>') AS product_quantities,
            GROUP_CONCAT(i.price SEPARATOR '<br>') AS product_prices,
            GROUP_CONCAT(i.total_price SEPARATOR '<br>') AS total_prices
        FROM taguig_orders o
        JOIN taguig_customers c ON o.customer_id = c.id
        JOIN taguig_order_items i ON o.id = i.order_id
        WHERE o.id = '$id'
        GROUP BY o.id
        ORDER BY o.order_date DESC
    ";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        // These are now coming from correct query
        $product_name = $row["product_names"];
        $size = $row["product_sizes"];
        $quantity = $row["product_quantities"];
        $price = $row["product_prices"];
        $total_price = $row["total_prices"];

        $customer_name = $row["customer_name"];
        $customer_id = $id;

        $username = $_SESSION['username'];
        logActivity($con, $username, 'View Customer', $customer_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item</title>
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
                <a href="index.php?page=taguig_records" class="nav-link">
                    <i class="fa-solid fa-backward"></i>
                    <span class="nav-label"> Back to Product Tables </span>
                </a>
                <span class="nav-tooltip"> Back to Product Tables </span>
            </li>
        </ul>
    </nav>
</aside>

<div class="parent">
    <div class="container">
        <h1>View Item</h1>

        <label>Product Name: </label>
        <p><?php echo $product_name; ?></p>

        <label>Product Size: </label>
        <p><?php echo $size; ?></p>

        <label>Quantity: </label>
        <p><?php echo $quantity; ?></p>

        <label>Price: </label>
        <p><?php echo $price; ?></p>

        <label>Total Price: </label>
        <p><?php echo $total_price; ?></p>

    </div>
</div>
<script src="js/foredit.js"></script>
</body>
</html>

<?php
    } else {
        echo "No order found.";
    }
}
?>
