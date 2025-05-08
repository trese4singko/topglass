<?php
// session_start();
include('connection.php');
$query = "SELECT * FROM makati_activity_logs ORDER BY timestamp DESC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Activity</title>

    <link rel="stylesheet" href="css/history.css">
</head>

<body>

    <header id="h1">
        <h2>Activity History</h2>
    </header>

    <div class="activity-history-wrapper">
        <table border="1" cellpadding="10" cellspacing="0" class="activity-history-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Action</th>
                    <th>Item ID</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                 
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['action'] . "</td>
                                <td>" . $row['item_id'] . "</td>
                                <td>" . $row['description'] . "</td>
                                <td>" . $row['timestamp'] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No activity logs available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>

<?php
mysqli_close($con);
?>