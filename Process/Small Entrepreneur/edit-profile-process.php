<?php
error_reporting(E_ALL);
date_default_timezone_set("Asia/Manila");
session_start();

include ('../../Process/server.php');


    if(isset($_POST['update_profile'])){
        $description = $_FILES["profileImage"]["name"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $contact = $_POST["contact"];
        $email = $_POST["email"];
        $fileTempName = $_FILES['profileImage']['tmp_name'];
        $fileSize = $_FILES['profileImage']['size'];
        $fileError = $_FILES['profileImage']['error'];
        $fileType = $_FILES['profileImage']['type'];
        $id = $_SESSION['entrep_id'];
        $oldfile = $_POST["oldfile"];

        $fileExt = explode('.',$description);
        $fileActualExt = strtolower(end($fileExt));

        $allowedExt = array("jpg","jpeg","png");
        
        if(!empty($_FILES['profileImage']['name'])){
            if(in_array($fileActualExt, $allowedExt)){
                if($fileError == 0){
                    if($fileSize < 50000000){
                        $fileNemeNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = "Profile Pictures/".$fileNemeNew;
                        move_uploaded_file($fileTempName, $fileDestination);
                        $sql = "UPDATE entrep_profile_pic SET filepath='$fileDestination', status='1'
                        WHERE entrep_id='$id'";
                        if (mysqli_query($conn, $sql)) {
                            $sqla = "UPDATE entrep SET firstname='$firstname', lastname='$lastname', contact='$contact', email='$email'
                            WHERE entrep_id='$id'";
                            if (mysqli_query($conn, $sqla)) {
                                $_SESSION['success'] = "Profile updated successfully!";
                                header ("Location: ../../Small-Entrepreneur/home.php?entrep_id=".$id."&&Profile updated successfully!");
                            }else{
                                echo "Error: " . mysqli_error($conn); 
                            }
                        }else{
                            echo "Error: " . mysqli_error($conn);
                        }
                    }else{
                        $_SESSION['failed'] = "File too large!";
                        header ("Location: ../../Small-Entrepreneur/edit-profile.php?entrep_id=".$id."&&File to large!");
                    }
                }else{
                    $_SESSION['failed'] = "File too large!";
                    header ("Location: ../../Small-Entrepreneur/edit-profile.php?entrep_id=".$id."&&File to large!");
                }
            }else{
                $_SESSION['failed'] = "This file type is not supported!";
                header ("Location: ../../Small-Entrepreneur/edit-profile.php?entrep_id=".$id."&&You can't upload this extention of file");
            }
        }else{
            $sqls = "UPDATE entrep SET firstname='$firstname', lastname='$lastname', contact='$contact', email='$email'
            WHERE entrep_id='$id'";
                if (mysqli_query($conn, $sqls)) {
                        $sql = "UPDATE entrep_profile_pic SET filepath='$oldfile' 
                        WHERE entrep_id='$id'";
                        if (mysqli_query($conn, $sql)) {
                            $_SESSION['success'] = "Profile updated successfully!";
                            header ("Location: ../../Small-Entrepreneur/home.php?entrep_id=".$id."&&Profile updated successfully");
                        }else {
                    echo "Error: " . mysqli_error($conn);
                }
                }else {
                    echo "Error: " . mysqli_error($conn);
                }
        }
    }

?>