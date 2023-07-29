<?php
include('../../Process/server.php');
session_start();
if(isset($_GET['uid'])){
    $uid = $_GET['uid'];
    $unique = uniqid('', true);
    $key = substr($unique, strlen($unique) - 8, strlen($unique));
    $finalKey = "BUILD_UP_2022_u".$key;
    
    
    $user_info = "SELECT * from entrep where uid ='$uid'";
    $res1 = mysqli_query($conn, $user_info);
        while($row = mysqli_fetch_assoc($res1)){
            $id= $row["entrep_id"];
    
            $query = "UPDATE entrep set is_verified='true' where uid='$uid'";
            $res2 = mysqli_query($conn, $query);
            if($res2) {
                $_SESSION['success'] = "Logged in successfully!";
                $_SESSION['entrep_id'] = $id;
            	header("Location: ../../Small-Entrepreneur/home.php?entrep_id=".$id."&&Logged in successfully!");
            }else {
                echo "error .$res2";
            }
        }
}



?>