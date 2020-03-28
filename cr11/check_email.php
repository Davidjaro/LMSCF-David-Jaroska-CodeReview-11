<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "accounts";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$output = '';


if (!$conn) {
   die("Connection failed: " . mysqli_connect_error() . "\n");
}
if(isset($_POST['query']))
{
$search = mysqli_real_escape_string($conn, $_POST['query']);
$result = $conn->query("
  SELECT * FROM `users` 
  WHERE email LIKE '%".$search."%'
 ") or die ($conn->error()) ;
if(mysqli_num_rows($result) > 0)
{
 echo "email already in use";
}
else
{
 echo 'e-mail avaiable';
}
}

?>