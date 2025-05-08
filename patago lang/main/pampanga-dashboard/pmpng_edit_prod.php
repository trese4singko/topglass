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

    $searchquery = mysqli_query($con, "SELECT * FROM pmpng_add_prod_data WHERE product_id='$id'");
    if (mysqli_num_rows($searchquery) > 0) {
        $row = mysqli_fetch_array($searchquery);

        $Productname = $row["name"];
        $size = $row["size"];
        $price = $row["price"];
        $quantityonhand = $row["quantity_on_hand"];
        $category = $row["category"];
        $status = $row["status"];
?>
        <!DOCTYPE html>
        

        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Main Page Brances</title>
            <link rel="stylesheet" href="taguig/addprodtaguig.css">

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
                    <a href="../main.php" class="header-logo logs">
                        <img src="img/side.png" alt="CodingNepal">
                        <h5 class="welcome"> welcome admin <?php
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
                        <li class="nav-item">
                            <a href="?page=add-products" class="nav-link ">
                                <i class="fa-solid fa-box-open dotted"></i>
                                <span class="nav-label">Add Products</span>
                            </a>
                            <span class="nav-tooltip">Add Products</span>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="fa-solid fa-dollar-sign dotted"></i>
                                <span class="nav-label">Release Products</span>
                            </a>
                            <span class="nav-tooltip">Release Products</span>
                        </li>

                        <li class="nav-item">
                            <a href="TaguigAdmin.php?page=taguig-products" class="nav-link ">
                                <i class="fa-solid fa-backward"></i>
                                <span class="nav-label">Back to Branches </span>
                            </a>
                            <span class="nav-tooltip">Back to Branches </span>
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



                <div class="bloom-container">
                    <div class="nebula-title">Update Product</div>
                    <div class="form">
                        <div class="nova-input">
                            <span class="comet-details">Product Name</span>
                            <input type="text" name="product-name" class="product-name" id="product-name" value="<?php echo $Productname; ?>">
                        </div>
                        <div class="nova-input">
                            <span class="comet-details">Product Size</span>
                            <input type="text" name="product-size" class="product-size" id="product-size" value="<?php echo $size; ?>">
                        </div>
                        <div class="nova-input">
                            <span class="comet-details">Product Price</span>
                            <input type="text" name="product-price" class="product-price" id="product-price" value="<?php echo $price; ?>">
                        </div>
                        <div class="nova-input">
                            <span class="comet-details">Product Quantity</span>
                            <input type="number" name="product-qty" class="product-qty" id="product-qty" value="<?php echo $quantityonhand; ?>">
                        </div>
                        <div class="nova-input">
                            <span class="comet-details">Product Category</span>
                            <select name="product-category" class="product-category" id="product-category">
                                <option value="">Select</option>
                                <option value="metal" <?php if ($category == "metal") echo "selected"; ?>>Metal</option>
                                <option value="woods" <?php if ($category == "woods") echo "selected"; ?>>Woods</option>
                                <option value="small-metal" <?php if ($category == "small-metal") echo "selected"; ?>>Small Metal</option>
                                <option value="adhesives" <?php if ($category == "adhesives") echo "selected"; ?>>Adhesives</option>
                                <option value="others" <?php if ($category == "others") echo "selected"; ?>>Other Categories...</option>
                            </select>
                        </div>
                        <div class="nova-input">
                            <span class="comet-details">Product Status</span>
                            <select name="product-status" class="product-status" id="product-status">
                                <option value="">Select</option>
                                <option value="in-stock" <?php if ($status == "in-stock") echo "selected"; ?>>In Stock</option>
                                <option value="out-of-stock" <?php if ($status == "out-of-stock") echo "selected"; ?>>Out of Stock</option>
                            </select>
                        </div>
                        <div class="star-button" id="updatebutton" edit_id="<?php echo $id; ?>">
                            <input type="submit" value="Update Product">
                        </div>
                    </div>
                </div>

                <script src="js/jquery.js"></script>
                <script src="js/sweetalert.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#product-qty").on("input", function() {
                            let quantity = $(this).val();
                            let statusField = $("#product-status");

                            if (quantity == 0) {
                                statusField.val("out-of-stock");
                            } else {
                                statusField.val("in-stock");
                            }
                        });

                        $(document).on("click", "#updatebutton", function() {
                            let eid = $(this).attr("edit_id");
                            let Productname = $("#product-name").val();
                            let size = $("#product-size").val();
                            let price = $("#product-price").val();
                            let quantity_on_hand = $("#product-qty").val();
                            let category = $("#product-category").val();
                            let status = $("#product-status").val();

                            if (Productname == "" || price == "" || quantity_on_hand == "" || category == "") {
                                alert("Please input all important data");
                            } else {
                                $.ajax({
                                    url: "pmpng_upt_prod.php",
                                    method: "POST",
                                    data: {
                                        Productname: Productname,
                                        size: size,
                                        price: price,
                                        quantity_on_hand: quantity_on_hand,
                                        category: category,
                                        status: status,
                                        eid: eid
                                    },
                                    success: function(response) {
                                        alert(response);
                                    }
                                });
                            }
                        });
                    });
                </script>


            </div>


            <script src="js/foredit.js"></script>

        </body>

        </html>
<?php
    }
}
?>