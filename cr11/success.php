<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Success</title>
</head>
<body>
<div class="form">
	<h1><?= 'Success' ?></h1>
	<p>
		<?php 
		if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
			echo $_SESSION['message'];
		else: header("location: logindex.php");
		endif;
		?>
	</p>
	<a href="logindex.php"><button class="button button-block"/>Back to Login</button></a>
</div>
</body>
</html>