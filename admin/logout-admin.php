<?php
session_start();
if(isset($_SESSION['admin'])){
	  	session_destroy();
	  	unset($_SESSION['admin']);
	  	header('Location: ../admin/');
	}
?>