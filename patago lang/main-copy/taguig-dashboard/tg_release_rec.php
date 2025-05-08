<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// if (!isset($_SESSION['usertype'])) {
//     header('Location: ../../index.php');
//     exit();
// }
// $usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
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
    FROM taguig_orders o
    JOIN taguig_customers c ON o.customer_id = c.id
    JOIN taguig_order_items i ON o.id = i.order_id
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
    <link rel="stylesheet" href="taguig_css/tg_release_tbl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="taguig_js/sweetalert.js"></script>

</head>

<body>

    <!-- <input type="text" id="search" placeholder="Search product..." onkeyup="searchProducts()"> -->
    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
        <input type="text" id="search" placeholder="Search..." onkeyup="searchProducts()"
            style="padding: 8px; width: 200px; border: 1px solid #ccc; border-radius: 5px;">


        <button id="exportButton">
            Export to Excel
        </button>
    </div>

    <div class="center-container">
        <div class="table-container">
            <table>
                <thead>
                    <tr>


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

                            <td><?php echo $row['customer_name']; ?></td>
                            <td><?php echo $row['customer_contact']; ?></td>
                            <td><?php echo $row['customer_address']; ?></td>
                            <td><?php echo $row['order_date']; ?></td>
                            <td><?php echo $row['product_names']; ?></td>
                            <td><?php echo $row['product_sizes']; ?></td>
                            <td><?php echo $row['product_quantities']; ?></td>
                            <td><?php echo '₱' . number_format($row['product_prices'], 2); ?></td>
                            <td><?php echo '₱' . number_format($row['total_prices'], 2); ?></td>

                            <td>

                                <div class="button-container">
                                    <a href="tg_view_release.php?id=<?php echo $row['order_id']; ?>"
                                        style="text-decoration:none; color:black;">
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

    <script src="taguig_js/javascript2.js"></script>
    <script src="taguig_js/jquery.js"></script>
    <script src="taguig_js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on("click", ".btnDelete", function() {
                let orderid = $(this).data("id");

                if (confirm("Are you sure you want to delete this order?")) {
                    $.ajax({
                        url: "tg_delete_release_rec.php",
                        // url: "delete_order.php",
                        method: "POST",
                        data: {
                            order_id: orderid
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
        function searchProducts() {
            const input = document.getElementById("search");
            const filter = input.value.toLowerCase();
            const table = document.querySelector("table");
            const trs = table.querySelectorAll("tbody tr");

            trs.forEach(row => {
                const cells = row.querySelectorAll("td");
                let matchFound = false;

                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(filter)) {
                        matchFound = true;
                    }
                });

                row.style.display = matchFound ? "" : "none";
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