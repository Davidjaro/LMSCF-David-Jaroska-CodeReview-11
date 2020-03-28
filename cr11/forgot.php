<?php 
require 'data.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = $mysqli->escape_string($_POST['email']);
	$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

	if( $result->num_rows == 0)
	{
		$_SESSION['message'] = "User with that email doesnt exist!";
		header("location: error.php");
	}
	else {
		$user = $result->fetch_assoc();

		$email = $user['email'];
		$hash = $user['hash'];
		$first_name = $user['first_name'];

		$_SESSION['message'] = "<p> Please check your email <span>$email</span>" . " for a confirmation link to complete your password reset!</p>";

		$to = $email;
		$subject = 'Password Reset Link';
		$message_body= 'Hello'. $first_name.',
		You have requested a password reset!

		Please click this link to reset your password:

		http://localhost/php/reset.php?email='.$email.'&hash='.$hash;

		mail($to, $subject, $message_body);
		header("location: success.php");

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Reset</title>
</head>
<body>
	<div class="form">
		<h1>Reset Password</h1>

		<form action="forgot.php" method="post">

			<div class="field-wrap">
				<label>
					E-Mail:
				</label>
				<input type="email" required name="email" autocomplete="off"/>
			</div>
			<button type="submit" class="button button-block" name="apply" /> Reset</button>
		</form>
	</div>
</body>
</html>