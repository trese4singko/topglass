<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usertype'])) {
    header('Location:  ../index.php');
    exit();
}

// Check if the user is Makati Admin
if ($_SESSION['usertype'] !== 'Makati Admin') {
    header('Location:  ../index.php');
    exit();
}

$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
?>
<?php include_once('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Releasing Section</title>
    <link rel="shortcut icon" href="img/side.png" type="image/x-icon">
    <link rel="stylesheet" href="css/mkt_real_prod.css">
    <link rel="stylesheet" href="css/mkt_real_prod2.css">

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
                    <span>Contact Details: <input type="text" id="customerNum" placeholder="Number"></span>
                    <span>Address: <input type="text" id="customerAdd" placeholder="Location"></span>
                </div>
            </div>

            <div class="container2">
                <h4>Ordered Items</h4>
                <div id="orderedItems"></div>
                <div class="product-details">
                    <span>Product Name:
                        <input type="text" id="inputProductName" placeholder="Product Name" autocomplete="off">
                        <div id="productSuggestions" class="suggestions-box"></div>
                    </span>
                    <span>Unit Measurement: <input type="text" id="inputProductSize" placeholder="Size & Measurement">
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/release.js"></script>



    <script>
        $(document).ready(function() {
            function updateTotalPrice() {
                let quantity = parseFloat($("#inputQuantity").val()) || 0;
                let price = parseFloat($("#inputPrice").val()) || 0;
                let total = quantity * price;

                let formattedTotal = new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP'
                }).format(total);

                $("#labelTotalPrice").text(formattedTotal);
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

            // Function to check product availability
            function checkProductAvailability() {
                let productName = $("#inputProductName").val().trim();
                let productSize = $("#inputProductSize").val().trim();

                if (productName && productSize) {
                    $.ajax({
                        url: "makati_confirm.php",
                        type: "POST",
                        data: {
                            check_availability: true,
                            product_name: productName,
                            size: productSize
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status === "success") {
                                $("#quantityAvailabilityMessage").text(""); // Clear message
                                $("#buttonAdd").prop("disabled", false); // Enable button
                            } else {
                                $("#quantityAvailabilityMessage").text("There is no available quantity left."); // Show message
                                $("#buttonAdd").prop("disabled", true); // Disable button
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error checking product availability:", error);
                        }
                    });
                } else {
                    $("#buttonAdd").prop("disabled", true); // Disable button if no product selected
                    $("#quantityAvailabilityMessage").text(""); // Clear message
                }
            }

            // Update product suggestions feature to check availability
            $("#inputProductName, #inputProductSize").on("input", function() {
                checkProductAvailability();
            });

            // Product suggestions feature
            $("#inputProductName").on("input", function() {
                let query = $(this).val().trim();
                if (query.length > 0) {
                    $.ajax({
                        url: "makati_confirm.php",
                        type: "GET",
                        data: {
                            search: query
                        },
                        dataType: "json",
                        success: function(data) {
                            $("#productSuggestions").empty(); // Clear previous suggestions
                            if (data.length > 0) {
                                data.forEach(function(product) {
                                    $("#productSuggestions").append(`<div class="suggestion-item">${product.name}</div>`);
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error fetching suggestions:", error);
                        }
                    });
                } else {
                    $("#productSuggestions").empty(); // Clear suggestions if input is empty
                }
            });

            // Handle suggestion click
            $(document).on("click", ".suggestion-item", function() {
                $("#inputProductName").val($(this).text());
                $("#productSuggestions").empty(); // Clear suggestions after selection

                // Remove 'selected' class from all suggestion items
                $(".suggestion-item").removeClass("selected");

                // Add 'selected' class to the clicked item
                $(this).addClass("selected");
            });

            // Add a message element below the quantity input
            $(".product-details").append('<div id="quantityAvailabilityMessage" style="color: red;"></div>');
        });

        function checkProductAvailability() {
            let productName = $("#inputProductName").val().trim();
            let productSize = $("#inputProductSize").val().trim();

            if (productName && productSize) {
                $.ajax({
                    url: "makati_confirm.php",
                    type: "POST",
                    data: {
                        check_availability: true,
                        product_name: productName,
                        size: productSize
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status === "success") {
                            $("#quantityAvailabilityMessage").text(""); // Clear message
                            $("#buttonAdd").prop("disabled", false); // Enable button
                        } else {
                            $("#quantityAvailabilityMessage").text("Product not found."); // Show message
                            $("#buttonAdd").prop("disabled", true); // Disable button
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error checking product availability:", error);
                    }
                });
            } else {
                $("#buttonAdd").prop("disabled", true); // Disable button if no product selected
                $("#quantityAvailabilityMessage").text(""); // Clear message
            }
        }

        // Add a message element below the quantity input
        $(".product-details").append('<div id="quantityAvailabilityMessage" style="color: red;"></div>');

        // Update product suggestions feature to check availability
        $("#inputProductName, #inputProductSize").on("input", function() {
            checkProductAvailability();
        });
    </script>
</body>

</html>