<?php 

require 'data.php';
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Login Form</title>
</head>
	<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (isset($_POST['login'])){
		require 'login.php';
	}
	elseif (isset($_POST['register'])){
		require 'register.php';
	}
}
?>
<?php 

?>
<body>
		<nav>
  			<div class="nav nav-tabs" id="nav-tab" role="tablist">
    			<a class="nav-item nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-home" aria-selected="true">Login</a>
    			<a class="nav-item nav-link" id="nav-register-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Register</a>
  			</div>
		</nav>

		<div class="tab-content" id="nav-tabContent">

			<div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
				<h1>Welcome Back!</h1>

				<form action="logindex.php" method="post" autocomplete="off">

					<div class="field-wrap">
						<label>
							Email Adress<span class="req">*</span>
						</label>
						<input type="email" required autocomplete="off" name="email"/>
					</div>

					<div class="field-wrap">
						<label>
							Password<span class="req">*</span>
						</label>
						<input type="password" required autocomplete="off" name="password"/>
					</div>

					<p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
					<button class="button button-block" name="login" />Log In </button>

				</form>
			</div>

			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<h1>Sign up for free</h1>

				<form action="logindex.php" method="post" autocomplete="off" enctype="multipart/form-data">
				<div class="top-row">
					<div class="field-wrap">
						<label>
							First Name<span class="req">*</span>
						</label>
						<input type="text" required autocomplete="off" name="firstname"/>
					</div>

					<div class="field-wrap">
						<label>
							Last Name<span class="req">*</span>
						</label>
						<input type="text" required autocomplete="off" name="lastname"/>
					</div>

					<div class="field-wrap">
						<label>
							Email Adress<span class="req">*</span>
						</label>
						<input type="text" id="email" required autocomplete="off" name="email"/>
						<span id="email_result"></span>
					</div>

					<div class="field-wrap">
						<label>
							Password<span class="req">*</span>
						</label>
						<input type="password" required autocomplete="off" name="password"/>
					</div>
					<div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar"  required /></div>

					<button type="submit" class="button button-block" name="register"> Register</button>
				</div>
				</form>
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
