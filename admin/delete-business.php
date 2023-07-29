<?php 
session_start();
include ('../Process/server.php');


if(isset($_GET['show']) && ($_GET['business_id'])){
    $id = $_GET['business_id'];
    $show = $_GET['show'];

    $result = mysqli_query($conn, "SELECT * FROM businesses WHERE business_id=$id");
    $row = mysqli_fetch_array($result);
    $bname = $row['business_name'];
    if($result){
        $sqldelete = mysqli_query($conn, "DELETE FROM businesses WHERE business_id='$id'");
        if($sqldelete){
            $_SESSION['accepted'] = "Successfully deleted <i class='fa-solid fa-circle-xmark'></i><br>The business <b>$bname</b> was deleted.";
            header ("Location: admin-business.php?show=$show");
        }
    }
}
