<?php
session_start();
include 'Connect.php';
if(isset($_GET['token'])){
	$token = $_GET['token'];
	$updatequery = "UPDATE doc_account set D_Valid='active' where Doc_Token='$token'";
	$query = mysqli_query($db, $updatequery);
	if($query){
		if(isset($_SESSION['msg'])){
			$_SESSION['msg'] = "Account Activated Successfully";
			header('location: logindoc.php');
		}
        else{
                $_SESSION['msg'] = "You are logged out";
                header('location: logindoc.php');
        }
	}
	else{
		$_SESSION['msg'] = "Account Not Activated due to some error...";
			header('location: doc-signup.php');
	}

}
?>
