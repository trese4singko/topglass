<?php
include("connection.php");
include('tg_log_functions.php');

$username = $_SESSION['username'];
$action = "Super Admin viewed on Taguig Products";
logtgActivity($con, $username, $action);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usertype'])) {
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
    <title>List of Products</title>
    <link rel="stylesheet" href="taguig_css/tg_prod_tbl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="taguig_js/sweetalert.js"></script>

</head>

<body>
    <div class="up">


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
            <button onclick="confirmImport()" class="import-btn">Import</button>

            <!-- CHOOSING FILE -->
            <input type="file" id="importFile" accept=".xls,.xlsx,.csv" class="file">

        </div>


        <div class="center-container">
            <div class="table-container">
                <table id="productTable">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Unit Measurement</th>
                            <th>Product Price</th>
                            <th class="bord">
                                Product Quantity
                                <button onclick="cycleSort()" style="background:none; border:none; cursor:pointer;">
                                    <i class="fa-solid fa-sort" title="Cycle Sort by Stock Level"></i>
                                </button>
                            </th>

                            <th>Product Category</th>
                            <th>Product Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("connection.php");
                        $query = mysqli_query($con, "SELECT * FROM producttabletaguig");
                        $i = 0;
                        while ($result = mysqli_fetch_array($query)) {
                            // Set class for row color
                            $rowClass = '';
                            if ($result['quantity_on_hand'] == 0) {
                                $rowClass = 'out-of-stock';  // Red color for 0 stock
                            } elseif ($result['quantity_on_hand'] <= 20) {
                                $rowClass = 'low-stock';  // Orange color for stock <= 20
                            }
                        ?>
                            <tr data-index="<?php echo $i++; ?>" class="<?php echo $rowClass; ?>">
                                <td><?php echo ($result['name']); ?></td>
                                <td><?php echo ($result['size']); ?></td>
                                <td><?php echo '₱' . number_format($result['price'], 2); ?></td>
                                <td><?php echo ($result['quantity_on_hand']); ?></td>
                                <td><?php echo ($result['category']); ?></td>
                                <td><?php echo ($result['status']); ?></td>
                                <td>
                                    <div class="button-container">
                                        <a href="tg_edit_prod.php?id=<?php echo $result['product_id']; ?>"
                                            style="text-decoration:none; color:black;">
                                            <span class="fa-stack" title="edit">
                                                <i class="fas fa-square fa-stack-2x custom-colorpen"></i>
                                                <i class="fas fa-pen fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="tg_viewprod.php?id=<?php echo $result['product_id']; ?>"
                                            style="text-decoration:none; color:black;">
                                            <span class="fa-stack" title="view">
                                                <i class="fas fa-square fa-stack-2x custom-coloreye"></i>
                                                <i class="fas fa-eye fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <button class="btndelete" id="<?php echo $result['product_id']; ?>" title="Delete">
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










        <!-- ✅ JavaScript to handle sorting (place this before </body>) -->


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $(document).on("click", ".btndelete", function() {
                    let eid = $(this).attr("id");

                    if (confirm("Are you sure you want to delete this record?")) {
                        $.ajax({
                            url: "tg_delete_item.php",
                            method: "POST",
                            data: {
                                eid: eid
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
                    const table = document.getElementById("productTable");
                    const trs = table.getElementsByTagName("tr");

                    for (let i = 1; i < trs.length; i++) { // Start from 1 to skip header row
                        let tds = trs[i].getElementsByTagName("td");
                        let rowMatches = false;

                        for (let j = 0; j < tds.length; j++) {
                            const td = tds[j];
                            if (td && td.textContent.toLowerCase().includes(filter)) {
                                rowMatches = true;
                                break;
                            }
                        }

                        trs[i].style.display = rowMatches ? "" : "none";
                    }
                }
       


        function confirmImport() {
        var fileInput = document.getElementById("importFile");
        var file = fileInput.files[0];

        if (!file) {
        Swal.fire({
        title: "Error!",
        text: "Please select a file first.",
        icon: "error",
        confirmButtonText: "OK",
        });
        return;
        }

        var formData = new FormData();
        formData.append("import_file", file);

        $.ajax({
        url: "import.php",
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
        confirmButton: "swal-export-btn",
        },
        }).then((result) => {
        if (result.isConfirmed) {
        window.location.reload();
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
        confirmButton: "swal-export-btn",
        cancelButton: "swal-cancel-btn",
        },
        }).then((result) => {
        if (result.isConfirmed) {
        window.location.href = "export.php";
        }
        });
        });
        </script>

        <!-- ✅ SORT FUNCTION SCRIPT -->
        <script>
            let sortState = 0;

            function cycleSort() {
                const table = document.getElementById("productTable");
                const tbody = table.querySelector("tbody");
                const rows = Array.from(tbody.rows);

                if (sortState === 0) {
                    // Sort: High to Low
                    rows.sort((a, b) => {
                        const aQty = parseInt(a.cells[3].innerText);
                        const bQty = parseInt(b.cells[3].innerText);
                        return bQty - aQty; // Descending
                    });
                    sortState = 1;
                } else if (sortState === 1) {
                    // Sort: Low to High
                    rows.sort((a, b) => {
                        const aQty = parseInt(a.cells[3].innerText);
                        const bQty = parseInt(b.cells[3].innerText);
                        return aQty - bQty; // Ascending
                    });
                    sortState = 2;
                } else {
                    // Reset to original order using data-index
                    rows.sort((a, b) => a.dataset.index - b.dataset.index);
                    sortState = 0;
                }

                // Reinsert sorted rows into tbody
                rows.forEach(row => tbody.appendChild(row));
            }

            // for abcd format 
            document.addEventListener("DOMContentLoaded", function() {
                sortTableByQuantity(); // Automatically sort the table by quantity on page load
            });

            function sortTableByQuantity() {
                const table = document.getElementById("productTable");
                const tbody = table.querySelector("tbody");
                const rows = Array.from(tbody.rows);

                // Sort the rows by the "Product Quantity" (fourth column) in ascending order (low to high)
                rows.sort((a, b) => {
                    const aQty = parseInt(a.cells[3].innerText);
                    const bQty = parseInt(b.cells[3].innerText);
                    return aQty - bQty; // Sort low to high (ascending order)
                });

                // Reinsert sorted rows back to the table
                rows.forEach(row => tbody.appendChild(row));
            }
        </script>
    </div>
</body>

</html>