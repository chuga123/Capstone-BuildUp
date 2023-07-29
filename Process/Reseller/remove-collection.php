<?php
error_reporting(E_ALL);
date_default_timezone_set("Asia/Manila");
session_start();

include ('../../Process/server.php');

if(isset($_SESSION['reseller_id']) && ($_GET['product_id']))
{
    $reseller_id = $_SESSION['reseller_id'];
    $product_id = $_GET['product_id'];
    $filter = $_GET['filter'];
    $sql = "DELETE FROM saved_product WHERE reseller_id='$reseller_id' and product_id='$product_id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "Product removed!";
            header ("Location: ../../Reseller/collection.php?reseller_id=$reseller_id&&filter=$filter&&Product Removed!");
        }else{
            echo error_reporting(E_ALL);
        }
}else{
    echo "Error: " . mysqli_error($conn);
}

?>