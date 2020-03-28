<?php 
require 'data.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ($_POST['newpassword'] == $_POST['confirmpassword']){
		$new_password = password_hash($_POST['newpasword'], PASSWORD_BCRYPT);

		$email = $mysqli->escape_string($_POST['email']);
		$hash = $mysqli->escape_string($_POST['hash']);

		$sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

		if ( $mysqli->query($sql)){
			$_SESSION['message'] = "Your password has been reset successfully";
			header("location: success.php");
		}
	}
	else{
		$_SESSION['message'] = "The passwords you enetered dont match, please try again!";
		header("location: error.php");
	}
}
?>