<?php
include ('../../Process/server.php');
session_start();

if(isset($_POST['verify'])){
    $OTPverify = mysqli_real_escape_string($conn, $_POST['code']);
    $verifyQuery = "SELECT * FROM reseller WHERE code = $OTPverify";
    $runVerifyQuery = mysqli_query($conn, $verifyQuery);
    if($runVerifyQuery){
        if(mysqli_num_rows($runVerifyQuery) > 0){
            $newQuery = "UPDATE reseller SET code = 0";
            $run = mysqli_query($conn,$newQuery);
            header("location: ../../Reseller/newpassword.php");
        }else{
            $_SESSION['message_error'] = "Invalid verification code";
            header('location: ../../Reseller/verify-code.php');
        }
    }else{
        $_SESSION['message_error'] = "Incorect verification code";
        header('location: ../../Reseller/verify-code.php');
    }
}