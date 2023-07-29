<?php
include ('../Process/server.php');
date_default_timezone_set("Asia/Manila");
session_start();

//Sign in validation Small Entrepreneur

if(isset($_POST['signin'])){
	$email = $password = '';
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM reseller WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
		  if($row['is_verified'] == 'true'){
			$id= $row["reseller_id"];
			$firstname = $row["firstname"];
			$lastname = $row["lastname"];
			$contact = $row["contact"];
			$email = $row["email"];
			$_SESSION['reseller_id'] =$id;
			$_SESSION['firstname'] =$firstname;
			$_SESSION['lastname'] =$lastname;
			$_SESSION['contact'] =$contact;
			$_SESSION['email'] = $email;

			error_reporting(0);
			$role= 'Reseller';
			$now = date('Y-m-d');
			$sql = "SELECT * FROM premium WHERE user_id='$id' AND role='$role'";
			$result = mysqli_query($conn, $sql);
    			if (mysqli_num_rows($result) > 0) {
    				while ($row = mysqli_fetch_assoc($result)) {
    					$exp = $row['plan_expiration'];
    					$date1 = date_create($exp);
    					$date2 = date_create($now);
    					$interval = date_diff($date1, $date2);
    					$days = $interval->format('%R%a');
    					if($days <= 0) {
    						$_SESSION['success'] = "Logged in successfully!";
    						header("Location: ../Reseller/home.php?reseller_id=".$id."&&filter=All&&Logged in successfully!");
    					}else {
    						$delete = mysqli_query($conn, "DELETE FROM premium WHERE user_id='$id' AND role='$role'");
    						if($delete){
    							$sqldelete = mysqli_query($conn, "UPDATE entrep SET plan='regular'");
    							if($sqldelete){
    								$_SESSION['success'] = "Logged in successfully!";
    								header("Location: ../Reseller/home.php?reseller_id=".$id."&&filter=All&&Logged in successfully!");
    							}
    						}
    					}
    				}
    			} else {
    				$_SESSION['success'] = "Logged in successfully!";
    				header("Location: ../Reseller/home.php?reseller_id=".$id."&&filter=All&&Logged in successfully!");
    			}
		  }else{
		      $_SESSION['status'] = "Please confirm your email before logging in.";
		      header("Location: ../Reseller/sign-in.php?confirm");
		  }
		}
	
	}else {
  		$_SESSION['status'] = "Email and Password do not match";
		header ("Location: ../Reseller/sign-in.php?email&pass-do-not-match");
	}
}	

?>