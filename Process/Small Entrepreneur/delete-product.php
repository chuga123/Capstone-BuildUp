<?php
session_start();

include ('../../Process/server.php');

if(isset($_GET['product_id']) && ($_GET['entrep_id']))
{
    $entrep_id = $_GET['entrep_id'];
    $product_id = $_GET['product_id'];
     $sql = "DELETE FROM uploaded_product WHERE product_id='$product_id'";
     if (mysqli_query($conn, $sql)) {
         $_SESSION['success'] = "Product deleted successfully!";
         header ("Location: ../../Small-Entrepreneur/home.php?entrep_id=$entrep_id&&Product deleted successfully!");
     }else{
        echo error_reporting(E_ALL);
     }
}else{
   $_SESSION['failed'] = "Already Deleted!";
   header ("Location: ../../Small-Entrepreneur/home.php?entrep_id=".$entrep_id."&&Already deleted!");
}

?>