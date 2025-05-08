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

<?php include_once('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Releasing Section</title>
    <link rel="shortcut icon" href="img/side.png" type="image/x-icon">
    <link rel="stylesheet" href="css\makati_release_prod.css">
    <link rel="stylesheet" href="css\mkt_release2.css">

    <!-- Google Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
<div class="main">
        <div class="flex-container">
            <div class="container1">
                <h4>Customer Details</h4>
                <div class="customer-details">
                    <span>Customer Name: <input type="text" id="customerName" placeholder="Name"></span>
                    <span>Contact Details: <input type="number" id="customerNum" placeholder="Number"></span>
                    <span>Address: <input type="text" id="customerAdd" placeholder="Location"></span>
                </div>
            </div>

            <div class="container2">
                <h4>Ordered Items</h4>
                <div id="orderedItems"></div>
                <div class="product-details">
                    <span>Product Name: <input type="text" id="inputProductName" placeholder="Product Name"></span>
                    <span>Product Size: <input type="text" id="inputProductSize" placeholder="Size">
                    </span>
                    <span>Quantity: <input type="number" id="inputQuantity" min="1" placeholder="Quantity"></span>
                    <span>Price: <input type="number" id="inputPrice" placeholder="Price"></span>
                    <span>Total Price: <label id="labelTotalPrice"></label></span>
                </div>
                <button id="buttonRelease">Confirm</button>
                <button id="buttonAdd">Add more items</button>

            </div>
        </div>
    </div>

    <!-- jQuery & SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/release.js"></script>


    <script>
        $(document).ready(function() {
            function updateTotalPrice() {
                let quantity = parseFloat($("#inputQuantity").val()) || 0;
                let price = parseFloat($("#inputPrice").val()) || 0;
                let total = quantity * price;
                $("#labelTotalPrice").text(total.toFixed(2)); // Show total price
            }

            // Update total price when quantity or price is changed
            $("#inputQuantity, #inputPrice").on("input", updateTotalPrice);

            $("#buttonRelease").click(function() {
                let customerName = $("#customerName").val().trim();
                let customerNum = $("#customerNum").val().trim();
                let customerAdd = $("#customerAdd").val().trim();
                let productName = $("#inputProductName").val().trim();
                let productSize = $("#inputProductSize").val().trim();
                let quantity = parseFloat($("#inputQuantity").val().trim()) || 0;
                let price = parseFloat($("#inputPrice").val().trim()) || 0;
                let totalPrice = quantity * price; // Calculate total price

                if (!customerName || !customerNum || !customerAdd || !productName || !productSize || quantity <= 0 || price <= 0) {
                    Swal.fire("Error", "Please fill in all fields correctly.", "error");
                    return;
                }

                $.ajax({
                    url: "makati_confirm.php",
                    type: "POST",
                    data: {
                        customer_name: customerName,
                        customer_num: customerNum,
                        customer_add: customerAdd,
                        product_name: productName,
                        size: productSize,
                        quantity: quantity,
                        price: price,
                        total_price: totalPrice
                    },
                    dataType: "json",
                    beforeSend: function() {
                        console.log("Sending AJAX request...");
                    },
                    success: function(response) {
                        console.log("Response received:", response);
                        if (response.status === "success") {
                            Swal.fire("Success", response.message, "success");
                            $("#inputQuantity, #inputPrice, #labelTotalPrice").val(''); // Clear fields after success
                        } else {
                            Swal.fire("Error", response.message, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error:", xhr.responseText);
                        Swal.fire("Error", "Something went wrong: " + error, "error");
                    }
                });
            });
        });
    </script>
</body>

</html>