<?php
error_reporting(E_ALL);
date_default_timezone_set("Asia/Manila");
session_start();

include ('../Process/server.php');

    if(isset($_POST['upgrade'])){
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $ref = $_POST['ref'];
        $amount = $_POST['amount'];
        $date_paid = $_POST['date_paid'];
        $time_paid = $_POST['time_paid'];
        $role = $_POST['role'];
        

        $times = explode(":", $time_paid);
        $time1 = $times[0];
        $time2 = $times[1];
        if($time1 > 12){
            $hour = $time1-12;
            $time = 'pm';
        }else if($time1 < 12) {
            $time = 'am';
            $hour = $time1;
            if ($time1 == 0){
                $time1 = '12';
            }
        }else {
            $time = 'pm';
        }

        $time_paids = ($hour.':'.$time2.' '.$time);
        if(empty($_SESSION['reseller_id'])){
            $id = $_SESSION['entrep_id'];
        }else{
            $id = $_SESSION['reseller_id'];
        }
        if($role == 'Reseller'){
            $sql = "SELECT * FROM reseller WHERE reseller_id='$id'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                $month= $row["month"];
                }
            }
        }else if($role == 'Small Entrepreneur') {
            $sql = "SELECT * FROM entrep WHERE entrep_id='$id'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                $month= $row["month"];
                }
            }           
        }

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowedExt = array("jpg","jpeg","png");

        if(in_array($fileActualExt, $allowedExt)){
            if($fileError == 0){
                if($fileSize < 50000000){
                    $fileNemeNew = uniqid('',true).".".$fileActualExt;
                    $fileDestination = "Payment Image/".$fileNemeNew;
                    move_uploaded_file($fileTempName, $fileDestination);
                    $sql = "INSERT INTO payment (user_id, user_role, cost, month, gcash_ss, gcash_reference, date_paid, time_paid) 
                    VALUES ('$id', '$role', '$amount', '$month', '$fileNemeNew', '$ref', '$date_paid', '$time_paids')";
                        if (mysqli_query($conn, $sql)) {
                                if($role == 'Reseller'){
                                    $_SESSION['submitted'] = "Form submitted <i class='fa-solid fa-circle-check'></i> <br>Please be patient as we verify your payment. Thank you";
                                    header ("Location: ../Reseller/home.php?reseller_id=$id&&filter=All");
                                }else{
                                    $_SESSION['submitted'] = "Form submitted <i class='fa-solid fa-circle-check'></i> <br>Please be patient as we verify your payment. Thank you";
                                    header ("Location: ../Small-Entrepreneur/home.php?entrep_id=$id");
                                }
                        }else {
                            echo "Error: " . mysqli_error($conn);
                        }
                }else{
                    $_SESSION['failed'] = "File too large!";
                    header ("Location: payment-form.php?for=reseller");
                }
            }else{
                $_SESSION['failed'] = "File too large!";
                header ("Location: payment-form.php?for=reseller");
            }
        }else{
            $_SESSION['failed'] = "Please attach your e-receipt";
            header ("Location: payment-form.php?for=reseller");
        }
    }
?>