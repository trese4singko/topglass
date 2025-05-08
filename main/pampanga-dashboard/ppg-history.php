<?php
include('connection.php');

function getMakatiActivityLogs($con) {
    $query = "SELECT * FROM ppg_activity_logs ORDER BY timestamp DESC";
    $result = mysqli_query($con, $query);
    return $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
}

$activityLogs = getMakatiActivityLogs($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pampanga Activity History</title>

    <link rel="stylesheet" href="css/history.css">
</head>
<body>

<h2>Pampanga Branch - Activity History</h2>
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
            <?php foreach ($activityLogs as $log): ?>
                <tr>
                    <td><?= htmlspecialchars($log['username']) ?></td>
                    <td><?= htmlspecialchars($log['action']) ?></td>
                    <td><?= htmlspecialchars($log['item_id']) ?></td>
                    <td><?= htmlspecialchars($log['description']) ?></td>
                    <td><?= htmlspecialchars($log['timestamp']) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($activityLogs)) echo "<tr><td colspan='5'>No activity yet.</td></tr>"; ?>
        </tbody>
    </table>
</div>
</body>
</html>