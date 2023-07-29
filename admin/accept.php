<?php 
session_start();
date_default_timezone_set('Asia/Manila');  
include ('../Process/server.php');


if(isset($_GET['user_id']) && ($_GET['role'])){
    $role = $_GET['role'];
    $user_id = $_GET['user_id'];
    $current_time = time();  
    $date = date("Y-m-d");
    $expdate = date('Y-m-d', strtotime(' + 3 months'));

    $sqlpremium = mysqli_query($conn, "INSERT INTO premium SET user_id='$user_id', role='$role', plan_started='$date', plan_expiration='$expdate'");
    if($sqlpremium){
        $sqlpayment = mysqli_query($conn, "DELETE FROM payment WHERE user_id='$user_id' AND user_role='$role'");
        if($sqlpayment){
            if($role === 'Reseller'){
                $result = mysqli_query($conn, "SELECT * FROM reseller WHERE reseller_id=$user_id");
                $row = mysqli_fetch_array($result);
                $month = $row['month'];
                $fname = $row['firstname'];
                $lname = $row['lastname'];

                if($month == '0'){
                    $sqlreseller = mysqli_query($conn, "UPDATE reseller SET plan='premium', month='1' WHERE reseller_id=$user_id");
                    if($sqlreseller){
                        $_SESSION['accepted'] = "Payment Approved <i class='fa-solid fa-circle-check'></i><br>The user <b>$fname $lname</b> is now on premium version.";
                        header ("Location: admin-users.php");
                    }
                }else{
                    $sqlreseller = mysqli_query($conn, "UPDATE reseller SET plan='premium', month=$month+1 WHERE reseller_id=$user_id");
                    if($sqlreseller){
                        $_SESSION['accepted'] = "Payment Approved <i class='fa-solid fa-circle-check'></i><br>The user <b>$fname $lname</b> is now on premium version.";
                        header ("Location: admin-users.php");
                    }
                }
            }else{
                $result = mysqli_query($conn, "SELECT * FROM entrep WHERE entrep_id=$user_id");
                $row = mysqli_fetch_array($result);
                $month = $row['month'];
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                
                if($month == '0'){
                    $sqlentrep = mysqli_query($conn, "UPDATE entrep SET plan='premium', month='1' WHERE entrep_id=$user_id");
                    if($sqlentrep){
                        $_SESSION['accepted'] = "Payment Approved <i class='fa-solid fa-circle-check'></i><br>The user <b>$fname $lname</b> is now on premium version.";
                        header ("Location: admin-users.php");
                    }
                }else{
                    $sqlentrep = mysqli_query($conn, "UPDATE entrep SET plan='premium', month=$month+1 WHERE entrep_id=$user_id");
                    if($sqlentrep){
                        $_SESSION['accepted'] = "Payment Approved <i class='fa-solid fa-circle-check'></i><br>The user <b>$fname $lname</b> is now on premium version.";
                        header ("Location: admin-users.php");
                    }
                }
            }
        }
    }
    
}
?>