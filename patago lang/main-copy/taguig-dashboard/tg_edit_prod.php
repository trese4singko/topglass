<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usertype'])) {
    header('Location: ../../index.php');
    exit();
}
$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once("connection.php");

    $searchquery = mysqli_query($con, "SELECT * FROM producttabletaguig WHERE product_id='$id'");
    if (mysqli_num_rows($searchquery) > 0) {
        $row = mysqli_fetch_array($searchquery);

        $productname = $row["name"];
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
            <title>Updating Products</title>
            
            <!-- <link rel="shortcut icon" href="img/side.png" type="image/x-icon"> -->

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">

            <link rel="stylesheet" href="taguig_css/tg_edit_prod.css">
            
        </head>

        <body>
        <div class="box">
            <div class="content">
        <img src="taguig_css\logo-remove-bg.png" alt="Site Logo" class="site-logo">
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

        <li class="nav-item">
          <a href="index.php?page=taguig_table_products" class="nav-link ">
            <i class="fa-solid fa-backward"></i>
            <span class="nav-label">Back to Branches </span>
          </a>
          <span class="nav-tooltip">Back to Branches </span>
        </li>
      </ul>
      
      <ul class="nav-list secondary-nav">
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
                            <input type="text" name="product-name" class="product-name" id="product-name" value="<?php echo $productname; ?>">
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

                <script src="taguig_js/jquery.js"></script>
                <script src="taguig_js/sweetalert.js"></script>
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
                            let productname = $("#product-name").val();
                            let size = $("#product-size").val();
                            let price = $("#product-price").val();
                            let quantity_on_hand = $("#product-qty").val();
                            let category = $("#product-category").val();
                            let status = $("#product-status").val();

                            if (productname == "" || price == "" || quantity_on_hand == "" || category == "") {
                                alert("Please input all important data");
                            } else {
                                $.ajax({
                                    url: "tg_upt_prod.php",
                                    method: "POST",
                                    data: {
                                        productname: productname,
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
            
            <script src ="taguig_js/jquery.js"></script>
            <script src="taguig_js/foredit.js"></script>

    </body>
</html>
<?php
    }
}
?>