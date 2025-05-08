<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// // Check if the user is logged in
// if (!isset($_SESSION['usertype'])) {
//     header('Location: ../../index.php'); // Redirect to login page if not logged in
//     exit();
// }

// // Check if the user is Makati Admin
// if ($_SESSION['usertype'] !== 'Admin') {
//     // Redirect to a page indicating no access, or an error page
//     header('Location: ../../index.php'); 
//     exit();
// }

// $usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products Section</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css\makati_add_prod.css">


</head>

<body>
    <div class="bloom-container">
        <div id="product-container">
            <div class="product-entry">
                <div class="nova-input">
                    <span class="comet-details">Product Name: </span>
                    <input type="text" name="product-name[]" placeholder="Enter Name" class="product-name" required>
                </div>

                <div class="nova-input">
                    <span class="comet-details">Product Size: </span>
                    <input type="text" name="product-size[]" placeholder="Enter size" class="product-size">
                </div>

                <div class="nova-input">
                    <span class="comet-details">Product Price: </span>
                    <input type="number" name="product-price[]" class="product-price" placeholder="Enter Product Price" required>
                </div>

                <div class="nova-input">
                    <span class="comet-details">Product Quantity: </span>
                    <input type="number" name="product-qty[]" class="product-qty" placeholder="Enter Product Quantity" required min="1">
                </div>

                <div class="nova-input">
                    <span class="comet-details">Product Status: </span>
                    <select name="product-status[]" class="product-status" required disabled>
                        <option value="">Select</option>
                        <option value="in-stock">In Stock</option>
                        <option value="out-of-stock">Out of Stock</option>
                    </select>
                </div>

                <div class="nova-input">
                    <span class="comet-details">Product Category: </span>
                    <select name="product-category[]" class="product-category" required>
                        <option value="">Select</option>
                        <option value="metal">Metal</option>
                        <option value="woods">Woods</option>
                        <option value="small-metal">Small Metal</option>
                        <option value="adhesives">Adhesives</option>
                        <option value="others">Other Categories...</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="button-container">
            <button id="clone-button">Add Another Item</button>
            <div class="star-button">
                <input type="submit" value="Add Product" id="addbutton">
            </div>
        </div>
    </div>

        <script src="js/sweetalert.js"></script>
    <script>
        $(document).ready(function() {
            function updateProductStatus(quantityInput) {
                let quantity = parseInt(quantityInput.val(), 10);
                let statusSelect = quantityInput.closest('.product-entry').find('.product-status');

                if (!isNaN(quantity) && quantity > 0) {
                    statusSelect.val('in-stock');
                } else {
                    statusSelect.val('out-of-stock');
                }
            }

            // Update status when quantity changes
            $(document).on('input', '.product-qty', function() {
                updateProductStatus($(this));
            });

            // Clone product entry
            $('#clone-button').click(function() {
                let newEntry = $('.product-entry').first().clone();
                newEntry.find('input, select').val(''); // Clear input fields
                newEntry.find('.delete-button').remove(); // Remove any existing delete button
                newEntry.append('<button class="delete-button" title="Delete this item" style="margin-top:19px;"><i class="fa-solid fa-trash"></i></button>'); // Add delete button
                $('#product-container').append(newEntry);
            });

            // Delete product entry
            $(document).on('click', '.delete-button', function() {
                $(this).closest('.product-entry').remove();
            });

            // Add product button logic
            $(document).on('click', '#addbutton', function() {
                let productData = [];
                let hasInvalidQuantity = false; // Flag to detect invalid quantity

                $('.product-entry').each(function() {
                    let name = $(this).find('.product-name').val();
                    let size = $(this).find('.product-size').val();
                    let price = $(this).find('.product-price').val();
                    let quantity = parseInt($(this).find('.product-qty').val(), 10);
                    let category = $(this).find('.product-category').val();
                    let status = $(this).find('.product-status').val();

                    // Check if quantity is 1 or more
                    if (isNaN(quantity) || quantity < 1) {
                        hasInvalidQuantity = true;
                        return false; // Stop further processing if invalid quantity
                    }

                    // Push product data if all fields are valid
                    if (name && price && quantity && category && status) {
                        productData.push({
                            name: name,
                            size: size,
                            price: price,
                            quantity_on_hand: quantity,
                            category: category,
                            status: status
                        });
                    }
                });

                // Validation messages
                if (hasInvalidQuantity) {
                    alert('Product Quantity must be 1 or more.');
                } else if (productData.length === 0) {
                    alert('Please fill out all required fields.');
                } else {
                    // Send data via AJAX
                    $.ajax({
                        url: 'makati_save_prod.php',
                        method: 'POST',
                        data: {
                            products: JSON.stringify(productData)
                        },
                        success: function(response) {
                            alert(response);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>