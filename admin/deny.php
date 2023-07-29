<?php 
session_start();
include ('../Process/server.php');


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $sqlreject = mysqli_query($conn, "DELETE FROM verify WHERE user_id='$user_id'");
    if($sqlreject){
        $result = mysqli_query($conn, "SELECT * FROM entrep WHERE entrep_id=$user_id");
        $row = mysqli_fetch_array($result);
        $fname = $row['firstname'];
        $lname = $row['lastname'];

        $_SESSION['accepted'] = "Verification Rejected <i class='fa-solid fa-circle-xmark'></i><br>Verification for <b>$fname $lname</b> was rejected .";
        header ("Location: admin-users.php");
    }
}
?>