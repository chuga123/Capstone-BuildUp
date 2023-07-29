<?php 
session_start();
include ('../Process/server.php');


if(isset($_GET['user_id']) && ($_GET['role'])){
    $role = $_GET['role'];
    $user_id = $_GET['user_id'];

    $sqlreject = mysqli_query($conn, "DELETE FROM payment WHERE user_id='$user_id' AND user_role='$role'");
    if($sqlreject){
        if($role === 'Reseller'){
            $result = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$user_id");
            $row = mysqli_fetch_array($result);
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $_SESSION['accepted'] = "Payment Rejected <i class='fa-solid fa-circle-xmark'></i><br>Payment of user <b>$fname $lname</b> was rejected .";
            header ("Location: admin-users.php");

        }else{
            $result = mysqli_query($conn, "SELECT * FROM entrep WHERE entrep_id=$user_id");
            $row = mysqli_fetch_array($result);
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $_SESSION['accepted'] = "Payment Rejected <i class='fa-solid fa-circle-xmark'></i><br>Payment of user <b>$fname $lname</b> was rejected .";
            header ("Location: admin-users.php");
        }
    }
}
?>