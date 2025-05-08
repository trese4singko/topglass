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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Products</title>
    <link rel="stylesheet" href="taguig_css/tg_prod_tbl.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="taguig_js/sweetalert.js"></script>

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
                <button onclick="confirmImport()" class="import-btn">Import</button>

                <!-- CHOOSING FILE -->
                <input type="file" id="importFile" accept=".xls,.xlsx,.csv" class="file">
                
            </div>

    <div class="center-container">
        <div class="table-container">
            <table>
                <thead>

                    <tr>
                        <!-- <th>Product ID</th> -->
                        <th>Product Name</th>
                        <th>Unit Measurement</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Category</th>
                        <th>Product Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("connection.php");

                    $query = mysqli_query($con, "SELECT * FROM producttabletaguig");
                    while ($result = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <!-- <td>1</td> -->
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on("click", ".btndelete", function () {
                let eid = $(this).attr("id"); 

                if (confirm("Are you sure you want to delete this record?")) {
                    $.ajax({
                        url: "tg_delete_item.php",
                        method: "POST",
                        data: {
                            eid: eid
                        },
                        success: function (response) {
                            alert(response);
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            alert("Error: " + error);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(document).on("click", ".btndelete", function () {
                let eid = $(this).attr("id"); 

                if (confirm("Are you sure you want to delete this record?")) {
                    $.ajax({
                        url: "delete_item.php",
                        method: "POST",
                        data: {
                            eid: eid,
                        },
                        success: function (response) {
                            alert(response);
                            location.reload(); 
                        },
                        error: function (xhr, status, error) {
                            alert("Error: " + error);
                        },
                    });
                }
            });
        });

        // for search
        function searchProducts() {
            let query = $("#search").val();

            $.ajax({
                url: "search_product.php",
                method: "POST",
                data: {
                    query: query,
                },
                success: function (response) {
                    $("tbody").html(response);
                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                },
            });
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


</body>

</html>