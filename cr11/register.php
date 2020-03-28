<?php

$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5(rand(0,1000) ) );
$avatar_path = $mysqli->real_escape_string('img/'.$_FILES['avatar']['name']); 
copy($_FILES['avatar']['tmp_name'], $avatar_path);

$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

if ($result ->num_rows > 0){
	$_SESSION['message']= 'User already exists!';
	header("location: error.php");
}
else {
	$sql = "INSERT INTO users (first_name, last_name, email, password, hash, avatar) VALUES ('$first_name', '$last_name', '$email', '$password', '$hash', '$avatar_path')";

	if ($mysqli->query($sql)) {
		$_SESSION['active'] = 0; //until user activates email
		$_SESSION['logged_in'] = true; //user logged it
		$_SESSION['message'] = 

			"Confirmation link has been sent to $email, please verify your account by clicking on the link in the message";
		$to = $email;
		$subject = 'Account Verification';
		$message_body = '
		Hello '.$first_name.',
		Thank you for signin up!
		Please click this link to activate your account:
		http://localhost/php/verify.php?email='.$email.'&hash='.$hash;

		mail ($to, $subject, $message_body);

		header ("location: success.php");
	}
	else{
		$_SESSION['message'] = "You have enetered the wrond password, try again!";
		header ("location: error.php");
	}
}


?>