<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<?php require 'data.php'; ?>
<?php require 'admin_process.php';?>
<?php 

  if (isset($_SESSION['message'])):?>

  <div class ="alert alert-<?= $_SESSION['msg_type'] ?>">
    <?php 
    echo $_SESSION['message'];

    ?>
  </div>
  <?php endif ?>

<?php 

$result = $mysqli->query("SELECT * FROM users");
$result1 = $mysqli->query("SELECT * FROM animals");
?>

		<nav>
  			<div class="nav nav-tabs" id="nav-tab" role="tablist">
    			<a class="nav-item nav-link" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab" aria-controls="nav-home" aria-selected="true">Users</a>
    			<a class="nav-item nav-link active" id="nav-register-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Info</a>
  			</div>
		</nav>
		<nav class="navbar  navbar-light bg-transparent fixed-top form-navigation">
       		<button class="navbar-toggler bg-white ml-auto" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          	<span class="navbar-toggler-icon"></span>
        	</button>

        	<div class="collapse navbar-collapse align-center" id="navbarTogglerDemo03">
          		<ul class="navbar-nav ml-auto mt-2 mt-lg-0 bg-dark text-center">
            		<li class="nav-item">
              		<a class="nav-link text-white"  href = "#information">Go to Form <span class="sr-only">(current)</span></a>
            	</li>
          	</ul>

        	</div>
      </nav>

	<div class="tab-content" id="nav-tabContent">


		
			<div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
				<table class="table table-striped">
			    <thead>
			        <tr>
			            <th>First Name</th>
			            <th>Last Name</th>
			            <th>Email</th>
			            <th>Status</th>
			            <th>Actions</th>
			        </tr>
			    </thead>
			    <tbody>

			        <?php
			  		while ($row = $result->fetch_assoc()): 
			  		?>
			  		<tr>
			            <td><?php echo $row['first_name']; ?></td>
			            <td><?php echo $row['last_name']; ?></td>
			            <td><?php echo $row['email']; ?></td>
			            <td><?php echo $row['active']; ?></td>
			            <td><a href="admin.php?deleting=<?php echo $row['id']; ?>" class="btn btn-info" >Delete</a></td>

			            <td>
			            </td>	
			        </tr>
					<?php endwhile; ?>

			    </tbody>
			</table>
		</div>
	
	<div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		<div id="content" class="container-fluid">
		  <div class="row m-4">
		  <?php 
		  while ($row = $result1-> fetch_assoc()): 
		  ?>

		    <div class="card col-lg-3 col-md-5 col-sm-12 m-lg-5 m-md-4 mt-sm-2" style="width: 18rem;">
		      <img class="card-img-top card-image"  src="<?php echo $row['img'] ?>" alt="Card Image">
		      <hr>
		      <div class="card-body">
		        <h3 class="card-title"><b>Name: </b><?php echo $row['name']; ?></h3>
		        <h4 class="card-title"><b>Menagerie: </b> <?php echo $row['adress']; ?></h4>
		        <p class="card-text"><b>Short description: </b><?php echo $row['description']; ?></p>
		        <p class="card-text"><b>Hobbies: </b><?php echo $row['hobbies']; ?></p>
		        <p class="card-text"><b>Type: </b><?php echo $row['type']; ?></p>
		        <p class="card-text"><b>Avaiable for adoption from: </b> <?php echo $row['date_of_adoption']; ?></p>
		        <p class="card-text"><b>Age: </b> <?php echo $row['age']; ?></p>
		        <p class="card-text"><b>Website: </b> <?php echo $row['website']; ?></p>
		        <a href="admin.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary" >Edit</a>
		        <a href="admin.php?delete=<?php echo $row['id']; ?>" class="btn btn-info" >Delete</a>
		      </div>
		    </div>

		  <?php endwhile; ?>
		  </div>

	  		<form action="admin.php" enctype="multipart/form-data" method ="post" id="information" class="text-white bg-dark border border-white rounded" id="entries">
	    		<h1>Create a new Entry:</h1>
	      			<input type="hidden" name="id" value="<?php echo $id; ?>">
	      		<div class="form-row">
	       		<div class="form-group col-6">
	           		<label  for="name">Name:</label>
	           		<input type="text" class="form-control" name= "name" id="name" value="<?php echo $name; ?>">
	       		</div>
	       		<div class="form-group col-6">
	           		<label for ="adress">Menagerie:</label>
	           		<input  type="text" class="form-control" name="adress"  id="adress" value="<?php echo $adress; ?>">
	       		</div>
	       		<div class="form-group col-6">
	           		<label for= "hobbies">Hobbies:</label>
	           		<input  type="text" class="form-control" name= "hobbies" id="email" value="<?php echo $hobbies; ?>">
	       		</div>
	       		<div class="form-group col-6">
	           		<label for ="website">Website:</label>
	           		<input  type="text" class="form-control" name="website"  id="website" value="<?php echo $website; ?>">
	      		</div>
	      		<div class="form-group col-6">
	           		<label for ="age">Age:</label>
	           		<input  type="number" class="form-control" name="age"  id="age" value="<?php echo $age; ?>">
	      		</div>
	      		<div class="form-group col-6">
           			<label for ="date">Date of Adoption:</label>
           			<input  type="date" name="adoption" class="form-control"  id="adoption" value="<?php echo $date; ?>">
       			</div>
       			<div class="form-group col-6">
           			<label for= "desc">Type:</label>
           			<select name="type">
           				<?php 
       					if ($type == "small"):
       					?>
			             <option value="small" selected >Small</option>
			             <option value="large">Large</option>
			             <option value="senior">Senior</option>
			            <?php elseif($type == "large"): ?>
			             <option value="small">Small</option>
			             <option value="large" selected >Large</option>
			             <option value="senior">Senior</option>
			            <?php else: ?>
			             <option value="small">Small</option>
			             <option value="large">Large</option>
			             <option value="senior" selected >Senior</option>
			            <?php endif; ?>
           			</select>
       			</div>
       			<div class="form-group col-6">
           			<label for= "desc">Description:</label>
           			<textarea  name= "description" class="form-control" id="describe"><?php echo $desc; ?></textarea>
       			</div>
	      		<div class="form-group col-6">
           			<label for= "desc">Upload Image:</label>
           			<input  type="file" class="form-control" name= "avatar" id="images" accept="img/*">
       				</div>
	       		<?php 
	       		if ($update == true):
	       		?>
	       		<button class="btn btn-primary btn-sm btn-block" type= "submit" name="update">Update</button>
	       		<?php else: ?>
	       		<button class="btn btn-primary btn-sm btn-block" type= "submit" name="save">Save</button>
	       		<?php endif; ?>
				</div>
			</form>
		</div>
	</div>

</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>  
 $(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"check_email.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#email_result').html(data);
   }
  });
 }
 $('#email').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
 </script>
</body>
</html>