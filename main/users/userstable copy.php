<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once 'connection.php';
// Check if the user is logged in
if (!isset($_SESSION['usertype'])) {
    header('Location:  ../index.php'); // Redirect to login page if not logged in
    exit();
}

// Check if the user is Makati Admin
if ($_SESSION['usertype'] !== 'admin') {
    // Redirect to a page indicating no access, or an error page
    header('Location:  ../index.php');
    exit();
}

$usertype = isset($_SESSION['usertype']) ? htmlspecialchars($_SESSION['usertype']) : 'Guest';
$nickname = isset($_SESSION['nickname']) ? htmlspecialchars($_SESSION['nickname']) : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Employees</title>
    <link rel="stylesheet" href="users/css/userstable.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>

<body>
    <div class="top">


        <div>
            <input type="text" id="search" placeholder="Search employee..." onkeyup="searchProducts()">
            <button id="exportButton" class="btn btn-primary">Export to Excel</button>
        </div>
<br>
        <div class="center-container">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                          
                            <th>Username</th>
                            <th>Password</th>
                            <th>UserType</th>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <?php
                        $query = mysqli_query($con, "SELECT * FROM usertb");
                        while ($result = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                          
                                <td><?php echo ($result['username']); ?></td>
                                <td><?php echo ($result['p1']); ?></td>
                                <td><?php echo ($result['usertype']); ?></td>
                                <td><?php echo ($result['fullname']); ?></td>
                                <td><?php echo ($result['email']); ?></td>
                                <td><?php echo ($result['phone']); ?></td>
                                <td><?php echo ($result['address']); ?></td>
                                <td>
                                    <div class="button-container">
                                        <a href="users/edit_user.php?id=<?php echo $result["userid"]; ?>" style="text-decoration: none;">
                                            <span class="fa-stack" title="Edit">
                                                <i class="fas fa-square fa-stack-2x custom-colorpen"></i>
                                                <i class="fas fa-pen fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="users/view_user.php?id=<?php echo $result["userid"]; ?>" style="text-decoration: none;">
                                            <span class="fa-stack" title="View">
                                                <i class="fas fa-square fa-stack-2x custom-coloreye"></i>
                                                <i class="fas fa-eye fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <button class="btndelete" id="<?php echo $result['userid']; ?>" title="Delete">
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
    </div>
    <script src="js/sweetalert.js"></script>
    <script src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).on("click", ".btndelete", function() {
            let eid = $(this).attr("id");

            if (confirm("Are you sure you want to delete this record?")) {
                $.ajax({
                    url: "users/delete_datauser.php",
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

        function searchProducts() {
            let query = $("#search").val();

            $.ajax({
                url: "search_users.php",
                method: "POST",
                data: {
                    query: query,
                },
                success: function(response) {
                    $("#userTableBody").html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                },
            });
        }
    </script>
    <script>
        function searchProducts() {
            const input = document.getElementById("search");
            const filter = input.value.toLowerCase();
            const table = document.querySelector("table");
            const rows = table.getElementsByTagName("tr");

            // Loop through all table rows (except the header)
            for (let i = 1; i < rows.length; i++) {
                let row = rows[i];
                let cells = row.getElementsByTagName("td");
                let rowContainsQuery = false;

                // Check if any cell in the row contains the filter text
                for (let j = 0; j < cells.length; j++) {
                    let cell = cells[j];
                    if (cell) {
                        if (cell.textContent.toLowerCase().includes(filter)) {
                            rowContainsQuery = true;
                            break;
                        }
                    }
                }

                // Show or hide the row
                row.style.display = rowContainsQuery ? "" : "none";
            }
        }
    </script>
    <script>
        document.getElementById("exportButton").addEventListener("click", function() {
            window.location.href = "users/export-excel.php";
        });
    </script>

</body>

</html>