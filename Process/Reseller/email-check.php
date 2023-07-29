<?php
include ('../../Process/server.php');
require '../../PhpMailer/includes/PHPMailer.php';
require '../../PhpMailer/includes/SMTP.php';
require '../../PhpMailer/includes/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();

error_reporting(E_ALL);

    if (isset($_POST['check'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $emailCheckQuery = "SELECT * FROM reseller WHERE email = '$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        if ($emailCheckResult) {
            if (mysqli_num_rows($emailCheckResult) > 0) {
                $code = rand(999999, 111111);
                $updateQuery = "UPDATE reseller SET code = $code WHERE email = '$email'";
                $updateResult = mysqli_query($conn, $updateQuery);
                if ($updateResult) {
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "tls";
                    $mail->Port = "587";
                    $mail->Username = "buildupofficial2022@gmail.com";
                    $mail->Password = "xhnzzqocjuatekle";
                    $mail->Subject = "BuildUp | Email Verification Code";
                    $mail->setFrom('buildupofficial2022@gmail.com');
                    $mail->isHTML(true);
                    $mail->Body = "Your verificaction code is <br><h4>$code</h4>";
                    $mail->addAddress($email);
                    if ( $mail->send() ) {
                        $_SESSION['message'] = "We've sent a verification code to your email <br> $email";
                        header('location: ../../Reseller/verify-code.php');
                    }else{
                        echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
                    }
                    $mail->smtpClose();

                } else {
                    $_SESSION['message_error'] = "Failed while inserting data into database!";
                    header('location: ../../Reseller/forgot-password.php');
                }
            }else{
                $_SESSION['message_error'] = "This email address does not exist!";
                header('location: ../../Reseller/forgot-password.php');
            }
        }else {
            $_SESSION['message_error'] = "This email address does not exist!";
            header('location: ../../Reseller/forgot-password.php');
        }
    }
?>