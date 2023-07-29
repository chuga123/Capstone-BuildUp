<?php
error_reporting(E_ALL);
session_start();

include ('../Process/server.php');


    if(isset($_POST['verify'])){
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $id = $_SESSION['entrep_id'];
        $valid_id = $_POST['valid_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];

        $valid=str_replace("'", "&#039;", $valid_id);

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowedExt = array("jpg","jpeg","png");

        if(in_array($fileActualExt, $allowedExt)){
            if($fileError == 0){
                if($fileSize < 50000000){
                    $fileNemeNew = uniqid('',true).".".$fileActualExt;
                    $fileDestination = "Proof Image/".$fileNemeNew;
                    move_uploaded_file($fileTempName, $fileDestination);
                    $sql = "INSERT INTO verify (user_id, proof, type_of_id, firstname, lastname, address, contact) 
                    VALUES ('$id', '$fileNemeNew', '$valid', '$firstname', '$lastname', '$address', '$contact')";
                        if (mysqli_query($conn, $sql)) {
                            $_SESSION['submitted'] = "Form submitted <i class='fa-solid fa-circle-check'></i> <br>Please be patient as we verify your subbmitted form. Thank you";
                            header ("Location: ../Small-Entrepreneur/home.php?entrep_id=$id");
                        }else {
                            echo "Error: " . mysqli_error($conn);
                        }
                }else{
                    $_SESSION['failed'] = "File too large!";
                    header ("Location: ../Small-Entrepreneur/get-verified.php?entrep_id=$id&&File to large!");
                }
            }else{
                $_SESSION['failed'] = "File too large!";
                header ("Location: ../Small-Entrepreneur/get-verified.php?entrep_id=$id&&File to large!");
            }
        }else{
            $_SESSION['failed'] = "This file type is not supported!";
            header ("Location: ../Small-Entrepreneur/get-verified.php?entrep_id=$id&&You can't upload this extention of file");
        }
    }
?>