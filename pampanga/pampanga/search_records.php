<?php
// search_product.php
include("connection.php");

// Check if the 'query' parameter is set
if (isset($_POST['query'])) {
    $search_query = $_POST['query'];

    // Escape the user input to prevent SQL injection
    $search_query = mysqli_real_escape_string($con, $search_query);

    // SQL query to search for products based on the user input
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
        WHERE i.product_name LIKE '%$search_query%' OR i.size LIKE '%$search_query%' OR c.name LIKE '%$search_query%'
        GROUP BY o.id
        ORDER BY o.order_date DESC
    ";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Output the results in table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['order_id']}</td>
                    <td>{$row['customer_name']}</td>
                    <td>{$row['customer_contact']}</td>
                    <td>{$row['customer_address']}</td>
                    <td>{$row['order_date']}</td>
                    <td>{$row['product_names']}</td>
                    <td>{$row['product_sizes']}</td>
                    <td>{$row['product_quantities']}</td>
                    <td>{$row['product_prices']}</td>
                    <td>{$row['total_prices']}</td>
                    <td>
                        <div class='button-container'>
                            <a href='view_order.php?id={$row['order_id']}' style='text-decoration:none; color:black;'>
                                <span class='fa-stack' title='View'>
                                    <i class='fas fa-square fa-stack-2x custom-coloreye'></i>
                                    <i class='fas fa-eye fa-stack-1x fa-inverse'></i>
                                </span>
                            </a>
                            <button class='btnDelete' data-id='{$row['order_id']}' title='Delete'>
                                <span class='fa-stack'>
                                    <i class='fas fa-square fa-stack-2x custom-colortrash'></i>
                                    <i class='fas fa-trash fa-stack-1x custom-color'></i>
                                </span>
                            </button>
                        </div>
                    </td>
                  </tr>";
        }
    } else {
        // If no results found
        echo "<tr><td colspan='11' style='text-align:center;'>No records found</td></tr>";
    }
}
?>
