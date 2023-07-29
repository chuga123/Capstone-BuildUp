<?php 
session_start();
include ('../Process/server.php');


if(isset($_GET['reseller_id'])){
    $reseller_id = $_GET['reseller_id'];

    $result = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$reseller_id");
    $row = mysqli_fetch_array($result);
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    if($result){
        $sqldelete = mysqli_query($conn, "DELETE FROM reseller WHERE reseller_id='$reseller_id'");
        if($sqldelete){
            $_SESSION['deleted'] = "User Deleted <i class='fa-solid fa-circle-xmark'></i><br>The account of <b>$fname $lname</b> was deleted.";
            header ("Location: admin-users.php");
        }
    }
}else {
    $entrep_id = $_GET['entrep_id'];

    $result = mysqli_query($conn, "SELECT * FROM entrep WHERE entrep_id=$entrep_id");
    $row = mysqli_fetch_array($result);
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    if($result){
        $sqldelete = mysqli_query($conn, "DELETE FROM entrep WHERE entrep_id='$entrep_id'");
        if($sqldelete){
            $_SESSION['deleted'] = "User Deleted <i class='fa-solid fa-circle-xmark'></i><br>The account of <b>$fname $lname</b> was deleted.";
            header ("Location: admin-users.php");
        }
    }
}
?>