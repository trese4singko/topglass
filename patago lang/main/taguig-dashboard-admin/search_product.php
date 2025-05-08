<?php
include("connection.php");

$query = isset($_POST['query']) ? $_POST['query'] : '';

$sql = "SELECT * FROM producttabletaguig WHERE 
        name LIKE '%$query%' OR 
        size LIKE '%$query%' OR 
        category LIKE '%$query%' OR 
        status LIKE '%$query%'";

$result = mysqli_query($con, $sql);

$output = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $output .= "<tr>
            <td>{$row['name']}</td>
            <td>{$row['size']}</td>
            <td>{$row['price']}</td>
            <td>{$row['quantity_on_hand']}</td>
            <td>{$row['category']}</td>
            <td>{$row['status']}</td>
            <td>
                <div class='button-container'>
                    <a href='edit_product.php?id={$row['product_id']}' style='text-decoration:none; color:black;'>
                        <span class='fa-stack' title='edit'>
                            <i class='fas fa-square fa-stack-2x custom-colorpen'></i>
                            <i class='fas fa-pen fa-stack-1x fa-inverse'></i>
                        </span>
                    </a>
                    <a href='viewproduct.php?id={$row['product_id']}' style='text-decoration:none; color:black;'>
                        <span class='fa-stack' title='view'>
                            <i class='fas fa-square fa-stack-2x custom-coloreye'></i>
                            <i class='fas fa-eye fa-stack-1x fa-inverse'></i>
                        </span>
                    </a>
                    <button class='btndelete' id='{$row['product_id']}' title='Delete'>
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
    $output = "<tr><td colspan='7'>No results found</td></tr>";
}

echo $output;
?>
