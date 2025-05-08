<?php
include("connection.php");
include('tg_log_functions.php');

$username = $_SESSION['username'];
$action = "Super Admin viewed on Taguig Dashboard";
logtgActivity($con, $username, $action);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usertype'])) {
    header('Location: ../../index.php'); // Redirect to login page if not logged in
    exit();
}
$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
?>

<?php
include("connection.php");

// Taguig stats
$result = mysqli_query($con, "SELECT COUNT(*) AS total_products FROM producttabletaguig");
$row = mysqli_fetch_assoc($result);
$total_products = $row['total_products'];




$lowStockResult = mysqli_query($con, "SELECT COUNT(*) AS low_stock FROM producttabletaguig WHERE quantity_on_hand <= 0");
$lowStockRow = mysqli_fetch_assoc($lowStockResult);
$low_stock = $lowStockRow['low_stock'];

$noStockResult = mysqli_query($con, "SELECT COUNT(*) AS no_stock FROM producttabletaguig WHERE quantity_on_hand BETWEEN 1 AND 20");
$noStockRow = mysqli_fetch_assoc($noStockResult);
$no_stock = $noStockRow['no_stock'];


// Get top 3 selling products in Taguig
$topProductsQuery = "
    SELECT product_name, SUM(quantity) as total_quantity 
    FROM taguig_order_items 
    GROUP BY product_name 
    ORDER BY total_quantity DESC 
    LIMIT 3
";
$topProductsResult = mysqli_query($con, $topProductsQuery);
$top_products = [];
while ($row = mysqli_fetch_assoc($topProductsResult)) {
    $top_products[] = $row;
}

// Get recent orders (activity)
$recentOrdersQuery = "
    SELECT o.id, c.name, o.order_date, SUM(i.total_price) as total 
    FROM taguig_orders o
    JOIN taguig_customers c ON o.customer_id = c.id
    JOIN taguig_order_items i ON o.id = i.order_id
    GROUP BY o.id
    ORDER BY o.order_date DESC
    LIMIT 3
";
$recentOrdersResult = mysqli_query($con, $recentOrdersQuery);
$recent_orders = [];
while ($row = mysqli_fetch_assoc($recentOrdersResult)) {
    $recent_orders[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="taguig_css/tg_dashboard.css">
</head>

<body>

    <div class="main-title">
        <h2>DASHBOARD</h2>
    </div>

    <div class="main-cards">

        <div class="card1">
            <div class="card-inner">
                <span class="material-icons-outlined">inventory</span>
                <h3>INVENTORY</h3>
                <br><br>
                <p><?php echo $total_products; ?></p>
            </div>
        </div>

        <div class="card2">
            <div class="card-inner">
                <i class="fa-brands fa-product-hunt material-icons-outlined" style=" color: blue; "></i>
                <h3> Stocks</h3>
                <br><br>
                <p><?php echo $low_stock; ?> item(s) no stock</p>
                <p><?php echo $no_stock; ?> item(s) low stock</p>
            </div>
        </div>

        <div class="card3">
            <div class="card-inner">
                <span class="material-icons-outlined">list_alt</span>
                <h3>ACTIVITIES</h3>
                <?php if (!empty($recent_orders)): ?>
                    <div class="recent-orders">
                        <h4>Recent Orders</h4>
                        <ul>
                            <?php foreach ($recent_orders as $order): ?>
                                <li>
                                    <div class="order-item">
                                        <span>Order #<?php echo $order['id']; ?></span>
                                        <span>₱<?php echo number_format($order['total'], 2); ?></span>
                                    </div>
                                    <div class="order-item">
                                        <span><?php echo htmlspecialchars($order['name']); ?></span>
                                        <span
                                            class="order-date"><?php echo date('M d, Y', strtotime($order['order_date'])); ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="card4">
            <div class="card-inner">
                <span class="material-icons-outlined">trending_up</span>
                <h3>PERFORMANCE</h3>

                <?php if (!empty($top_products)): ?>
                    <div class="top-products">
                        <h4>Top Products</h4>
                        <ol>
                            <?php foreach ($top_products as $product): ?>
                                <li>
                                    <?php echo htmlspecialchars($product['product_name']); ?>
                                    (<?php echo $product['total_quantity']; ?> sold)
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Custom JS -->
    <script src="taguig_js/jquery.js"></script>
    <script src="taguig_js/main.js"></script>
</body>

</html>