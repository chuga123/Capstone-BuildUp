<?php
include ('../../Process/server.php');
session_start();


if(isset($_POST['changepassword'])){
    $password = $_POST['password'];
    $confirmPassword = $_POST['passwordconfirm'];
    
    if (strlen($_POST['password']) < 8) {
        $_SESSION['message_error'] = 'Must be at least 8 characters';
        header("location: ../../Small-Entrepreneur/newpassword.php");
    } else if(ctype_space($_POST['password'])){
        $_SESSION['message_error'] = "Invalid password";
        header("location: ../../Small-Entrepreneur/newpassword.php");
    } else {
        if ($_POST['password'] != $_POST['passwordconfirm']) {
            $_SESSION['message_error'] = "Password not matched";
            header("location: ../../Small-Entrepreneur/newpassword.php");
        } else {
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE reseller SET password = '$password' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword);
            if ($updatePass) {
                session_unset($email);
                session_destroy();
                session_start();
                $_SESSION['message'] = 'Password successfully changed';
                header('location: ../../Reseller/sign-in.php');
            }else{

            }
        }
    }
}

?>