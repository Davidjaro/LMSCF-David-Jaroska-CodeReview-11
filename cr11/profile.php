<?php 
require 'data.php';
session_start();
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "cr11_david_jaroska_petadoptation";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error() . "\n");
}

$sql = "SELECT * FROM users WHERE id={$_SESSION['id']}" ;
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();
?>
<?php 
if (isset($_POST['logout'])){
session_destroy();
header("Location: logindex.php");

}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="profile.css">
	<title>Profile</title>
</head>
<body>
<div class="media">
  <img src="<?= $row['avatar'];?>" class="mr-3 poster" alt="">
  <div class="media-body">
    <h5 class="mt-0">Welcome <?php echo ($_SESSION['first_name']) ?></h5>
    <h3 class="mt-0"><?php echo ($_SESSION['message'])?></h3>
    <form action="profile.php" method="post" autocomplete="off">
 	<button name="logout" type= "submit" class="button button-block"/>Log out</button>
 	</form>
  </div>
</div>

		<nav>
  			<div class="nav nav-tabs" id="nav-tab" role="tablist">
    			<a class="nav-item nav-link active" id="nav-animals-tab" data-toggle="tab" href="#nav-animals" role="tab" aria-controls="nav-home" aria-selected="true">Animals</a>
    			<a class="nav-item nav-link" id="nav-small-tab" data-toggle="tab" href="#nav-small" role="tab" aria-controls="nav-profile" aria-selected="false">Small/Big</a>
    			<a class="nav-item nav-link" id="nav-senior-tab" data-toggle="tab" href="#nav-senior" role="tab" aria-controls="nav-profile" aria-selected="false">Senior</a>
  			</div>
		</nav>

	
	<div class="tab-content">


			<div class="tab-pane fade show active" id="nav-animals" role="tabpanel" aria-labelledby="nav-animals-tab">
				<form id='formData' class="form-inline my-2 my-lg-0">
            	<input id='use' class="form-control mr-sm-2" type="search" placeholder="search for a pet" name="search">
     			</form>

				<div class="row m-4" id="content">
				<?php $result1 = $mysqli->query("SELECT * FROM animals"); ?>
				  <?php 
				  while ($row1 = $result1-> fetch_assoc()): 
				  ?>

				    <div class="card col-lg-3 col-md-5 col-sm-12 m-lg-5 m-md-4 mt-sm-2" style="width: 18rem;">
				      <img class="card-img-top card-image"  src="<?php echo $row1['img'] ?>" alt="Card Image">
				      <hr>
				      <div class="card-body">
				        <h3 class="card-title"><b>Name: </b><?php echo $row1['name']; ?></h3>
				        <h4 class="card-title"><b>Menagerie: </b> <?php echo $row1['adress']; ?></h4>
				        <p class="card-text"><b>Short description: </b><?php echo $row1['description']; ?></p>
				        <p class="card-text"><b>Hobbies: </b><?php echo $row1['hobbies']; ?></p>
				        <p class="card-text d-none"><b>Type: </b><?php echo $row1['type']; ?></p>
				        <p class="card-text"><b>Avaiable for adoption from: </b> <?php echo $row1['date_of_adoption']; ?></p>
				        <p class="card-text"><b>Age: </b> <?php echo $row1['age']; ?></p>
				        <p class="card-text"><b>Website: </b> <a href="<?php echo $row1['website']; ?>"></a></p>
				      </div>
				    </div>

				  <?php endwhile; ?>
				</div>
			</div>

			<div class="tab-pane fade" id="nav-small" role="tabpanel" aria-labelledby="nav-small-tab">

				<form id='formData' class="form-inline my-2 my-lg-0">
            		<input id='use1' class="form-control mr-sm-2" type="search" placeholder="search for a pet" name="search">
     			</form>
				<div class="row m-4" id="content1">
				<?php $result2 = $mysqli->query("SELECT * FROM `animals` WHERE type='small' OR type='large';"); ?>
				<?php 
				  while ($row2 = $result2-> fetch_assoc() ): 
				  ?>
				<div class="card col-lg-3 col-md-5 col-sm-12 m-lg-5 m-md-4 mt-sm-2" style="width: 18rem;">
				      <img class="card-img-top card-image"  src="<?php echo $row2['img'] ?>" alt="Card Image">
				      <hr>
				      <div class="card-body">
				        <h3 class="card-title"><b>Name: </b><?php echo $row2['name']; ?></h3>
				        <h4 class="card-title"><b>Menagerie: </b> <?php echo $row2['adress']; ?></h4>
				        <p class="card-text"><b>Short description: </b><?php echo $row2['description']; ?></p>
				        <p class="card-text"><b>Hobbies: </b><?php echo $row2['hobbies']; ?></p>
				        <p class="card-text d-none"><b>Type: </b><?php echo $row2['type']; ?></p>
				        <p class="card-text"><b>Avaiable for adoption from: </b> <?php echo $row2['date_of_adoption']; ?></p>
				        <p class="card-text"><b>Age: </b> <?php echo $row2['age']; ?></p>
				        <p class="card-text"><b>Website: </b> <a href="<?php echo $row2['website']; ?>"></a></p>
				      </div>
				    </div>

				  <?php endwhile; ?>
				</div>
			</div>

			<div class="tab-pane fade" id="nav-senior" role="tabpanel" aria-labelledby="nav-senior-tab">

				<form id='formData' class="form-inline my-2 my-lg-0">
            		<input id='use2' class="form-control mr-sm-2" type="search" placeholder="search for a pet" name="search">
     			</form>
				 <div class="row m-4" id="content2">
				 <?php $result3 = $mysqli->query("SELECT * FROM `animals` WHERE type='senior'"); ?>
				<?php 
				  while ($row3 = $result3-> fetch_assoc() ): 
				  ?>
				<div class="card col-lg-3 col-md-5 col-sm-12 m-lg-5 m-md-4 mt-sm-2" style="width: 18rem;">
				      <img class="card-img-top card-image"  src="<?php echo $row3['img'] ?>" alt="Card Image">
				      <hr>
				      <div class="card-body">
				        <h3 class="card-title"><b>Name: </b><?php echo $row3['name']; ?></h3>
				        <h4 class="card-title"><b>Menagerie: </b> <?php echo $row3['adress']; ?></h4>
				        <p class="card-text"><b>Short description: </b><?php echo $row3['description']; ?></p>
				        <p class="card-text"><b>Hobbies: </b><?php echo $row3['hobbies']; ?></p>
				        <p class="card-text d-none"><b>Type: </b><?php echo $row3['type']; ?></p>
				        <p class="card-text"><b>Avaiable for adoption from: </b> <?php echo $row3['date_of_adoption']; ?></p>
				        <p class="card-text"><b>Age: </b> <?php echo $row3['age']; ?></p>
				        <p class="card-text"><b>Website: </b> <a href="<?php echo $row3['website']; ?>">website</a></p>
				      </div>
				    </div>

				  <?php endwhile; ?>
				</div>
			</div>
		</div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

var request;
$("#use").keyup(function(event){
  event.preventDefault();
  if (request) {
    request.abort();
  }
  var $form = $(this);
  var $inputs = $form.find("input, select, button, textarea");
  var serializedData = $form.serialize();

  $inputs.prop("disabled", true);

  request = $.ajax({
    url: "search.php",
    type: "post",
    data: serializedData
  });

  request.done(function (response, textStatus, jqXHR){
   document.getElementById('content').innerHTML = response;
  });
  request.fail(function (jqXHR, textStatus, errorThrown){
    console.error(
      "The following error occurred: "+
      textStatus, errorThrown
    );
  });
  request.always(function () {
    $inputs.prop("disabled", false);
  });
});
var request;
$("#use1").keyup(function(event){
  event.preventDefault();
  if (request) {
    request.abort();
  }
  var $form = $(this);
  var $inputs = $form.find("input, select, button, textarea");
  var serializedData = $form.serialize();

  $inputs.prop("disabled", true);

  request = $.ajax({
    url: "search_small.php",
    type: "post",
    data: serializedData
  });

  request.done(function (response, textStatus, jqXHR){
   document.getElementById('content1').innerHTML = response;
  });
  request.fail(function (jqXHR, textStatus, errorThrown){
    console.error(
      "The following error occurred: "+
      textStatus, errorThrown
    );
  });
  request.always(function () {
    $inputs.prop("disabled", false);
  });
});
var request;
$("#use2").keyup(function(event){
  event.preventDefault();
  if (request) {
    request.abort();
  }
  var $form = $(this);
  var $inputs = $form.find("input, select, button, textarea");
  var serializedData = $form.serialize();

  $inputs.prop("disabled", true);

  request = $.ajax({
    url: "search_senior.php",
    type: "post",
    data: serializedData
  });

  request.done(function (response, textStatus, jqXHR){
   document.getElementById('content2').innerHTML = response;
  });
  request.fail(function (jqXHR, textStatus, errorThrown){
    console.error(
      "The following error occurred: "+
      textStatus, errorThrown
    );
  });
  request.always(function () {
    $inputs.prop("disabled", false);
  });
});
});
</script>
</body>
</html>