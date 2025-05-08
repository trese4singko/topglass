<?php
if (isset($_POST['eid'])) {
    $eid = $_POST['eid'];

    include_once("connection.php");
    $deletequery = mysqli_query($con, "delete from mkt_add_prod_data where product_id='$eid'");
    if ($deletequery) {
        echo "record has been deleted";
    } else {
        echo mysqli_error($con);
    }
} else {
    echo "intruder";
}