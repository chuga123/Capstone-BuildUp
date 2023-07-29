<?php 
session_start();
include ('../Process/server.php');


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $sqlverify = mysqli_query($conn, "UPDATE entrep SET status='verified' WHERE entrep_id='$user_id'");
    if($sqlverify){
        $sqlpayment = mysqli_query($conn, "DELETE FROM verify WHERE user_id='$user_id'");
        if($sqlpayment){
            $result = mysqli_query($conn, "SELECT * FROM entrep WHERE entrep_id=$user_id");
            $row = mysqli_fetch_array($result);
            $fname = $row['firstname'];
            $lname = $row['lastname'];

            $_SESSION['accepted'] = "Verification Completed <i class='fa-solid fa-circle-check'></i><br>The user <b>$fname $lname</b> is now Verified.";
            header ("Location: admin-users.php");
        }
    }
}
?>