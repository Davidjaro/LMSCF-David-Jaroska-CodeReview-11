<?php 

session_start();
$name = '';
$adress = '';
$hobbies = '';
$website = '';
$date = date('');
$type = '';
$age = 0;
$desc = '';
$update = false;
$id = 0;



$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "cr11_david_jaroska_petadoptation";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$output = '';

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error() . "\n");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$conn->query("DELETE FROM `animals` WHERE `animals`.`id`=$id") or die($conn->error());
	unset($_SESSION['message']);
	$_SESSION['message'] = "Record has been deleted";
	$_SESSION['msg_type'] = "danger";

	header("location: admin.php");
		
}
if (isset($_GET['deleting'])){
	$id = $_GET['deleting'];
	$conn->query("DELETE FROM `users` WHERE `users`.`id`=$id") or die($conn->error());
	unset($_SESSION['message']);
	$_SESSION['message'] = "Record has been deleted";
	$_SESSION['msg_type'] = "danger";

	header("location: admin.php");
		
}
if (isset($_POST['save'])){
	$name = $_POST['name'];
	$adress = $_POST['adress'];
	$hobbies = $_POST['hobbies'];
	$website = $_POST['website'];
	$type = $_POST['type'];
	$date = $_POST['adoption'];
	$age = $_POST['age'];
	$desc = $_POST['description'];
	$avatar_path = $conn->real_escape_string('img/'.$_FILES['avatar']['name']);

	copy($_FILES['avatar']['tmp_name'], $avatar_path);

	$conn->query("INSERT INTO `animals` (name, adress, hobbies, type, date_of_adoption, description, img, age, website)
	VALUES ('$name', '$adress', '$hobbies', '$type', '$date', '$desc', '$avatar_path', $age, '$website')");
	unset($_SESSION['message']);
	$_SESSION['message'] = "Record has been saved";
	$_SESSION['msg_type'] = "success";

	header("Location: admin.php");
}
if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $conn->query("SELECT * FROM `animals` WHERE `animals`.`id`=$id") or die($conn->error());
	if ($result->num_rows){
		$row = $result->fetch_array();
		$name = $row['name'];
		$adress = $row['adress'];
		$hobbies = $row['hobbies'];
		$website = $row['website'];
		$type = $row['type'];
		$date = $row['date_of_adoption'];
		$age = $row['age'];
		$desc = $row['description'];
	}
}
if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$adress = $_POST['adress'];
	$hobbies = $_POST['hobbies'];
	$website = $_POST['website'];
	$type = $_POST['type'];
	$date = $_POST['adoption'];
	$age = $_POST['age'];
	$desc = $_POST['description'];
	$avatar_path = $conn->real_escape_string('img/'.$_FILES['avatar']['name']);

	copy($_FILES['avatar']['tmp_name'], $avatar_path);

	$conn->query("UPDATE `animals`SET name='$name', adress='$adress', hobbies='$hobbies', website='$website', age=$age, date_of_adoption='$date', type='$type', description='$desc', img='$avatar_path'  WHERE `animals`.`id`=$id") or die($conn->error());
	unset($_SESSION['message']);
	$_SESSION['message'] = "Record has been changed";
	$_SESSION['msg_type'] = "info";

	header("location: admin.php");
}
?>