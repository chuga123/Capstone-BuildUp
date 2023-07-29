<?php
error_reporting(E_ALL);
date_default_timezone_set("Asia/Manila");
session_start();

include ('../Process/server.php');


    if(isset($_POST['update'])){
        $oldfile = $_POST['oldfile'];
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $bname = $_POST['bname'];
        $lob = $_POST['lob'];
        $ingredients = $_POST['ingredients'];
        $procedures = $_POST['procedure'];
        $capital = $_POST['capital'];
        $source = $_POST['source'];
        $date = date("m-d-Y");
        $business_id = $_SESSION['business_id'];

        $procedure=str_replace("'", "&#039;", $procedures);

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowedExt = array("jpg","jpeg","png");
        if(!empty($_FILES['file']['name'])){

            if(in_array($fileActualExt, $allowedExt)){
                if($fileError == 0){
                    if($fileSize < 50000000){
                        $fileNemeNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = "../Recommender Images/".$fileNemeNew;
                        move_uploaded_file($fileTempName, $fileDestination);
                        $sql = "UPDATE businesses SET business_name='$bname', line_of_business='$lob', image='$fileNemeNew', ingredients_materials='$ingredients', method='$procedure', costing='$capital', source='$source', date_added='$date'
                            WHERE business_id='$business_id'";
                            if (mysqli_query($conn, $sql)) {
                                $_SESSION['accepted'] = "Updated Successfully <i class='fa-solid fa-circle-check'></i><br>The business <b>$bname</b> is now updated.";
                                unset($business_id);
                                header ("Location: admin-business.php?show=all");
                            }else {
                                echo "Error: " . mysqli_error($conn);
                            }
                    }else{
                        $_SESSION['failed'] = "File too large!";
                        header ("Location: admin-business.php?show=all&&business_id=new");
                    }
                }else{
                    $_SESSION['failed'] = "File too large!";
                    header ("Location: admin-business.php?show=all&&business_id=new");
                }
            }else{
                $_SESSION['failed'] = "This file type is not supported!";
                header ("Location: admin-business.php?show=all&&business_id=new");
            }
        }else{
            $sql = "UPDATE businesses SET business_name='$bname', line_of_business='$lob', image='$oldfile', ingredients_materials='$ingredients', method='$procedure', costing='$capital', source='$source', date_added='$date'
            WHERE business_id='$business_id'";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['accepted'] = "Updated Successfully <i class='fa-solid fa-circle-check'></i><br>The business <b>$bname</b> is now updated.";
                    unset($business_id);
                    header ("Location: admin-business.php?show=all");
                }else {
                    echo "Error: " . mysqli_error($conn);
                }
        }
    }
?>