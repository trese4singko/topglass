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
if ($_SESSION['usertype'] !== 'Pampanga Admin') {
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
    <title>Pampanga Products</title>
    <link rel="stylesheet" href=" css/pampanga_products.css"> <!-- Link to your CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="center-container">
        <div class="table-container">
            <table>
                <thead>
                    
                    <tr>
                        <!-- <th>Product ID</th> -->
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Size</th>
                        <th>Product Quantity</th>
                        <th>Product Category</th>
                        <th>Product Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
    include("connection.php");

    $query = mysqli_query($con,"SELECT * FROM pampanga_main_product");
    while($result = mysqli_fetch_array($query)){
        ?>
                    <tr>
                        <!-- <td>1</td> -->
                        <td><?php echo ($result['name']); ?></td>
                        <td><?php echo ($result['size']); ?></td>
                        <td><?php echo ($result['price']); ?></td>
                        <td><?php echo ($result['quantity_on_hand']); ?></td>
                        <td><?php echo ($result['category']); ?></td>
                        <td><?php echo ($result['status']); ?></td>
                        <td>
                          
                            <div class="button-container">
                                <a href="EditInventory.php?id=<?php echo $result['product_id']; ?>"
                                    style="text-decoration:none; color:black;">
                                    <span class="fa-stack" title="edit">
                                        <i class="fas fa-square fa-stack-2x custom-colorpen"></i>
                                        <i class="fas fa-pen fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <a href="viewtable.php?id=<?php echo $result['product_id']; ?>"
                                    style="text-decoration:none; color:black;">
                                    <span class="fa-stack" title="view">
                                        <i class="fas fa-square fa-stack-2x custom-coloreye"></i>
                                        <i class="fas fa-eye fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <button class="btndelete" id="<?php echo $result['product_id']; ?>" title="Delete">
                                    <span class="fa-stack">
                                        <i class="fas fa-square fa-stack-2x custom-colortrash"></i>
                                        <i class="fas fa-trash fa-stack-1x custom-color"></i>
                                    </span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                         <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>