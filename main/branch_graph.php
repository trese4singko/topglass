<?php
$host = 'localhost';
$db_username = 'root';
$db_password = '';
$db = 'tgac';
$con = mysqli_connect($host, $db_username, $db_password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch total inventory for each branch
$taguigData = $con->query("SELECT COUNT(*) AS total_inventory FROM producttabletaguig");
if ($taguigData === false) {
    die("Error fetching Taguig inventory: " . $con->error);
}
$taguigData = $taguigData->fetch_assoc();

$makatiData = $con->query("SELECT COUNT(*) AS total_inventory FROM mkt_add_prod_data");
if ($makatiData === false) {
    die("Error fetching Makati inventory: " . $con->error);
}
$makatiData = $makatiData->fetch_assoc();

$pampangaData = $con->query("SELECT COUNT(*) AS total_inventory FROM pmpng_add_prod_data");
if ($pampangaData === false) {
    die("Error fetching Pampanga inventory: " . $con->error);
}
$pampangaData = $pampangaData->fetch_assoc();

// Check if data is retrieved successfully
if (!$taguigData || !$makatiData || !$pampangaData) {
    die("Error: One or more branches did not return data.");
}

// Prepare data for JavaScript
$orderItemsData = [
    $taguigData['total_inventory'], 
    $makatiData['total_inventory'], 
    $pampangaData['total_inventory']
];

$con->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Branch Inventory Overview</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/main/branch-graph.css">
</head>
<body>
<div class="top">
<h2 align="center">Branch Inventory Overview</h2>
<canvas id="orderItemsChart" width="900" height="500" style="background-color: white;"></canvas>
</div>

<script>
  const ctx = document.getElementById('orderItemsChart').getContext('2d');
  const orderItemsChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Taguig', 'Makati', 'Pampanga'],
      datasets: [
        {
          label: 'Total Inventory',
          data: <?php echo json_encode($orderItemsData); ?>,
          backgroundColor: 'rgba(75, 192, 192, 0.8)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2
        }
      ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: 'black', 
          },
          ticks: {
            color: 'black' 
          }
        }, 
        x: {
          grid: {
            color: 'black', 
            display: true 
          },
          ticks: {
            color: 'black' 
          }
        }
      },
      plugins: {
        legend: {
          display: true,
          position: 'top',
          labels: {
            color: 'black'  
          }
        },
        tooltip: {
          enabled: true,
          titleColor: 'white', 
          bodyColor: 'white'
        }
      }
    }
  });
</script>
</body>
</html>