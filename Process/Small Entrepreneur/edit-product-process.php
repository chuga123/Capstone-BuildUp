<?php
error_reporting(E_ALL);
date_default_timezone_set("Asia/Manila");
session_start();

include ('../../Process/server.php');


    if(isset($_POST['update_product'])){
        $oldfile = $_POST['oldfile'];
        $file = $_FILES['newImage'];
        $fileName = $_FILES['newImage']['name'];
        $fileTempName = $_FILES['newImage']['tmp_name'];
        $fileSize = $_FILES['newImage']['size'];
        $fileError = $_FILES['newImage']['error'];
        $fileType = $_FILES['newImage']['type'];
        $id = $_SESSION['entrep_id'];
        $productname = $_POST['productname'];
        $oldprice = $_POST['price'];
        if (ctype_alpha($oldprice)) {
            $_SESSION['failed'] = "Invalid price!";
            header ("Location: ../../Small-Entrepreneur/add-new-product.php?entrep_id=$id&&Invalid price!");
        }else if(trim($oldprice) == '') {   
            $_SESSION['failed'] = "Invalid price!";
            header ("Location: ../../Small-Entrepreneur/add-new-product.php?entrep_id=$id&&Invalid price!");
        }else{
            $price = number_format("$oldprice",2);
            if($price){
                $currenttime = time();
                $date = date("Y-m-d h:i:sa");
                $desc = $_POST['description'];
                $description = addslashes($desc);
                $province = $_POST['province'];
                $product_id = $_SESSION['product_id'];
        
                $fileExt = explode('.',$fileName);
                $fileActualExt = strtolower(end($fileExt));
        
                $allowedExt = array("jpg","jpeg","png");
                
                if(!empty($_FILES['newImage']['name'])){
                    if(in_array($fileActualExt, $allowedExt)){
                        if($fileError == 0){
                            if($fileSize < 50000000){
                                $fileNemeNew = uniqid('',true).".".$fileActualExt;
                                $fileDestination = "Uploaded Images/".$fileNemeNew;
                                move_uploaded_file($fileTempName, $fileDestination);
                                $sql = "UPDATE uploaded_product SET productname='$productname', productprice='$price', productimage='$fileNemeNew', productdescription='$description', province='$province', filepath='$fileDestination', uploaddate='$date' 
                                WHERE product_id='$product_id'";
                                    if (mysqli_query($conn, $sql)) {
                                        $_SESSION['success'] = "Product updated successfully";
                                        header ("Location: ../../Small-Entrepreneur/view-product.php?entrep_id=".$id."&&id=".$fileNemeNew."&&product_id=".$product_id."&&Product updated successfully");
                                    }else {
                                        echo "Error: " . mysqli_error($conn);
                                    }
                            }else{
                                $_SESSION['failed'] = "File too large!";
                                header ("Location: ../../Small-Entrepreneur/edit-product.php?entrep_id=".$id."&&id=".$oldfile."&&product_id=".$product_id."&&error= File to large!");
                            }
                        }else{
                            $_SESSION['failed'] = "File too large!";
                            header ("Location: ../../Small-Entrepreneur/edit-product.php?entrep_id=".$id."&&id=".$oldfile."&&product_id=".$product_id."&&error= File to large!");
                        }
                    }else{
                        $_SESSION['failed'] = "This file type is not supported!";
                        header ("Location: ../../Small-Entrepreneur/edit-product.php?entrep_id=".$id."&&id=".$oldfile."&&product_id=".$product_id."&&error=You can't upload this extention of file");
                    }
                }else{
                    $fileDestination = "Uploaded Images/".$oldfile;
                    $sql = "UPDATE uploaded_product SET productname='$productname', productprice='$price', productimage='$oldfile', productdescription='$description', province='$province', filepath='$fileDestination', uploaddate='$date' 
                    WHERE product_id='$product_id' AND entrep_id='$id'";
                        if (mysqli_query($conn, $sql)) {
                            $_SESSION['success'] = "Product updated successfully";
                            header ("Location: ../../Small-Entrepreneur/view-product.php?entrep_id=".$id."&&id=".$oldfile."&&product_id=".$product_id."&&Product updated successfully");
                        }else {
                            echo "Error: " . mysqli_error($conn);
                        }
                }
            }else{
                $_SESSION['failed'] = "Price is invalid!";
                header ("Location: ../../Small-Entrepreneur/edit-product.php?entrep_id=".$id."&&id=".$oldfile."&&product_id=".$product_id."&&error=Price is invalid!");
            }
        }
    }
?>