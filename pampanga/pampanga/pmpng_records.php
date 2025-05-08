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


<?php
include("connection.php");

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
    FROM pmpng_orders o
    JOIN pmpng_customer c ON o.customer_id = c.id
    JOIN pmpng_order_items i ON o.id = i.order_id
    GROUP BY o.id
    ORDER BY o.order_date DESC";

$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Table</title>
    <link rel="stylesheet" href="css/pmpng_records.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js\sweetalert.js"></script>


</head>

<body>

  <!-- <input type="text" id="search" placeholder="Search product..." onkeyup="searchProducts()"> -->
      <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <input type="text" id="search" placeholder="Search product..." onkeyup="searchProducts()"
                    style="padding: 8px; width: 200px; border: 1px solid #ccc; border-radius: 5px;">

                <!-- <button onclick="exportTableToExcel()" style=" width:80px;  padding: 8px 15px; background: green; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    Export to Excel
                </button> -->
                <button id="exportButton">
                    Export to Excel
                </button>
                <!-- for import  -->
                <!-- <input type="file" id="importFile" accept=".xls,.xlsx,.csv" class="file">
                <button onclick="confirmImport()" class="import-btn">Import</button> -->
        </div>   

    <div class="center-container">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th class="date">Order Date</th>
                        <th>Product Name</th>
                        <th>Unit Measurement</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo $row['customer_name']; ?></td>
                            <td><?php echo $row['customer_contact']; ?></td>
                            <td><?php echo $row['customer_address']; ?></td>
                            <td><?php echo $row['order_date']; ?></td>
                            <td><?php echo $row['product_names']; ?></td>
                            <td><?php echo $row['product_sizes']; ?></td>
                            <td><?php echo $row['product_quantities']; ?></td>
                            <td><?php echo $row['product_prices']; ?></td>
                            <td><?php echo $row['total_prices']; ?></td>
                            <td>
                                <div class="button-container">
                                    <a href="pmpng_view_release.php?id=<?php echo $row['order_id']; ?>" style="text-decoration:none; color:black;">
                                        <span class="fa-stack" title="View">
                                            <i class="fas fa-square fa-stack-2x custom-coloreye"></i>
                                            <i class="fas fa-eye fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <button class="btnDelete" data-id="<?php echo $row['order_id']; ?>" title="Delete">
                                        <span class="fa-stack">
                                            <i class="fas fa-square fa-stack-2x custom-colortrash"></i>
                                            <i class="fas fa-trash fa-stack-1x custom-color"></i>
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery for Delete Function -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    
    <script>
        $(document).ready(function() {
            $(document).on("click", ".btnDelete", function() {
                let orderId = $(this).data("id");

                if (confirm("Are you sure you want to delete this order?")) {
                    $.ajax({
                        url: "pmpng_delete_data.php",
                        method: "POST",
                        data: {
                            order_id: orderId
                        },
                        success: function(response) {
                            alert(response);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            alert("Error: " + error);
                        }
                    });
                }
            });
        });
    </script>

<script>
        // for search
        function searchProducts() {
            let query = $("#search").val(); // Get the input value

            $.ajax({
                url: "search_records.php",
                method: "POST",
                data: {
                    query: query,
                },
                success: function (response) {
                    $("tbody").html(response); // Update table body
                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                },
            });
        }

        function confirmImport() {
            var fileInput = document.getElementById("importFile");
            var file = fileInput.files[0]; // Get the selected file

            if (!file) {
                Swal.fire({
                    title: "Error!",
                    text: "Please select a file first.",
                    icon: "error",
                    confirmButtonText: "OK",
                });
                return;
            }

            // Prepare the file data to send via AJAX
            var formData = new FormData();
            formData.append("import_file", file);

            // AJAX request to send the file to the PHP script
            $.ajax({
                url: "import.php", // PHP script to handle the import
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    Swal.fire({
                        title: "Success!",
                        text: response,
                        icon: "success",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "swal-export-btn", // Custom class for confirm button
                        },
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the current page or reload
                            window.location.reload(); // This will refresh the current page
                            // Alternatively, you can use:
                            // window.location.href = window.location.href; // This also refreshes the page
                        }
                    });
                },
                error: function () {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong during the import.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                },
            });
        }
        // for export
        // Add the SweetAlert for export confirmation inside a click handler
        document.getElementById("exportButton").addEventListener("click", function () {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to export the table to Excel.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, export it!",
                cancelButtonText: "Cancel",
                customClass: {
                    confirmButton: "swal-export-btn", // Custom class for confirm button
                    cancelButton: "swal-cancel-btn", // Custom class for cancel button
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the PHP export script
                    window.location.href = "export-records.php"; // Change 'export.php' to the path of your export script
                }
            });
        });

        // Function to handle file import (already in your code)

    </script>

</body>

</html>