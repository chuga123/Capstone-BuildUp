<?php
session_start();
	
	//LOGOUT Small Entrepreneurs
	if(isset($_POST['logout-smallentrep'])){
	  	session_destroy();
	  	unset($_SESSION['entrep_id']);
	  	header('Location: ../Small-Entrepreneur/sign-in.php?logged-out');
	}
	
	//LOGOUT teacher
	if(isset($_POST['logout-reseller'])){
	  	session_destroy();
	  	unset($_SESSION['urn']);
	  	header('Location: ../Reseller/sign-in.php?logged-out');
	}

	//LOGOUT admin
	//if(isset($_POST['logout_admin'])){
	  	//session_destroy();
	  	//unset($_SESSION['admin_id']);
	  	//header('Location: Login_admin.php');
	//}
	
?>