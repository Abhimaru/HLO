<?php
session_start();
include 'Connect.php';
if(isset($_GET['token'])){
	$token = $_GET['token'];
	$updatequery = " UPDATE user_account set U_Valid='active' where User_Token='$token'";
	$query = mysqli_query($db, $updatequery);
	if($query){
	    if(isset($_SESSION['msg'])){
			$_SESSION['msg'] = "Account Activated Successfully";
		}
	    else{
			$_SESSION['msg'] = "You are logged out";
	    }
		header('location: login.php');
	}
	else{
		$_SESSION['msg'] = "Account Not Activated due to some error...";
			header('location: signup.php');
	}
}
?>
