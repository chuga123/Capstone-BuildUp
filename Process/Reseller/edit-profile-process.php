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
        $id = $_SESSION['reseller_id'];
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
                        $sql = "UPDATE reseller_profile_pic SET filepath='$fileDestination', status='1'
                        WHERE reseller_id='$id'";
                        if (mysqli_query($conn, $sql)) {
                            $sqla = "UPDATE reseller SET firstname='$firstname', lastname='$lastname', contact='$contact', email='$email'
                            WHERE reseller_id='$id'";
                            if (mysqli_query($conn, $sqla)) {
                                $_SESSION['success'] = "Profile updated successfully!";
                                header ("Location: ../../Reseller/home.php?reseller_id=".$id."&&filter=All&&Profile updated successfully!");
                            }else{
                                echo "Error: " . mysqli_error($conn); 
                            }
                        }else{
                            echo "Error: " . mysqli_error($conn);
                        }
                    }else{
                        $_SESSION['failed'] = "File too large!";
                        header ("Location: ../../Reseller/edit-profile.php?reseller_id=".$id."&&File to large!");
                    }
                }else{
                    $_SESSION['failed'] = "File too large!";
                    header ("Location: ../../Reseller/edit-profile.php?reseller_id=".$id."&&File to large!");
                }
            }else{
                $_SESSION['failed'] = "This file type is not supported!";
                header ("Location: ../../Reseller/edit-profile.php?reseller_id=".$id."&&You can't upload this extention of file");
            }
        }else{
            $sqls = "UPDATE reseller SET firstname='$firstname', lastname='$lastname', contact='$contact', email='$email'
            WHERE reseller_id='$id'";
                if (mysqli_query($conn, $sqls)) {
                        $sql = "UPDATE reseller_profile_pic SET filepath='$oldfile' 
                        WHERE reseller_id='$id'";
                        if (mysqli_query($conn, $sql)) {
                            $_SESSION['success'] = "Profile updated successfully!";
                            header ("Location: ../../Reseller/home.php?reseller_id=".$id."&&filter=All&&Profile updated successfully!");
                        }else {
                    echo "Error: " . mysqli_error($conn);
                }
                }else {
                    echo "Error: " . mysqli_error($conn);
                }
        }
    }

?>