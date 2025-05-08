<?php
include("connection.php");
include('mkt_log_functions.php');

$username = $_SESSION['username'];
$action = "Super Admin viewed on Makati Records";
logmktActivity($con, $username, $action);

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
    FROM makati_orders o
    JOIN makati_customers c ON o.customer_id = c.id
    JOIN makati_order_items i ON o.id = i.order_id
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

    <!--CSS LINKS -->
    <link rel="stylesheet" href="css/makati_releaseprod2.css">
    <link rel="stylesheet" href="css/makati_release_prod.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/sweetalert.js"></script>

</head>

<body>

    <!-- <input type="text" id="search" placeholder="Search product..." onkeyup="searchProducts()"> -->
    <div>
        <input type="text" id="search" placeholder="Search product..." onkeyup="searchProducts()">

        <!-- <button onclick="exportTableToExcel()" style=" width:80px;  padding: 8px 15px; background: green; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    Export to Excel
                </button> -->
        <button id="exportButton">
            Export to Excel
        </button>
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
                            <td><?php echo '₱' . $row['product_prices']; ?></td>
                            <td><?php echo '₱'  . $row['total_prices']; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on("click", ".btnDelete", function() {
                let orderId = $(this).data("id");

                if (confirm("Are you sure you want to delete this order?")) {
                    $.ajax({
                        url: "makati_delete_data.php",
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

        function searchProducts() {
            const input = document.getElementById("search").value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }


        document.getElementById("exportButton").addEventListener("click", function() {
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
                    confirmButton: "swal-export-btn",
                    cancelButton: "swal-cancel-btn",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "export-records.php";
                }
            });
        });
    </script>
</body>

</html>