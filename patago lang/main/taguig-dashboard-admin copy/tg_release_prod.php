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

<?php include_once('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page Branches</title>
    <link rel="shortcut icon" href="img/side.png" type="image/x-icon">
    <link rel="stylesheet" href="taguig_css/tg_prod_release.css">
    <link rel="stylesheet" href="taguig_css/tg_release_prod.css">

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
                    <span> Unit Measurement: <input type="text" id="inputProductSize" placeholder="Ex: Size & Measurement">
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
    <script src="taguig_js/release.js"></script>
    <script src="taguig_js/main.js"></script>


    <script>
    $(document).ready(function() {
        function updateTotalPrice() {
            let quantity = parseFloat($("#inputQuantity").val()) || 0;
            let price = parseFloat($("#inputPrice").val()) || 0;
            let total = quantity * price;
            $("#labelTotalPrice").text("₱" + total.toFixed(2));
        }

       
        $("#inputQuantity, #inputPrice").on("input", updateTotalPrice);

        $("#buttonRelease").click(function() {
            let customerName = $("#customerName").val().trim();
            let customerNum = $("#customerNum").val().trim();
            let customerAdd = $("#customerAdd").val().trim();
            let productName = $("#inputProductName").val().trim();
            let productSize = $("#inputProductSize").val().trim();
            let quantity = parseFloat($("#inputQuantity").val().trim()) || 0;
            let price = parseFloat($("#inputPrice").val().trim()) || 0;
            let totalPrice = quantity * price; 

            if (!customerName || !customerNum || !customerAdd || !productName || !productSize || quantity <= 0 || price <= 0) {
                Swal.fire("Error", "Please fill in all fields correctly.", "error");
                return;
            }

            $.ajax({
                url: "tg_cnfrm_ordr.php",
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
                        $("#inputQuantity, #inputPrice, #labelTotalPrice").val(''); 
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

        function checkProductAvailability() {
            let productName = $("#inputProductName").val().trim();
            let productSize = $("#inputProductSize").val().trim();
            
            if (productName && productSize) {
                $.ajax({
                    url: "tg_cnfrm_ordr.php",
                    type: "POST",
                    data: {
                        check_availability: true,
                        product_name: productName,
                        size: productSize
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.status === "success") {
                            $("#quantityAvailabilityMessage").text(""); 
                            $("#buttonAdd").prop("disabled", false); 
                        } else {
                            $("#quantityAvailabilityMessage").text("There is no available quantity left."); // Show message
                            $("#buttonAdd").prop("disabled", true);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error checking product availability:", error);
                    }
                });
            } else {
                $("#buttonAdd").prop("disabled", true); 
                $("#quantityAvailabilityMessage").text(""); 
            }
        }

        $("#inputProductName, #inputProductSize").on("input", function() {
            checkProductAvailability();
        });

     
        $("#inputProductName").on("input", function() {
            let query = $(this).val().trim();
            if (query.length > 0) {
                $.ajax({
                    url: "tg_cnfrm_ordr.php",
                    type: "GET",
                    data: { search: query },
                    dataType: "json",
                    success: function(data) {
                        $("#productSuggestions").empty(); 
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
                $("#productSuggestions").empty(); 
            }
        });

       
        $(document).on("click", ".suggestion-item", function() {
            $("#inputProductName").val($(this).text());
            $("#productSuggestions").empty();

          
            $(".suggestion-item").removeClass("selected");
            
           
            $(this).addClass("selected");
        });

      
        $(".product-details").append('<div id="quantityAvailabilityMessage" style="color: red;"></div>');
    });

    function checkProductAvailability() {
    let productName = $("#inputProductName").val().trim();
    let productSize = $("#inputProductSize").val().trim();
    
    if (productName && productSize) {
        $.ajax({
            url: "tg_cnfrm_ordr.php",
            type: "POST",
            data: {
                check_availability: true,
                product_name: productName,
                size: productSize
            },
            dataType: "json",
            success: function(data) {
                if (data.status === "success") {
                    $("#quantityAvailabilityMessage").text("");
                    $("#buttonAdd").prop("disabled", false);
                } else {
                    $("#quantityAvailabilityMessage").text("Product not found."); 
                    $("#buttonAdd").prop("disabled", true); 
                }
            },
            error: function(xhr, status, error) {
                console.log("Error checking product availability:", error);
            }
        });
    } else {
        $("#buttonAdd").prop("disabled", true); 
        $("#quantityAvailabilityMessage").text(""); 
    }
}

$(".product-details").append('<div id="quantityAvailabilityMessage" style="color: red;"></div>');

$("#inputProductName, #inputProductSize").on("input", function() {
    checkProductAvailability();
});
</script>
</body>

</html>