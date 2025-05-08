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
    <title>Admin Dashboard - Sales Analysis</title>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            padding: 30px;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        .chart-title {
            font-size: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <p>Monthly Sales Analysis for All Branches</p>
</header>

<div class="container">
    <div class="card">
        <div class="chart-title">Branch Sales Overview</div>
        <div id="chartContainer" style="height: 400px; width: 100%;"></div>
    </div>
</div>

<script type="text/javascript">
window.onload = function () {
    fetch("data.php")
    .then(response => response.json())
    .then(dataPoints => {
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light1",
            animationEnabled: true,
            title: {
                text: "Monthly Sales Report - Makati, Taguig, Pampanga"
            },
            axisY: {
                title: "Total Sales",
                prefix: "₱"
            },
            data: [{
                type: "column",
                dataPoints: dataPoints
            }]
        });
        chart.render();
    });
}
</script>

</body>
</html>
