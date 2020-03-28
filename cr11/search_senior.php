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
if(isset($_POST['search']))
{
$search = mysqli_real_escape_string($conn, $_POST['search']);
$result = $conn->query("
  SELECT * FROM `animals` 
  WHERE type='senior' && (name LIKE '%".$search."%' 
  OR type LIKE '%".$search."%'  
  OR adress LIKE '%".$search."%'  
  OR hobbies LIKE '%".$search."%'  
  OR website LIKE '%".$search."%' 
  OR description LIKE '%".$search."%'
  OR date_of_adoption LIKE '%".$search."%' 
  OR age LIKE '%".$search."%')
 ");
if(mysqli_num_rows($result) > 0)
{

 while($row = mysqli_fetch_array($result))
 {
echo '
   <div class="card col-lg-3 col-md-5 col-sm-12 m-lg-5 m-md-4 mt-sm-2" style="width: 18rem;">
              <img class="card-img-top card-image"  src='.$row["img"].' alt="Card Image">
              <hr>
              <div class="card-body">
                <h3 class="card-title"><b>Name: </b>'.$row["name"].'</h3>
                <h4 class="card-title"><b>Adress: </b>'.$row["adress"].'</h4>
                <p class="card-text"><b>Short description: </b>'.$row["description"].'</p>
                <p class="card-text"><b>Hobbies: </b>'.$row["hobbies"].'</p>
                <p class="card-text"><b>Type: </b>'.$row["type"].'</p>
                <p class="card-text"><b>Avaiable for adoption: </b>'.$row["date_of_adoption"].'</p>
                <p class="card-text"><b>Age: </b> '.$row["age"].'</p>
                <p class="card-text"><b>Website: </b> <a href='.$row["website"].'></a></p>
              </div>
            </div>
  ';
 }
}
else{
  echo "Data not found";
}
}
?>