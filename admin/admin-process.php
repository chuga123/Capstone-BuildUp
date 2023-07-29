<?php
include ('../Process/server.php');
session_start();

//Sign in validation Admin

if(isset($_POST['submit'])){
	$password = $_POST['pass'];
	
	$sql = "SELECT * FROM admin WHERE password='$password'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){

			$_SESSION['admin'] = $row["admin_id"];
            header("Location: admin-dashboard.php");
        }
    }else{
        $_SESSION['admins'] = "Password incorrect";
		header ("Location: ../Admin/");
    }
}
?>