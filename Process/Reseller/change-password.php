<?php
include ('../../Process/server.php');
session_start();


if(isset($_POST['changepass'])){
    $id = $_SESSION['reseller_id'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $confirmpass = $_POST['confirmpass'];
    $checkpass = "SELECT * FROM reseller WHERE reseller_id='$id' AND password='$oldpass'";
    $runcheckpass = mysqli_query($conn, $checkpass);
    if(mysqli_num_rows($runcheckpass) > 0) {
        if (strlen($newpass) < 8) {
            $_SESSION['failed'] = 'Must be at least 8 characters';
            header("location: ../../Reseller/change-password.php");
        } else if(ctype_space($newpass)){
            $_SESSION['failed'] = "Invalid password";
            header("location: ../../Reseller/change-password.php");
        } else {
            if ($newpass != $confirmpass) {
                $_SESSION['failed'] = "Password not matched";
                header("location: ../../Reseller/change-password.php");
            } else {
                $updatePassword = "UPDATE reseller SET password = '$newpass' WHERE reseller_id = '$id'";
                $updatePass = mysqli_query($conn, $updatePassword);
                if ($updatePass) {
                    $_SESSION['success'] = "Password changed! ";
                    header("location: ../../Reseller/home.php?reseller_id=".$id."&&filter=All");
                } else {
                    $_SESSION['failed'] = "Can't change password";
                    header("location: ../../Reseller/change-password.php");
                }
            }
        }
    } else {
        $_SESSION['failed'] = 'Old password is incorrect!';
            header("location: ../../Reseller/change-password.php");
    }
}