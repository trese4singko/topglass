<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['usertype'])) {
    header('Location: ../../index.php'); // Redirect to login page if not logged in
    exit();
}

// Check if the user is Makati Admin
if ($_SESSION['usertype'] !== 'Makati Admin') {
    // Redirect to a page indicating no access, or an error page
    header('Location: ../../index.php'); 
    exit();
}

$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
?>

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Add Products Section</title>  
    <link rel="stylesheet" href="css/addproductmakati.css">  
</head>  
<body>  
    <div class="bloom-container">  
        <div class="nebula-title">Add Products Section</div>  

       
       <div class="form">
            
            <!-- Product Name -->  
            <div class="nova-input">  
                <span class="comet-details" require>Product Name</span>  
                <input type="text" name="product-name" placeholder="Enter Name" class="product-name" id="product-name" require>  
            </div>  

             <!-- Product size -->  
            <div class="nova-input">  
                <span class="comet-details" require>Product size</span>  
                <input type="text" name="product-size" placeholder="Size and Measurement" class="product-size" id="product-size"  >  
            </div> 

            <!-- Product Price -->  
            <div class="nova-input">  
                <span class="comet-details">Product Price</span>  
                <input type="text" name="product-price" class="product-price" id="product-price" placeholder="Enter Product Price" require>  
            </div>  

            <!-- Product Quantity on hand -->  
            <div class="nova-input">  
                <span class="comet-details">Product Quantity</span>  
                <input type="number" name="product-qty"  class="product-qty" id="product-qty" placeholder="Enter Product Quantity" require>  
            </div>  

            <!-- Product Category -->  
            <div class="nova-input" >  
                <span class="comet-details">Product Category</span>  
                <select name="product-category"  class="product-category" id="product-category" require >  
                    <option value="">select</option>  
                    <option value="metal">Metal</option>  
                    <option value="woods">Woods</option>  
                    <option value="small-metal">Small Metal</option>  
                    <option value="adhesives">Adhesives</option>  
                    <option value="others">Other Categories...</option>  
                </select>  
            </div>  

            <!-- Product Status -->  
            <div class="nova-input">  
                <span class="comet-details">Product Status</span>  
                <select name="product-status" class="product-status" id="product-status" require>  
                    <option value="">select</option>  
                    <option value="in-stock">In Stock</option>  
                    <option value="out-of-stock">Out of Stock</option>  
                </select>  
            </div>  

            <!-- Submit Button -->  
            <div class="star-button" id="addbutton">  
                <input type="submit"  value="Add Product">  
            </div>  
        
        </div>  
    </div>  
    <script src="js/jquery.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
//  $(document).on('click', '#addbutton', function() {
        
//         let name = $("#product-name").val();
//         let size = $("#product-size").val();
//         let price = $("#product-price").val();
//         let quantity_on_hand = $("#product-qty").val();
//         let category = $("#product-category").val();
//         let status = $("#product-status").val();

//         if (name == "" && price == "" && quantity_on_hand == "" && category == "" && status == "") {
//             alert('please input  all important data');
//         } else {
//             $.ajax({
//                 url: 'saveprodmakati.php',
//                 method: 'POST',
//                 data: {
//                     name: name,
//                     size: size,
//                     price: price,
//                     quantity_on_hand: quantity_on_hand,
//                     category: category,
//                     status: status
//                 },
//                 success: function(response) {
//                     alert(response); //response
//                 }
//             });
//         }
//     });


 
    $(document).on('click', '#addbutton', function() {
        let name = $("#product-name").val();
        let size = $("#product-size").val();
        let price = $("#product-price").val();
        let quantity_on_hand = $("#product-qty").val();
        let category = $("#product-category").val();
        let status = $("#product-status").val();

        if (name == "" || price == "" || quantity_on_hand == "" || category == "" || status == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please input all important data!',
            });
        } else {
            $.ajax({
                url: 'saveprodmakati.php',
                method: 'POST',
                data: {
                    name: name,
                    size: size,
                    price: price,
                    quantity_on_hand: quantity_on_hand,
                    category: category,
                    status: status
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Added',
                        text: response,
                        
                    }).then(() => {
                    location.reload();
                      });
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an issue adding the product. Please try again.',
                    });
                }
            });
        }
    });
</script>


    </script>
</body>  
</html>  
